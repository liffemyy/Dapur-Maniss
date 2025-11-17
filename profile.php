<?php
session_start();
include 'db.php';
include 'navbar.php';

// Pastikan user login
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php?redirect=profile.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil data user
$sql = "SELECT username, tanggal_gabung, foto_profil FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Kalau user belum punya foto, pakai default
$foto = !empty($user['foto_profil']) ? 'uploads/' . $user['foto_profil'] : 'uploads/default.jpg';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Profil Saya - DapurManis</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #fffaf5;
    margin: 0;
    padding: 0;
  }
  .profile-container {
    max-width: 500px;
    margin: 50px auto;
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    text-align: center;
  }
  h2 {
    text-align: center;
    color: #c45b4d;
  }
  .profile-pic {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 15px;
    border: 3px solid #c45b4d;
  }
  .info {
    margin: 10px 0;
    font-size: 16px;
  }
  .info span {
    font-weight: bold;
    color: #c45b4d;
  }
  .btn {
    display: block;
    width: 100%;
    text-align: center;
    margin-top: 20px;
  }
  .btn a {
    background-color: #c45b4d;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 8px;
  }
  .btn a:hover {
    background-color: #a13e32;
  }
</style>
</head>
<body>

<div class="profile-container">
  <h2>Profil Saya</h2>

  <!-- Foto Profil -->
  <img src="<?= htmlspecialchars($foto) ?>" alt="Foto Profil" class="profile-pic">

  <div class="info"><span>Username:</span> <?= htmlspecialchars($user['username']) ?></div>
  <div class="info"><span>Tanggal Gabung:</span> <?= htmlspecialchars($user['tanggal_gabung']) ?></div>

  <div class="btn">
    <a href="edit_profile.php">Edit Profil</a>
  </div>
</div>

</body>
</html>
