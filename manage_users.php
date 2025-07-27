<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit;
}
require 'db.php';

// Tambah user
if (isset($_POST['new_user'], $_POST['new_pass'])) {
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, SHA2(?, 256))");
    $stmt->execute([$_POST['new_user'], $_POST['new_pass']]);
}

// Hapus user
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE username = ?");
    $stmt->execute([$_GET['delete']]);
}
$users = $pdo->query("SELECT username FROM users")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DETIK CHART</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-container {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
      box-sizing: border-box;
    }
    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
    }
    form {
      display: flex;
      flex-direction: column;
    }
    input {
      padding: 0.75rem;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 1rem;
    }
    button {
      padding: 0.75rem;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
    @media (max-width: 400px) {
      .login-container {
        padding: 1rem;
      }
    }
  </style>
</head>
<body>
<h2>Kelola User</h2>
<form method="POST">
  <input type="text" name="new_user" placeholder="Username baru" required>
  <input type="password" name="new_pass" placeholder="Password baru" required>
  <button type="submit">Tambah User</button>
</form>

<h3>Daftar User</h3>
<ul>
  <?php foreach ($users as $user): ?>
    <li>
      <?= htmlspecialchars($user['username']) ?>
      <?php if ($user['username'] !== $_SESSION['username']): ?>
        <a href="?delete=<?= $user['username'] ?>" onclick="return confirm('Hapus user ini?')">[hapus]</a>
      <?php endif; ?>
    </li>
  <?php endforeach; ?>
</ul>

<a href="dashboard.php">Dashboard</a>
</body>
</html>
