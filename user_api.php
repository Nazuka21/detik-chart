<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
  http_response_code(403);
  echo json_encode(['error' => 'Unauthorized']);
  exit;
}

require 'db.php';
$action = $_GET['action'] ?? '';

if ($action === 'list') {
  $stmt = $pdo->query("SELECT username FROM users");
  echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

elseif ($action === 'add') {
  $data = json_decode(file_get_contents("php://input"), true);
  $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, SHA2(?, 256))");
  $stmt->execute([$data['username'], $data['password']]);
  echo json_encode(['status' => 'ok']);
}

elseif ($action === 'delete') {
  $data = json_decode(file_get_contents("php://input"), true);
  $stmt = $pdo->prepare("DELETE FROM users WHERE username = ?");
  $stmt->execute([$data['username']]);
  echo json_encode(['status' => 'deleted']);
}
