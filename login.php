<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $_SESSION['username'] = $username;
    echo "<script>alert('Login berhasil!'); window.location.href='biodata.html';</script>";
  } else {
    echo "<script>alert('Login gagal. Coba lagi!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background-color: #192753;
      padding: 30px;
      border-radius: 10px;
      width: 300px;
      box-shadow: 0 0 10px rgba(255,255,255,0.1);
    }

    .login-box h2 {
      text-align: center;
      color: #ffc0cb;
    }

    .login-box input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
    }

    .login-box button {
      width: 100%;
      padding: 10px;
      background-color: #ffc0cb;
      color: #000;
      border: none;
      border-radius: 5px;
      font-weight: bold;
    }

    .login-box button:hover {
      background-color: #ff8ea1;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <form class="login-box" method="post">
    <h2>Login</h2>
    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit" name="login">Masuk</button>
  </form>
</body>
</html>
