<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
  header("Location: login.php");
  exit;
}
?>
<h2>Pembayaran berhasil!</h2>
<p><a href="home.php">Kembali ke beranda</a></p>
