<?php
session_start();
include 'db.php';

// Cek kalau sudah login, langsung arahkan ke halaman admin
if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true) {
    header("Location: admin_dashboard.php");
    exit;
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($password !== $confirm) {
        $error = "Password dan konfirmasi tidak sama!";
    } else {
        // Hash password
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        // Cek apakah username sudah dipakai
        $check = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
        if (mysqli_num_rows($check) > 0) {
            $error = "Username sudah digunakan!";
        } else {
            // Masukkan data admin
            $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed', 'admin')";
            if (mysqli_query($conn, $sql)) {
                $success = "Admin baru berhasil didaftarkan! 🎉";
            } else {
                $error = "Terjadi kesalahan: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Register Admin - DapurManis</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #fff5ef;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  .register-container {
    background: white;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    width: 350px;
  }
  h2 {
    text-align: center;
    color: #c45b4d;
  }
  input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
  }
  button {
    width: 100%;
    padding: 10px;
    background-color: #c45b4d;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
  }
  button:hover {
    background-color: #a43e32;
  }
  .message {
    text-align: center;
    margin-top: 10px;
    font-size: 14px;
  }
  .error { color: red; }
  .success { color: green; }
  a {
    color: #c45b4d;
    text-decoration: none;
  }
</style>
</head>
<body>

<div class="register-container">
  <h2>Register Admin</h2>

  <?php if (isset($error)): ?>
    <div class="message error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <?php if (isset($success)): ?>
    <div class="message success"><?= htmlspecialchars($success) ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="confirm" placeholder="Konfirmasi Password" required>
    <button type="submit">Daftar Admin</button>
  </form>

  <div class="message">
    <p>Sudah punya akun admin? <a href="admin_login.php">Login di sini</a></p>
  </div>
</div>

</body>
</html>
