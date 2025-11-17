<?php
session_start();
include 'db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // AMAN: Prepared Statement
    $query = "SELECT * FROM users WHERE username = ? AND role = 'admin' LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $admin['ID'];        // HURUF BESAR!
            $_SESSION['admin_username'] = $admin['username'];
            header('Location: admin_dashboard.php');
            exit;
        } else {
            $error = 'Password salah.';
        }
    } else {
        $error = 'Akun admin tidak ditemukan.';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login Admin - DapurManis</title>
<style>
  body { background:#fff5f2; font-family:Arial; display:flex; justify-content:center; align-items:center; height:100vh; margin:0; }
  .login-container { background:white; padding:30px 40px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1); text-align:center; width:320px; }
  h2 { color:#c45b4d; margin-bottom:20px; }
  input[type="text"], input[type="password"] { width:90%; padding:10px; margin:8px 0; border:1px solid #ccc; border-radius:6px; }
  .form-actions { display:flex; justify-content:space-between; align-items:center; margin-top:15px; gap:10px; flex-wrap:wrap; }
  button { background:#c45b4d; color:white; padding:10px 20px; border:none; border-radius:6px; cursor:pointer; flex:1; min-width:100px; }
  button:hover { background:#a64c3c; }
  .error { color:red; font-size:14px; margin:10px 0; }
  .register-link { color:#c45b4d; text-decoration:none; font-size:14px; }
  .register-link:hover { text-decoration:underline; }
  .back-link { margin-top:20px; display:block; color:#c45b4d; text-decoration:none; }
  @media (max-width:480px) { .form-actions { justify-content:center; } button { width:100%; } }
</style>
</head>
<body>
  <div class="login-container">
    <h2>Login Admin</h2>
    <?php if ($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <form method="POST">
      <input type="text" name="username" placeholder="Username admin" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <div class="form-actions">
        <button type="submit">Login</button>
        <a href="admin_register.php" class="register-link">Belum punya akun?</a>
      </div>
    </form>
    <a href="home.php" class="back-link">Kembali ke Beranda</a>
  </div>
</body>
</html>