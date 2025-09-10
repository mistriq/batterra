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
$name = sanitize_input($_POST['name'] ?? '');
$email = sanitize_input($_POST['email'] ?? '');
$phone = sanitize_input($_POST['phone'] ?? '');
$message = sanitize_input($_POST['message'] ?? '');
$privacy_consent = isset($_POST['privacy_consent']);
$newsletter_consent = isset($_POST['newsletter_consent']);

// Validation
$errors = [];

if (empty($name)) {
    $errors[] = 'Jméno je povinné';
}

if (empty($email)) {
    $errors[] = 'E-mail je povinný';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Neplatný formát e-mailu';
}

if (empty($message)) {
    $errors[] = 'Zpráva je povinná';
}

if (!$privacy_consent) {
    $errors[] = 'Souhlas se zpracováním osobních údajů je povinný';
}

// Return errors if any
if (!empty($errors)) {
    echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
    exit;
}

// Rate limiting (simple implementation)
$ip = $_SERVER['REMOTE_ADDR'];
$rate_limit_file = sys_get_temp_dir() . '/batterra_contact_' . md5($ip);
$current_time = time();

if (file_exists($rate_limit_file)) {
    $last_submission = (int)file_get_contents($rate_limit_file);
    if ($current_time - $last_submission < 60) { // 1 minute between submissions
        echo json_encode(['success' => false, 'message' => 'Počkejte prosím před odesláním další zprávy']);
        exit;
    }
}

file_put_contents($rate_limit_file, $current_time);

// Prepare email content
$subject = 'Nový kontakt z webu Batterra - ' . $name;
$email_body = "
Nový kontakt z webu Batterra:

Jméno: {$name}
E-mail: {$email}
Telefon: " . ($phone ?: 'Neuvedeno') . "

Zpráva:
{$message}

---
Souhlas s newsletter: " . ($newsletter_consent ? 'Ano' : 'Ne') . "
IP adresa: {$ip}
Datum: " . date('d.m.Y H:i:s') . "
";

// Email headers
$headers = [
    'From: ' . $email,
    'Reply-To: ' . $email,
    'X-Mailer: Batterra Contact Form',
    'Content-Type: text/plain; charset=UTF-8',
];

// Send email
$mail_sent = mail(SITE_EMAIL, $subject, $email_body, implode("\r\n", $headers));

if ($mail_sent) {
    // Log successful contact (you might want to store in database)
    error_log("Contact form submission: {$name} ({$email})");
    
    // If newsletter consent, you might want to add to newsletter list here
    if ($newsletter_consent) {
        // TODO: Add to newsletter system
        error_log("Newsletter signup: {$email}");
    }
    
    echo json_encode([
        'success' => true, 
        'message' => 'Děkujeme! Vaše zpráva byla odeslána. Odpovíme vám co nejdříve.'
    ]);
} else {
    error_log("Contact form mail failed: {$name} ({$email})");
    echo json_encode([
        'success' => false, 
        'message' => 'Omlouváme se, ale zprávu se nepodařilo odeslat. Zkuste to prosím znovu.'
    ]);
}
?>