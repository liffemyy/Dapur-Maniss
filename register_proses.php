<?php
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password']; // kalau mau aman, nanti bisa di-hash

// Cek apakah username sudah dipakai
$check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
if (mysqli_num_rows($check) > 0) {
    echo "Username sudah digunakan. <a href='register.php'>Coba lagi</a>";
    exit;
}

// Simpan ke database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
if (mysqli_query($conn, $sql)) {
    echo "Pendaftaran berhasil! <a href='login.html'>Login sekarang</a>";
} else {
    echo "Terjadi kesalahan: " . mysqli_error($conn);
}
?>
