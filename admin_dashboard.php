<?php
include 'db.php';
session_start();

// Cek login admin
if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: admin_login.php");
  exit;
}

// Ambil komentar + user + resep_id
$query = "
  SELECT 
    k.id AS komentar_id,
    k.user_id,
    k.nama AS user_nama,
    k.isi AS komentar_isi,
    k.tanggal AS komentar_tanggal,
    k.resep_id,
    u.username,
    u.role
  FROM komentar k
  LEFT JOIN users u ON k.user_id = u.ID
  ORDER BY k.tanggal DESC
";

$result = mysqli_query($conn, $query);
if (!$result) {
  die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin - DapurManis</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; }
    body { font-family: 'Poppins', sans-serif; background: #fffaf5; margin: 0; padding: 0; }
    .navbar {
      background: #f8d9c4; padding: 14px 24px; display: flex; justify-content: space-between;
      align-items: center; border-bottom: 4px solid #c45b4d; box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .navbar h1 { color: #c45b4d; margin: 0; font-size: 24px; font-weight: 600; }
    .navbar a { background: #c45b4d; color: white; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-weight: 500; transition: 0.2s; }
    .navbar a:hover { background: #a6423a; }

    .container { max-width: 1000px; margin: 30px auto; padding: 0 20px; }
    h2 { color: #c45b4d; text-align: center; margin-bottom: 25px; font-weight: 600; font-size: 22px; }

    .komentar-card {
      background: white; border-radius: 14px; padding: 20px; margin-bottom: 22px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease;
      border: 1px solid #ffe0d8;
    }
    .komentar-card:hover { 
      box-shadow: 0 8px 20px rgba(0,0,0,0.12); 
      transform: translateY(-3px); 
    }

    .header { 
      display: flex; justify-content: space-between; align-items: flex-start; 
      flex-wrap: wrap; gap: 10px; margin-bottom: 10px; 
    }
    .user-info { display: flex; flex-direction: column; gap: 4px; }
    .user { font-weight: 600; color: #c45b4d; font-size: 1.05em; }
    .resep-link { 
      background: #c45b4d; color: white; padding: 4px 10px; border-radius: 6px; 
      font-size: 0.85em; text-decoration: none; font-weight: 500;
    }
    .resep-link:hover { background: #a6423a; }
    .tanggal { color: #777; font-size: 0.88em; }

    .isi { 
      margin: 12px 0; line-height: 1.7; color: #333; font-size: 0.98em; 
      background: #fdf5f5; padding: 12px; border-radius: 8px; border-left: 3px solid #c45b4d;
    }

    /* BALASAN */
    .balasan {
      margin: 18px 0 0 40px; padding: 14px; background: #ffe9eb;
      border-left: 4px solid #c45b4d; border-radius: 0 10px 10px 10px; font-size: 0.94em;
    }
    .balasan-header { 
      display: flex; justify-content: space-between; align-items: center; 
      margin-bottom: 6px; flex-wrap: wrap; gap: 8px;
    }
    .admin { color: #a64c3c; font-weight: 600; font-size: 0.92em; }
    .hapus-balasan { 
      background: none; border: none; color: #e74c3c; font-size: 0.82em; 
      cursor: pointer; text-decoration: underline; font-weight: 500;
    }
    .hapus-balasan:hover { color: #c0392b; }

    /* FORM BALAS */
    .form-balas { 
      margin-top: 18px; padding-top: 14px; border-top: 1px dashed #ffb3a7; 
    }
    .form-balas textarea { 
      width: 100%; padding: 11px; border: 1px solid #ddd; border-radius: 8px; 
      resize: none; font-size: 0.93em; font-family: inherit; margin-bottom: 10px;
    }
    .form-balas button { 
      background: #c45b4d; color: white; border: none; padding: 9px 18px; 
      border-radius: 7px; cursor: pointer; font-size: 0.92em; font-weight: 500;
    }
    .form-balas button:hover { background: #a6423a; }

    .empty { 
      text-align: center; color: #aaa; padding: 50px 20px; 
      font-style: italic; background: #fdf5f5; border-radius: 12px; 
      border: 2px dashed #ffb3a7; font-size: 1.1em;
    }

    @media (max-width: 600px) {
      .container { padding: 0 15px; }
      .header { flex-direction: column; align-items: flex-start; }
      .balasan { margin-left: 20px; }
    }
  </style>
</head>
<body>

  <div class="navbar">
    <h1>Dashboard Admin</h1>
    <a href="admin_logout.php">Logout</a>
  </div>

  <div class="container">
    <h2>Daftar Komentar Pengguna</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
      <?php while ($k = mysqli_fetch_assoc($result)): ?>
        <div class="komentar-card">
          <div class="header">
            <div class="user-info">
              <div class="user"><?= htmlspecialchars($k['user_nama'] ?: $k['username']) ?></div>
              <a href="detail.php?id=<?= $k['resep_id'] ?>" class="resep-link" target="_blank">
                Lihat Resep ID: <?= $k['resep_id'] ?>
              </a>
            </div>
            <div class="tanggal"><?= date('d M Y, H:i', strtotime($k['komentar_tanggal'])) ?></div>
          </div>
          <div class="isi"><?= nl2br(htmlspecialchars($k['komentar_isi'])) ?></div>

          <!-- BALASAN -->
          <?php
          $stmt = $conn->prepare("SELECT b.*, u.username FROM balasan b JOIN users u ON b.user_id = u.ID WHERE b.komentar_id = ? ORDER BY b.tanggal ASC");
          $stmt->bind_param("i", $k['komentar_id']);
          $stmt->execute();
          $balasan_result = $stmt->get_result();
          while ($b = $balasan_result->fetch_assoc()):
          ?>
            <div class="balasan">
              <div class="balasan-header">
                <span class="admin"><?= htmlspecialchars($b['username']) ?> (Admin)</span>
                <form action="hapus_balasan.php" method="POST" style="display:inline;" onsubmit="return confirm('Hapus balasan ini?')">
                  <input type="hidden" name="balasan_id" value="<?= $b['id'] ?>">
                  <input type="hidden" name="resep_id" value="<?= $k['resep_id'] ?>">
                  <button type="submit" class="hapus-balasan">Hapus</button>
                </form>
              </div>
              <div><?= nl2br(htmlspecialchars($b['isi'])) ?></div>
            </div>
          <?php endwhile; ?>

          <!-- FORM BALAS -->
          <div class="form-balas">
            <form action="submit_balasan.php" method="POST">
              <input type="hidden" name="komentar_id" value="<?= $k['komentar_id'] ?>">
              <input type="hidden" name="resep_id" value="<?= $k['resep_id'] ?>">
              <textarea name="isi" rows="2" placeholder="Tulis balasan admin..." required></textarea>
              <button type="submit">Kirim Balasan</button>
            </form>
          </div>

          <!-- HAPUS KOMENTAR DIHAPUS TOTAL -->
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p class="empty">Belum ada komentar. Tunggu pengguna aktif ya!</p>
    <?php endif; ?>
  </div>

</body>
</html>