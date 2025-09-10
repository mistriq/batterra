<?php
header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');

require_once '../includes/config.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Verify CSRF token
if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Invalid CSRF token']);
    exit;
}

// Sanitize and validate input
$email = sanitize_input($_POST['email'] ?? '');

// Validation
if (empty($email)) {
    echo json_encode(['success' => false, 'message' => 'E-mail je povinný']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Neplatný formát e-mailu']);
    exit;
}

// Rate limiting
$ip = $_SERVER['REMOTE_ADDR'];
$rate_limit_file = sys_get_temp_dir() . '/batterra_newsletter_' . md5($ip);
$current_time = time();

if (file_exists($rate_limit_file)) {
    $last_submission = (int)file_get_contents($rate_limit_file);
    if ($current_time - $last_submission < 30) { // 30 seconds between submissions
        echo json_encode(['success' => false, 'message' => 'Počkejte prosím před dalším přihlášením']);
        exit;
    }
}

file_put_contents($rate_limit_file, $current_time);

// Simple file-based storage (replace with database/newsletter service)
$newsletter_file = __DIR__ . '/../data/newsletter.txt';
$newsletter_dir = dirname($newsletter_file);

if (!file_exists($newsletter_dir)) {
    mkdir($newsletter_dir, 0755, true);
}

// Check if email already exists
if (file_exists($newsletter_file)) {
    $existing_emails = file($newsletter_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($existing_emails as $existing_email) {
        $parts = explode('|', $existing_email);
        if (isset($parts[0]) && trim($parts[0]) === $email) {
            echo json_encode(['success' => false, 'message' => 'Tento e-mail je již přihlášen k odběru']);
            exit;
        }
    }
}

// Add email to newsletter list
$newsletter_entry = $email . '|' . date('Y-m-d H:i:s') . '|' . $ip . "\n";
file_put_contents($newsletter_file, $newsletter_entry, FILE_APPEND | LOCK_EX);

// Send confirmation email
$subject = 'Přihlášení k odběru novinek - Batterra';
$email_body = "
Děkujeme za přihlášení k odběru novinek od Batterra!

Budeme vás informovat o:
- Nových projektech a jejich postupu
- Investičních příležitostech
- Aktualitách z oblasti bateriových center
- Legislativních změnách

Pokud si budete přát odhlásit se z odběru, stačí odpovědět na tento e-mail s textem 'ODHLASIT'.

S pozdravem,
Tým Batterra

---
Tento e-mail byl odeslán na základě vašeho přihlášení na webu www.batterra.cz
";

$headers = [
    'From: ' . SITE_EMAIL,
    'Reply-To: ' . SITE_EMAIL,
    'X-Mailer: Batterra Newsletter',
    'Content-Type: text/plain; charset=UTF-8',
];

$mail_sent = mail($email, $subject, $email_body, implode("\r\n", $headers));

if ($mail_sent) {
    error_log("Newsletter signup: {$email}");
    echo json_encode([
        'success' => true,
        'message' => 'Děkujeme! Byli jste úspěšně přihlášeni k odběru novinek.'
    ]);
} else {
    error_log("Newsletter confirmation mail failed: {$email}");
    // Still count as success since email was added to list
    echo json_encode([
        'success' => true,
        'message' => 'Byli jste přihlášeni k odběru novinek.'
    ]);
}
?>