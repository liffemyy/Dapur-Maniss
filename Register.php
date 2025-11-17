<?php
include 'db.php';
include 'navbar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simpan ke database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Register - DapurManis</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #fffaf5;
    color: #333;
  }
  .header {
    background-color: #f8d9c4;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 20px;
    border-bottom: 3px solid #c45b4d;
  }
  .logo-nav {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .logo {
    height: 50px;
    border-radius: 8px;
  }
  .brand-name {
    font-size: 24px;
    color: #c45b4d;
    margin: 0;
  }
  .register-container {
    max-width: 350px;
    margin: 60px auto;
    padding: 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    text-align: center;
  }
  h2 {
    color: #c45b4d;
    margin-bottom: 20px;
  }
  input {
    width: 90%;
    padding: 10px;
    margin: 8px 0;
    border: 2px solid #c45b4d;
    border-radius: 8px;
    outline: none;
  }
  input:focus {
    border-color: #a13e32;
    box-shadow: 0 0 5px rgba(196,91,77,0.5);
  }
  button {
    background-color: #c45b4d;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
    margin-top: 10px;
  }
  button:hover {
    background-color: #a13e32;
  }
  .login-link {
    display: block;
    margin-top: 15px;
    font-size: 14px;
  }
  .login-link a {
    color: #c45b4d;
    text-decoration: none;
  }
  .login-link a:hover {
    text-decoration: underline;
  }
</style>
</head>
<body>

<div class="register-container">
  <h2>Register</h2>
  <form method="POST" action="register.php">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Daftar</button>
  </form>
  <div class="login-link">
    Sudah punya akun? <a href="login.php">Login di sini</a>
  </div>
</div>

</body>
</html>
