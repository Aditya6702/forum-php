<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'passw0rd';
$db_name = 'forum';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}
?>
