<?php
session_start();
require 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = SHA2(?, 256)");
$stmt->execute([$username, $password]);
$user = $stmt->fetch();

if ($user) {
  $_SESSION['username'] = $user['username'];
  header("Location: dashboard.php");
} else {
  echo "Login gagal. <a href='index.html'>Coba lagi</a>";
}
?>
