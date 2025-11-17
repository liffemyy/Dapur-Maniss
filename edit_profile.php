<?php
session_start();
include 'db.php';
include 'navbar.php';

// Pastikan user login
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php?redirect=edit_profile.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil data user dari database
$sql = "SELECT username, foto_profil FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Saat tombol disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $foto_baru = $user['foto_profil']; // default: foto lama

    // Cek jika ada file baru yang diupload
    if (!empty($_FILES['foto_profil']['name'])) {
        $target_dir = "uploads/";
        $file_name = basename($_FILES['foto_profil']['name']);
        $target_file = $target_dir . time() . "_" . $file_name; // supaya unik
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi tipe file
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($file_type, $allowed_types)) {
            // Upload file baru
            if (move_uploaded_file($_FILES['foto_profil']['tmp_name'], $target_file)) {
                // Hapus foto lama kalau bukan default
                if (!empty($user['foto_profil']) && $user['foto_profil'] !== 'default.jpg') {
                    $old_file = "uploads/" . $user['foto_profil'];
                    if (file_exists($old_file)) unlink($old_file);
                }
                $foto_baru = basename($target_file);
            }
        } else {
            echo "<script>alert('Format file tidak valid! Gunakan JPG, JPEG, PNG, atau GIF.');</script>";
        }
    }

    // Update ke database
    $update_sql = "UPDATE users SET username='$username', foto_profil='$foto_baru' WHERE id='$user_id'";
    if (mysqli_query($conn, $update_sql)) {
        // 🔥 Tambahkan ini untuk memperbarui session
        $_SESSION['username'] = $username;
        $_SESSION['foto_profil'] = 'uploads/' . $foto_baru;

        echo "<script>alert('Profil berhasil diperbarui!'); window.location='profile.php';</script>";
        exit;
    } else {
        echo "<script>alert('Terjadi kesalahan saat memperbarui profil.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Profil - DapurManis</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #fffaf5;
    margin: 0;
    padding: 0;
  }
  .edit-container {
    max-width: 500px;
    margin: 50px auto;
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  }
  h2 {
    text-align: center;
    color: #c45b4d;
  }
  .form-group {
    margin-bottom: 15px;
  }
  label {
    display: block;
    margin-bottom: 5px;
    color: #c45b4d;
    font-weight: bold;
  }
  input[type="text"],
  input[type="file"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 6px;
  }
  .profile-pic {
    display: block;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    margin: 10px auto;
    border: 3px solid #c45b4d;
  }
  .btn {
    background-color: #c45b4d;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
  }
  .btn:hover {
    background-color: #a13e32;
  }
  .back {
    text-align: center;
    margin-top: 15px;
  }
  .back a {
    color: #c45b4d;
    text-decoration: none;
  }
</style>
</head>
<body>

<div class="edit-container">
  <h2>Edit Profil</h2>

  <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label>Username:</label>
      <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
    </div>

    <div class="form-group">
      <label>Foto Profil:</label>
      <img src="uploads/<?= htmlspecialchars($user['foto_profil'] ?: 'default.jpg') ?>" class="profile-pic">
      <input type="file" name="foto_profil" accept="image/*">
    </div>

    <button type="submit" class="btn">Simpan Perubahan</button>

    <div class="back">
      <a href="profile.php">← Kembali ke Profil</a>
    </div>
  </form>
</div>

</body>
</html>
