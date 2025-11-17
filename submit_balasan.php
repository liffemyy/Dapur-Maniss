<?php
session_start();
include 'db.php';

// Cek login admin
if (!isset($_SESSION['admin_logged_in'])) {
    die("Akses ditolak. Silakan login sebagai admin.");
}

// PASTIKAN admin_id ADA
if (!isset($_SESSION['admin_id'])) {
    die("Error: ID admin tidak ditemukan. Login ulang.");
}

$komentar_id = intval($_POST['komentar_id'] ?? 0);
$isi = trim($_POST['isi'] ?? '');

if ($komentar_id > 0 && !empty($isi)) {
    $user_id = $_SESSION['admin_id']; // GUNAKAN admin_id!

    $query = "INSERT INTO balasan (komentar_id, user_id, isi) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "iis", $komentar_id, $user_id, $isi);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Gagal menyimpan: " . mysqli_error($conn);
    }
} else {
    echo "Komentar atau balasan kosong.";
}
?>