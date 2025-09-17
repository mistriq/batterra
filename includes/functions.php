<?php
/**
 * Utility Functions for Batterra Website
 */

/**
 * Sanitize input data
 */
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Generate CSRF token
 */
function generate_csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verify CSRF token
 */
function verify_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Get current page name for navigation
 */
function get_current_page() {
    return basename($_SERVER['PHP_SELF'], '.php');
}

/**
 * Check if current page is active for navigation
 */
function is_active_page($page) {
    return get_current_page() === $page ? 'active' : '';
}

/**
 * Format Czech date
 */
function format_czech_date($date) {
    $months = [
        1 => 'ledna', 2 => 'února', 3 => 'března', 4 => 'dubna',
        5 => 'května', 6 => 'června', 7 => 'července', 8 => 'srpna',
        9 => 'září', 10 => 'října', 11 => 'listopadu', 12 => 'prosince'
    ];
    
    $timestamp = strtotime($date);
    $day = date('j', $timestamp);
    $month = $months[date('n', $timestamp)];
    $year = date('Y', $timestamp);
    
    return "$day. $month $year";
}

/**
 * Generate SEO-friendly URL slug
 */
function create_slug($string) {
    $string = mb_strtolower($string, 'UTF-8');
    $string = preg_replace('/[^a-z0-9\s-]/', '', $string);
    $string = preg_replace('/[\s-]+/', '-', $string);
    return trim($string, '-');
}

/**
 * Load projects from JSON file
 */
function load_projects() {
    $json_file = __DIR__ . '/../data/projects.json';
    
    if (!file_exists($json_file)) {
        return [
            'projects' => [],
            'project_statuses' => []
        ];
    }
    
    $json_content = file_get_contents($json_file);
    $data = json_decode($json_content, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log('Error loading projects JSON: ' . json_last_error_msg());
        return [
            'projects' => [],
            'project_statuses' => []
        ];
    }
    
    return $data;
}

/**
 * Get single project by ID
 */
function get_project_by_id($project_id) {
    $data = load_projects();
    
    foreach ($data['projects'] as $project) {
        if ($project['id'] === $project_id) {
            // Add status details
            if (isset($data['project_statuses'][$project['status']])) {
                $project['status_details'] = $data['project_statuses'][$project['status']];
            }
            return $project;
        }
    }
    
    return null;
}

/**
 * Get all projects
 */
function get_all_projects() {
    $data = load_projects();
    
    // Add status details to each project
    foreach ($data['projects'] as &$project) {
        if (isset($data['project_statuses'][$project['status']])) {
            $project['status_details'] = $data['project_statuses'][$project['status']];
        }
    }
    
    return $data['projects'];
}

/**
 * Get projects by status
 */
function get_projects_by_status($status) {
    $all_projects = get_all_projects();
    
    return array_filter($all_projects, function($project) use ($status) {
        return $project['status'] === $status;
    });
}

/**
 * Format currency
 */
function format_currency($amount, $currency = 'CZK') {
    if ($currency === 'CZK') {
        return number_format($amount, 0, ',', ' ') . ' Kč';
    }
    return number_format($amount, 0, ',', ' ') . ' ' . $currency;
}

/**
 * Format large numbers
 */
function format_large_number($number) {
    if ($number >= 1000000000) {
        return number_format($number / 1000000000, 1, ',', '') . ' mld.';
    } elseif ($number >= 1000000) {
        return number_format($number / 1000000, 0, ',', '') . ' mil.';
    } elseif ($number >= 1000) {
        return number_format($number / 1000, 0, ',', '') . ' tis.';
    }
    return number_format($number, 0, ',', ' ');
}

/**
 * Get project timeline phase
 */
function get_project_phase($timeline) {
    $now = time();
    
    if (isset($timeline['operation_start']) && strtotime($timeline['operation_start']) <= $now) {
        return 'operation';
    } elseif (isset($timeline['construction_start']) && strtotime($timeline['construction_start']) <= $now) {
        return 'construction';
    } elseif (isset($timeline['planning_start']) && strtotime($timeline['planning_start']) <= $now) {
        return 'planning';
    }
    
    return 'feasibility';
}

/**
 * Calculate project progress percentage
 */
function calculate_project_progress($timeline) {
    if (!isset($timeline['planning_start']) || !isset($timeline['operation_start'])) {
        return 0;
    }
    
    $start = strtotime($timeline['planning_start']);
    $end = strtotime($timeline['operation_start']);
    $now = time();
    
    if ($now <= $start) {
        return 0;
    } elseif ($now >= $end) {
        return 100;
    }
    
    $total_duration = $end - $start;
    $elapsed = $now - $start;
    
    return round(($elapsed / $total_duration) * 100);
}
?>