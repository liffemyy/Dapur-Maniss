<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
  <?php include 'navbar.php'; ?>
<head>
  <title>Beranda - DapurManis</title>
  <link rel="stylesheet" href="style.css">
<style>
  /* Style umum */
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #fffaf5;
    color: #333;
  }
  h2 {
    text-align: center;
    color: #c45b4d;
  }
  .header {
    background-color: #f8d9c4;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 20px;
    border-bottom: 3px solid #c45b4d;
  }
  .logo-nav {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .logo {
    height: 50px;
    border-radius: 8px;
  }
  .brand-name {
    font-size: 24px;
    color: #c45b4d;
    margin: 0;
  }

  /* 🔍 Search & Filter */
  .search-filter {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin: 20px auto;
    flex-wrap: wrap;
    padding: 0 20px;
  }
  .search-filter input, 
  .search-filter select {
    padding: 10px 15px;
    border: 2px solid #c45b4d;
    border-radius: 8px;
    font-size: 14px;
    outline: none;
    background: white;
    transition: 0.3s ease;
  }
  .search-filter input:focus,
  .search-filter select:focus {
    border-color: #a13e32;
    box-shadow: 0 0 5px rgba(196,91,77,0.5);
  }

  /* Grid resep */
  .resep-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 20px;
    padding: 20px;
    max-width: 1100px;
    margin: auto;
  }
  .resep-item {
    background-color: white;
    border-radius: 12px;
    overflow: hidden;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .resep-item:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
  }
  .resep-item img {
    width: 100%;
    height: 150px;
    object-fit: cover;
  }
  .resep-item p {
    margin: 10px 0;
    color: #c45b4d;
    font-weight: bold;
  }
</style>

</head>
<body>
  


  <h2>Resep DapurManis</h2>
  <!-- 🔍 Search dan Filter -->
  <div class="search-filter">
    <input type="text" id="searchInput" placeholder="Cari resep...">
    <select id="filterCaraMasak">
      <option value="">Semua Cara Masak</option>
      <option value="Panggang">Panggang</option>
      <option value="goreng">Goreng</option>
      <option value="airfryer">Air Fryer</option>
      <option value="kukus">Kukus</option>
    </select>
  </div>

  <div class="resep-grid">
    <div class="resep-item" data-cara="Panggang">
      <a href="detail.php?id=1">
        <img src="cheesecakebrownie.jpg" alt="Brownies Cheesecake">
        <p>Brownies Cheesecake</p>
      </a>
    </div>
    <div class="resep-item" data-cara="goreng">
      <a href="detail.php?id=2">
        <img src="Gambar WhatsApp 2025-08-03 pukul 11.37.29_3d162bf9.jpg" alt="Donat Jadoel">
        <p>Donat Jadoel</p>
      </a>
    </div>
    <div class="resep-item" data-cara="Panggang">
      <a href="detail.php?id=3">
        <img src="Gambar WhatsApp 2025-08-03 pukul 11.37.28_8de520f0.jpg" alt="Bolen">
        <p>Bolen</p>
      </a>
    </div>
    <div class="resep-item" data-cara="Panggang">
      <a href="detail.php?id=4">
        <img src="brownies.jpg" alt="Brownies">
        <p>Brownies</p>
      </a>
    </div>
    <div class="resep-item" data-cara="Panggang">
      <a href="detail.php?id=5">
        <img src="chocolate chip cookies.jpg" alt="Soft Baked Chocolate Chip Cookies">
        <p>Soft Baked Chocolate Chip Cookies</p>
      </a>
    </div>
    <div class="resep-item" data-cara="kukus">
      <a href="detail.php?id=6">
        <img src="Bakpao.jpg" alt="bakpao">
        <p>Bakpao Coklat</p>
      </a>
    </div>
    <div class="resep-item" data-cara="goreng">
      <a href="detail.php?id=7">
        <img src="mochi donat.jpg" alt="Mochi Donat">
        <p>Mochi Donat</p>
      </a>
    </div>
    <div class="resep-item" data-cara="kukus">
      <a href="detail.php?id=8">
        <img src="Klepon.jpg" alt="Klepon">
        <p>Klepon</p>
      </a>
    </div>
    <div class="resep-item" data-cara="Panggang">
      <a href="detail.php?id=9">
        <img src="botantemju.jpg" alt="Bolu ketan hitam keju Karamel">
        <p>Bolu Ketan Hitam Keju Karamel</p>
      </a>
    </div>
    <div class="resep-item" data-cara="airfryer">
      <a href="detail.php?id=10">
        <img src="Brownies Airfrayer.jpg" alt="Brownies Air Fryer">
        <p>Brownies Air Fryer</p>
      </a>
    </div>
    <div class="resep-item" data-cara="goreng">
      <a href="detail.php?id=11">
        <img src="churros.jpg" alt="Churros">
        <p>Churros</p>
      </a>
    </div>
    <div class="resep-item" data-cara="airfryer">
      <a href="detail.php?id=12">
        <img src="piesusu.jpg" alt="Pie susu">
        <p>Pie Susu Air Fryer</p>
      </a>
    </div>
    <div class="resep-item" data-cara="kukus">
      <a href="detail.php?id=13">
        <img src="bolukukus.jpg" alt="Bolu Kukus">
        <p>Bolu Kukus</p>
      </a>
    </div>
    <div class="resep-item" data-cara="Panggang">
      <a href="detail.php?id=14">
        <img src="cinnamonroll.jpg" alt="Cinnamon roll">
        <p>Cinnamon Rolls</p>
      </a>
    </div>
    <div class="resep-item" data-cara="kukus">
      <a href="detail.php?id=15">
        <img src="lavacake.jpg" alt="Lava Cake">
        <p>Lava Cake</p>
      </a>
    </div>
    <div class="resep-item" data-cara="Panggang">
      <a href="detail.php?id=16">
        <img src="cromboloni.jpg" alt="Cromboloni">
        <p>Cromboloni</p>
      </a>
    </div>
    <div class="resep-item" data-cara="goreng">
      <a href="detail.php?id=17">
        <img src="Bomboloni.jpg" alt="bomboloni">
        <p>Bomboloni</p>
      </a>
    </div>
    <div class="resep-item" data-cara="airfryer">
      <a href="detail.php?id=18">
        <img src="cupcake.jpg" alt="Cupcake air fryer">
        <p>Cupcake Air Fryer</p>
      </a>
    </div>
    <div class="resep-item" data-cara="airfryer">
      <a href="detail.php?id=19">
        <img src="bananacake.jpg" alt="Banana Cake">
        <p>Banana Cake</p>
      </a>
    </div>
    <div class="resep-item" data-cara="kukus">
      <a href="detail.php?id=20">
        <img src="lapislegitkukus.jpg" alt="Lapis Legit Kukus">
        <p>Lapis Legit Kukus</p>
      </a>
    </div>
  </div>



  <!-- Script Search & Filter -->
  <script>
    function filterResep() {
      let searchValue = document.getElementById("searchInput").value.toLowerCase();
      let filterValue = document.getElementById("filterCaraMasak").value;
      let items = document.querySelectorAll(".resep-item");

      items.forEach(item => {
        let title = item.innerText.toLowerCase();
        let cara = item.getAttribute("data-cara");

        let cocokSearch = title.includes(searchValue);
        let cocokFilter = filterValue === "" || cara === filterValue;

        item.style.display = (cocokSearch && cocokFilter) ? "" : "none";
      });
    }

    document.getElementById("searchInput").addEventListener("keyup", filterResep);
    document.getElementById("filterCaraMasak").addEventListener("change", filterResep);
  </script>
</body>
</html>
