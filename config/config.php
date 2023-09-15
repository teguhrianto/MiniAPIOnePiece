<?php
// Database Configuration
$db_host = 'localhost';
$db_name = 'db_onepiece';
$db_user = 'root';
$db_pass = 'root';

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
