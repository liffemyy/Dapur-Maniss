<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db.php';

// Ambil data user terbaru kalau sudah login
if (isset($_SESSION['isLoggedIn']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $result = mysqli_query($conn, "SELECT username, foto_profil, role FROM users WHERE id = '$user_id'");
    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user_data['username'];
        $_SESSION['foto_profil'] = !empty($user_data['foto_profil']) 
            ? 'uploads/' . $user_data['foto_profil'] 
            : 'uploads/default.jpg';
        $_SESSION['role'] = $user_data['role'];
    }
}
?>

<style>
  /* Navbar */
  .navbar {
    background-color: #f8d9c4;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 20px;
    border-bottom: 3px solid #c45b4d;
  }
  .navbar-left {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .navbar-left img {
    height: 45px;
    border-radius: 8px;
  }
  .navbar-left h1 {
    font-size: 22px;
    color: #c45b4d;
    margin: 0;
  }

  /* User dropdown */
  .user-nav {
    position: relative;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .user-photo {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #c45b4d;
  }
  .dropdown {
    position: relative;
    display: inline-block;
  }
  .dropbtn {
    background-color: #f8d9c4;
    color: #c45b4d;
    font-size: 15px;
    border: none;
    cursor: pointer;
    padding: 8px 14px;
    border-radius: 6px;
  }
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 160px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    border-radius: 6px;
    z-index: 10;
    right: 0;
  }
  .dropdown-content a {
    color: #c45b4d;
    padding: 10px 14px;
    text-decoration: none;
    display: block;
  }
  .dropdown-content a:hover {
    background-color: #f8d9c4;
  }
  .dropdown:hover .dropdown-content {
    display: block;
  }
  .dropdown:hover .dropbtn {
    background-color: #c45b4d;
    color: white;
  }
</style>

<div class="navbar">
  <!-- Logo kiri -->
  <div class="navbar-left">
    <a href="home.php" style="text-decoration:none; display:flex; align-items:center; gap:10px;">
      <img src="Gambar WhatsApp 2025-07-30 pukul 14.20.33_764f546c.jpg" alt="Logo DapurManis">
      <h1>DapurManis</h1>
    </a>
  </div>

  <!-- Dropdown kanan -->
  <div class="user-nav">
    <?php if (isset($_SESSION['foto_profil']) && !empty($_SESSION['foto_profil'])): ?>
      <img src="<?= htmlspecialchars($_SESSION['foto_profil']) ?>" alt="Foto Profil" class="user-photo">
    <?php else: ?>
      <img src="uploads/default.jpg" alt="Foto Profil Default" class="user-photo">
    <?php endif; ?>

    <div class="dropdown">
      <button class="dropbtn">
        Hai, <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'pengunjung' ?> 👋
      </button>
      <div class="dropdown-content">
        <?php if (!isset($_SESSION['isLoggedIn'])): ?>
          <a href="login.php">Login</a>
          <a href="register.php">Register</a>
          <a href="admin_login.php">Login Admin</a>
          <a href="home.php">Beranda</a>
        <?php else: ?>
          <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <a href="admin_dashboard.php">Admin Dashboard</a>
          <?php endif; ?>
          <a href="profile.php">Lihat Profil</a>
          <a href="home.php">Beranda</a>
          <a href="logout.php">Logout</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
