<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit;
}

$balasan_id = $_POST['balasan_id'];
$resep_id = $_POST['resep_id'];

$stmt = $conn->prepare("DELETE FROM balasan WHERE id = ?");
$stmt->bind_param("i", $balasan_id);
$stmt->execute();

header("Location: admin_dashboard.php");
exit;
?>