<?php
session_start();
include 'db.php';
include 'navbar.php'; 

$error = '';

// Cek kalau ada form yang dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $redirect = $_POST['redirect'] ?? ''; // Ambil redirect dari form hidden

    // Cari user di database
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['user_id'] = $data['ID'];   
        $_SESSION['username'] = $data['username'];
        $_SESSION['foto_profil'] = $data['foto_profil'] ?? 'default.png'; // AKU TAMBAHIN INI!

        // Kalau ada redirect, balik ke halaman sebelumnya
        if (!empty($redirect)) {
            header("Location: " . $redirect);
        } else {
            header("Location: home.php");
        }
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login - DapurManis</title>
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
  .login-container {
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
    width: 95%;
  }
  button:hover {
    background-color: #a13e32;
  }
  .register-link {
    display: block;
    margin-top: 15px;
    font-size: 14px;
  }
  .register-link a {
    color: #c45b4d;
    text-decoration: none;
  }
  .register-link a:hover {
    text-decoration: underline;
  }
  .error {
    color: red;
    margin-bottom: 10px;
  }
</style>
</head>
<body>

<div class="login-container">
  <h2>Login</h2>

  <?php if (!empty($error)) : ?>
    <p class="error"><?= $error; ?></p>
  <?php endif; ?>

  <form method="POST" action="login.php">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>

    <!-- Tambahan hidden field redirect -->
    <input type="hidden" name="redirect" value="<?= htmlspecialchars($_GET['redirect'] ?? '') ?>">

    <button type="submit">Login</button>
  </form>

  <div class="register-link">
    Belum punya akun? <a href="register.php">Daftar di sini</a>
  </div>
</div>

</body>
</html>