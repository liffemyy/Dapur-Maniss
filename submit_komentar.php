<?php
session_start();
include 'db.php';

if (isset($_POST['resep_id'], $_POST['isi']) && isset($_SESSION['user_id'])) {
    $resep_id = $_POST['resep_id'];
    $isi = $_POST['isi'];
    $user_id = $_SESSION['user_id'];

    // Ambil nama user
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = '$user_id'");
    $user = mysqli_fetch_assoc($result);
    $nama = $user['username'];

    // Simpan komentar
    $stmt = $conn->prepare("INSERT INTO komentar (user_id, nama, resep_id, isi) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $user_id, $nama, $resep_id, $isi);
    $stmt->execute();

    // Redirect ke halaman resep + auto scroll
    header("Location: detail.php?id=$resep_id&scroll=komentar");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>
