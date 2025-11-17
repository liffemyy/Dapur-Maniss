<?php
session_start();
include 'db.php';

if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_resep = intval($_POST['id_resep']);
    $user_id = $_SESSION['user_id'];
    $komentar = mysqli_real_escape_string($conn, $_POST['komentar']);

    $sql = "INSERT INTO komentar (id_resep, user_id, komentar) VALUES ($id_resep, $user_id, '$komentar')";
    mysqli_query($conn, $sql);

    header("Location: detail_resep.php?id=" . $id_resep);
    exit;
}
?>
