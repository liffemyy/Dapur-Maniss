<?php
session_start();
include 'db.php';

// CEK ADMIN (sesuai session kamu)
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] != 1) {
    die("Akses ditolak. Anda bukan admin.");
}

// CEK ID (pastikan name="komentar_id")
if (!isset($_POST['id'])) {
    die("ID komentar tidak ditemukan.");
}

$id = intval($_POST['id']);

if ($id <= 0) {
    die("ID tidak valid.");
}

// HAPUS
$query = "DELETE FROM komentar WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Gagal hapus: " . mysqli_error($conn));
}

// Redirect
$redirect = $_SERVER['HTTP_REFERER'] ?? 'dashboard.php';
header("Location: $redirect");
exit;
?>