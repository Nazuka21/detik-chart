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
      text-align: center;
    }
    .logo {
      width: 120px;
      height: auto;
      margin-bottom: 1rem;
    }
    h2 {
      margin-bottom: 1.5rem;
    }
    form {
      display: flex;
      flex-direction: column;
      text-align: left;
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
  <div class="login-container">
    <h2>Login</h2>
    <p>Untuk Berlangganan Silakan Hubungi</p>
    <a href="https://wa.me/6288239478100"> <h2>WHATSAPP</h2></a>
    <p> Gratis User Demo untuk 30 Hari </p>
    <p> Username : Demo </p>
    <p> Password : Demo123 </p>
    <p> ================================</p>
    
    <form action="login.php" method="POST">
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
