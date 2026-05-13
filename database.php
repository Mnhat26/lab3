<?php
// Database connection for local XAMPP/WAMP/MAMP.
// The app will try common MySQL ports automatically: 3306 and 3307.

$database_name = 'my_guitar_shop1';
$username = 'root';
$password = '';
$hosts = [
    '127.0.0.1:3306',
    '127.0.0.1:3307',
    'localhost:3306',
    'localhost:3307'
];

$db = null;
$error_message = '';

foreach ($hosts as $host) {
    try {
        $dsn = "mysql:host={$host};dbname={$database_name};charset=utf8mb4";
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        break;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
    }
}

if ($db === null) {
    include('database_error.php');
    exit();
}
?>
