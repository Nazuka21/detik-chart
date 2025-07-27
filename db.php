<?php
$host = 'sql103.infinityfree.com';
$db   = 'if0_38388873_login';
$user = 'if0_38388873';
$pass = 'Xq33ICHoYyDkMY';
$charset = 'utf8mb4';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
