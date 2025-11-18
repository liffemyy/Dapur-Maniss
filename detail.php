<?php
session_start();
include 'db.php';

$id = $_GET['id']; // ambil id resep dari URL

// ambil semua komentar untuk resep ini
$komentar_result = mysqli_query($conn, "SELECT * FROM komentar WHERE resep_id = '$id' ORDER BY tanggal DESC");



error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = isset($_GET['id']) ? $_GET['id'] : '';
$judul = '';
$gambar = '';
$konten = '';

if ($id == '1') {
  $judul = 'Brownies Cheesecake';
  $gambar ='cheesecakebrownie.jpg';
  $konten = '
    <h3>Bahan Brownies:</h3>
<ul>
  <li>150 gr dark chocolate</li>
  <li>100 gr butter</li>
  <li>120 gr gula pasir</li>
  <li>2 butir telur</li>
  <li>80 gr tepung terigu</li>
  <li>2 sdm coklat bubuk</li>
  <li>1/2 sdt vanili bubuk</li>
  <li>Sejumput garam</li>
</ul>

<h3>Bahan Cream Cheese:</h3>
<ul>
  <li>200 gr cream cheese</li>
  <li>50 gr gula pasir / gula halus</li>
  <li>1 butir telur</li>
  <li>1 sdt air lemon (opsional)</li>
  <li>1 sdt vanila essence</li>
</ul>

<h3>Cara Membuat Brownies:</h3>
<ol>
  <li>Lelehkan dark chocolate dan butter dengan cara ditim atau microwave. Aduk hingga rata dan biarkan hangat.</li>
  <li>Masukkan gula ke dalam campuran coklat dan butter, aduk rata.</li>
  <li>Tambahkan telur satu per satu sambil diaduk hingga tercampur baik.</li>
  <li>Masukkan tepung terigu, coklat bubuk, vanili, dan garam. Aduk menggunakan spatula hingga tercampur rata.</li>
  <li>Tuang 2/3 adonan brownies ke loyang yang telah dialasi baking paper.</li>
</ol>

<h3>Cara Membuat Cream Cheese:</h3>
<ol>
  <li>Kocok cream cheese dan gula hingga lembut dan halus.</li>
  <li>Masukkan telur, vanila essence, dan air lemon. Kocok hingga tercampur rata.</li>
</ol>

<h3>Penyelesaian:</h3>
<ol>
  <li>Tuang adonan cream cheese di atas lapisan brownies.</li>
  <li>Tambahkan sisa adonan brownies di atasnya dan buat motif swirl menggunakan tusuk sate.</li>
  <li>Panggang di oven suhu 170°C selama 30–40 menit atau hingga matang.</li>
  <li>Dinginkan sebelum dipotong agar lapisan cheesecake set sempurna.</li>
</ol>
  ';
  } else if ($id == '2') {
  $judul = 'Donat Jadul';
  $gambar = 'Gambar WhatsApp 2025-08-03 pukul 11.37.29_3d162bf9.jpg'; 
  $konten = '
    <h3>Bahan:</h3>
<ul>
  <li>500 gr tepung terigu protein tinggi</li>
  <li>2 sdm susu bubuk</li>
  <li>11 gr ragi instan</li>
  <li>100 gr gula pasir</li>
  <li>2 butir kuning telur</li>
  <li>250 ml air dingin atau susu cair dingin</li>
  <li>50 gr margarin</li>
  <li>1/2 sdt garam</li>
  <li>Minyak untuk menggoreng</li>
</ul>

<h3>Cara Membuat:</h3>
<ol>
  <li>Campur tepung terigu, susu bubuk, gula pasir, dan ragi instan dalam satu wadah. Aduk hingga rata.</li>
  <li>Masukkan kuning telur dan air/susu sedikit demi sedikit sambil diuleni hingga setengah kalis.</li>
  <li>Tambahkan margarin dan garam. Uleni kembali hingga kalis elastis.</li>
  <li>Tutup adonan dengan kain bersih atau plastik wrap. Diamkan selama 45–60 menit hingga mengembang 2 kali lipat.</li>
  <li>Kempiskan adonan, lalu bentuk bulat dan lubangi tengahnya atau gunakan cetakan donat.</li>
  <li>Diamkan kembali selama 15–20 menit hingga mengembang ringan.</li>
  <li>Panaskan minyak dengan api kecil. Goreng donat hingga kuning keemasan. Balik sekali saja agar tidak menyerap minyak terlalu banyak.</li>
  <li>Angkat dan tiriskan. Setelah agak dingin, taburi gula halus atau glaze sesuai selera.</li>
</ol>

  ';
 } else if ($id == '3') {
  $judul = 'Bolen Pisang Cokelat';
  $gambar = 'Gambar WhatsApp 2025-08-03 pukul 11.37.28_8de520f0.jpg'; 
  $konten = '
    <h3>Bahan A:</h3>
    <ul>
      <li>100 gr tepung terigu protein sedang</li>
      <li>40 gr margarin</li>
      <li>30 ml air es</li>
    </ul>

    <h3>Bahan B:</h3>
    <ul>
      <li>100 gr tepung terigu protein sedang</li>
      <li>60 gr margarin</li>
    </ul>

    <h3>Isian:</h3>
    <ul>
      <li>Pisang raja atau kepok, belah dua</li>
      <li>Cokelat batang (atau meses)</li>
      <li>Keju (opsional)</li>
    </ul>

    <h3>Olesan:</h3>
    <ul>
      <li>1 kuning telur + 1 sdt susu cair</li>
    </ul>

    <h3>Cara Membuat:</h3>
    <ol>
      <li>Campur bahan A, uleni sebentar, diamkan 15 menit (tutup).</li>
      <li>Campur bahan B, aduk rata, bentuk bulatan kecil-kecil.</li>
      <li>Ambil adonan A, pipihkan, isi dengan adonan B, bulatkan. Diamkan 15 menit lagi.</li>
      <li>Gilas adonan, lipat amplop, istirahatkan 10 menit, ulangi 2x.</li>
      <li>Gilas tipis, potong, isi pisang, coklat, keju, gulung.</li>
      <li>Susun di loyang, oles kuning telur. Panggang 180°C 25–30 menit sampai matang dan keemasan.</li>
    </ol>
  ';
}else if ($id == '4') {
  $judul = 'Brownies Panggang';
  $gambar = 'brownies.jpg'; 
  $konten = '
    <h3>Bahan:</h3>
    <ul>
      <li>200 gr dark chocolate (DC), cincang</li>
      <li>100 gr margarin atau butter</li>
      <li>150 gr gula pasir</li>
      <li>2 butir telur</li>
      <li>100 gr tepung terigu protein sedang</li>
      <li>25 gr cokelat bubuk</li>
      <li>1/2 sdt baking powder</li>
      <li>1/4 sdt garam</li>
      <li>1 sdt vanila</li>
    </ul>

    <h3>Cara Membuat:</h3>
    <ol>
      <li>Lelehkan DC dan margarin, aduk rata. Biarkan hangat.</li>
      <li>Kocok telur dan gula sampai larut (tidak perlu sampai mengembang).</li>
      <li>Masukkan coklat leleh ke adonan telur, aduk rata.</li>
      <li>Tambahkan vanila, garam, lalu masukkan tepung, coklat bubuk, baking powder. Aduk balik hingga rata.</li>
      <li>Tuang ke loyang ukuran 20x20 cm yang sudah dialasi baking paper.</li>
      <li>Panggang suhu 170°C selama 30–35 menit. Dinginkan sebelum dipotong.</li>
    </ol>
  ';
}else if ($id == '5') {
  $judul = 'Soft Baked Chocolate Chip Cookies';
  $gambar = 'chocolate chip cookies.jpg';
  $konten = '
  <h3>Bahan:</h3>
<ul>
  <li>125 gr butter (suhu ruang)</li>
  <li>100 gr gula pasir</li>
  <li>50 gr gula palm/gula aren bubuk (optional, bikin lebih chewy)</li>
  <li>1 butir telur</li>
  <li>1 sdt vanili</li>
  <li>200 gr tepung terigu protein sedang</li>
  <li>1 sdt baking powder</li>
  <li>1/2 sdt baking soda</li>
  <li>1/4 sdt garam</li>
  <li>100 gr chocolate chips</li>
</ul>

<h3>Cara Membuat:</h3>
<ol>
  <li>Kocok butter, gula pasir, dan gula palm sampai lembut dan tercampur rata (jangan terlalu lama agar tidak terlalu mengembang).</li>
  <li>Masukkan telur dan vanili, aduk rata kembali.</li>
  <li>Ayak tepung terigu, baking powder, baking soda, dan garam. Masukkan ke adonan, aduk perlahan hingga rata menggunakan spatula.</li>
  <li>Tambahkan chocolate chips, aduk hingga merata.</li>
  <li>Ambil adonan menggunakan sendok es krim atau sendok makan, bentuk bulat lalu pipihkan sedikit di loyang yang sudah dialasi baking paper.</li>
  <li>Diamkan adonan di kulkas selama 20–30 menit agar tidak melebar saat dipanggang.</li>
  <li>Panggang dalam oven suhu 170°C selama 12–15 menit hingga pinggirannya kecokelatan tapi tengahnya masih sedikit lembut.</li>
  <li>Angkat, dinginkan di rak selama beberapa menit agar lebih renyah di bagian luar dan chewy di dalam.</li>
</ol>

  ';
}else if ($id == '6') {
  $judul = 'Bakpao Coklat';
  $gambar = 'Bakpao.jpg';
  $konten = '
  <h3>Bahan Kulit Bapao:</h3>
<ul>
  <li>250 gr tepung terigu protein rendah (atau tepung pao)</li>
  <li>1 sdm tepung maizena</li>
  <li>1 sdt ragi instan</li>
  <li>50 gr gula pasir</li>
  <li>150 ml air hangat</li>
  <li>2 sdm minyak goreng / mentega cair</li>
  <li>1/4 sdt garam</li>
</ul>

<h3>Bahan Isian Coklat:</h3>
<ul>
  <li>Meses / coklat batang dipotong kecil</li>
</ul>

<h3>Cara Membuat Kulit Bapao:</h3>
<ol>
  <li>Campur air hangat dan gula, aduk hingga larut. Masukkan ragi, diamkan 5–10 menit sampai berbuih.</li>
  <li>Di mangkuk, campur tepung terigu, maizena, dan garam.</li>
  <li>Tuang larutan ragi sedikit demi sedikit sambil diuleni hingga setengah kalis.</li>
  <li>Tambahkan minyak goreng/mentega cair, uleni lagi hingga adonan halus dan elastis (±10 menit).</li>
  <li>Tutup dengan kain bersih, diamkan 30–45 menit sampai adonan mengembang 2x lipat.</li>
</ol>

<h3>Membentuk Bapao:</h3>
<ol>
  <li>Kempiskan adonan, bagi jadi 10–12 bagian, lalu bulatkan.</li>
  <li>Ambil satu bagian, pipihkan tengahnya, isi dengan coklat atau meses.</li>
  <li>Tutup dan bulatkan kembali, letakkan di atas kertas roti.</li>
  <li>Tutup dan diamkan lagi selama 15 menit.</li>
</ol>

<h3>Mengukus:</h3>
<ol>
  <li>Panaskan kukusan, lapisi tutup kukusan dengan kain agar air tidak menetes.</li>
  <li>Kukus bapao selama 10–12 menit dengan api sedang.</li>
  <li>Jangan buka tutup kukusan selama proses mengukus supaya bapao tidak kempis.</li>
  <li>Angkat dan sajikan hangat.</li>
</ol>
  ';
}else if ($id == '7') {
  $judul = 'Mochi Donat';
  $gambar = 'mochi donat.jpg';
  $konten = '
  <h3>Bahan Donat Mochi:</h3>
<ul>
  <li>200 gr tepung ketan putih</li>
  <li>50 gr tepung terigu protein sedang</li>
  <li>50 gr gula pasir</li>
  <li>200 ml susu cair hangat (atau air hangat)</li>
  <li>1 sdt ragi instan</li>
  <li>1 sdm margarin / butter, lelehkan</li>
  <li>Sejumput garam</li>
</ul>

<h3>Bahan Taburan (Opsional):</h3>
<ul>
  <li>Tepung maizena secukupnya untuk taburan agar tidak lengket</li>
</ul>

<h3>Cara Membuat Adonan:</h3>
<ol>
  <li>Campurkan susu hangat dan gula, aduk hingga larut. Masukkan ragi, diamkan 5–10 menit hingga berbuih.</li>
  <li>Dalam mangkuk, campur tepung ketan dan tepung terigu.</li>
  <li>Tuang larutan ragi sedikit demi sedikit, uleni sampai tercampur rata.</li>
  <li>Tambahkan margarin leleh dan garam, uleni hingga adonan elastis dan lembut. Diamkan 30 menit, tutup dengan kain bersih.</li>
</ol>

<h3>Membentuk Donat Mochi:</h3>
<ol>
  <li>Setelah mengembang, kempiskan adonan lalu bentuk bulat kecil atau bentuk donat (lubang di tengah).</li>
  <li>Taburi tangan atau meja kerja dengan tepung maizena agar tidak lengket.</li>
  <li>Diamkan kembali 10–15 menit sebelum digoreng.</li>
</ol>

<h3>Cara Menggoreng:</h3>
<ol>
  <li>Panaskan minyak dengan api kecil–sedang.</li>
  <li>Goreng donat mochi hingga bagian luar kecokelatan. Balik hanya sekali agar tidak menyerap banyak minyak.</li>
  <li>Angkat dan tiriskan.</li>
</ol>

<h3>Topping dan Pelapis:</h3>
<ul>
  <li><strong>Gula Halus:</strong> Gulingkan donat ke gula halus setelah agak hangat.</li>
  <li><strong>Coklat Leleh:</strong> Celupkan ke coklat batang leleh, bisa ditambah sprinkle / meses.</li>
  <li><strong>Matcha:</strong> Campur white chocolate leleh + bubuk matcha, celupkan donat.</li>
  <li><strong>Tiramisu:</strong> Tabur campuran gula halus + bubuk kopi / coklat.</li>
  <li><strong>Cinnamon Sugar:</strong> Campur gula pasir + bubuk kayu manis, gulingkan donat hangat.</li>
</ul>

<h3>Tips Agar Kenyal & Anti Gagal:</h3>
<ul>
  <li>Gunakan api kecil saat menggoreng agar dalamnya matang dan luar tidak cepat gosong.</li>
  <li>Adonan ketan mudah lengket, jadi taburi tangan dengan maizena saat membentuk.</li>
  <li>Jika ingin lebih chewy, bisa tambahkan 1 sdm tepung tapioka.</li>
</ul>

  ';
}

else if ($id == '8') {
  $judul = 'Klepon';
  $gambar = 'Klepon.jpg';
  $konten = '
  <h3>Bahan:</h3>
<ul>
  <li>200 gr tepung ketan putih</li>
  <li>50 gr tepung beras (optional, agar tekstur lebih kenyal-padat)</li>
  <li>150 ml air hangat</li>
  <li>Pewarna makanan hijau atau air daun pandan/suji</li>
  <li>Gula merah/gula aren, disisir halus (untuk isian)</li>
  <li>1/2 sdt garam</li>
</ul>

<h3>Bahan Taburan:</h3>
<ul>
  <li>Kelapa parut secukupnya</li>
  <li>1/4 sdt garam</li>
  <li>1 lembar daun pandan (optional)</li>
</ul>

<h3>Cara Membuat:</h3>
<ol>
  <li>Kukus kelapa parut bersama garam dan daun pandan selama 5–10 menit agar tidak cepat basi. Sisihkan.</li>
  <li>Campurkan tepung ketan, tepung beras, dan garam dalam satu wadah.</li>
  <li>Tambahkan air hangat yang telah diberi pewarna hijau atau air pandan sedikit demi sedikit sambil diuleni hingga adonan bisa dipulung dan tidak terlalu lembek.</li>
  <li>Ambil sedikit adonan, pipihkan, isi dengan gula merah, lalu bulatkan kembali hingga rapat agar gula tidak keluar saat direbus.</li>
  <li>Rebus dalam air mendidih. Jika klepon sudah mengapung, biarkan 1–2 menit lagi agar gula merah di dalamnya benar-benar cair, lalu angkat.</li>
  <li>Gulingkan klepon ke dalam kelapa parut hingga seluruh permukaan tertutup.</li>
  <li>Sajikan selagi hangat agar gula merah di dalamnya masih lumer.</li>
</ol>
  ';
}

else if ($id == '9') {
  $judul = 'Bolu Ketan Hitam Keju Karamel';
  $gambar = 'botantemju.jpg';
  $konten = '
  <h3>Bahan A (Adonan Bolu Ketan Hitam):</h3>
<ul>
  <li>4 butir telur</li>
  <li>120 gr gula pasir</li>
  <li>1 sdt SP/TBM (optional, agar mengembang stabil)</li>
  <li>100 gr tepung ketan hitam</li>
  <li>20 gr tepung terigu protein sedang</li>
  <li>20 gr susu bubuk</li>
  <li>1/2 sdt baking powder</li>
  <li>100 ml minyak goreng / butter leleh</li>
  <li>50 ml santan kental / susu cair</li>
</ul>

<h3>Bahan Topping Keju:</h3>
<ul>
  <li>Keju cheddar parut secukupnya</li>
  <li>Keju mozzarella (opsional jika ingin meleleh)</li>
</ul>

<h3>Bahan Saus Karamel:</h3>
<ul>
  <li>100 gr gula pasir</li>
  <li>50 ml air panas</li>
  <li>50 ml susu cair / krim kental</li>
  <li>20 gr butter</li>
  <li>Sejumput garam</li>
</ul>

<h3>Cara Membuat Adonan Bolu:</h3>
<ol>
  <li>Kocok telur, gula, dan SP menggunakan mixer kecepatan tinggi hingga mengembang putih berjejak (±5–7 menit).</li>
  <li>Ayak tepung ketan hitam, tepung terigu, susu bubuk, dan baking powder. Masukkan sedikit-sedikit ke adonan telur, mixer kecepatan rendah.</li>
  <li>Tuang minyak dan santan/susu, aduk balik perlahan sampai rata dan tidak ada endapan.</li>
  <li>Tuang adonan ke loyang (diameter 20 cm) yang sudah dialasi baking paper dan dioles tipis minyak.</li>
</ol>

<h3>Cara Panggang / Kukus:</h3>
<ul>
  <li><strong>Jika dikukus:</strong> Kukus 25–30 menit, tutup kukusan dengan kain agar uap tidak menetes.</li>
  <li><strong>Jika dioven:</strong> Panggang suhu 170°C selama 30–35 menit.</li>
</ul>

<h3>Cara Membuat Saus Karamel:</h3>
<ol>
  <li>Panaskan gula pasir di wajan tanpa diaduk hingga meleleh dan berubah warna cokelat keemasan.</li>
  <li>Tuang air panas sedikit demi sedikit (hati-hati percikan).</li>
  <li>Masukkan butter, aduk hingga larut.</li>
  <li>Tambahkan susu cair/krim dan sejumput garam. Aduk hingga mengental, matikan api.</li>
  <li>Diamkan sampai agak dingin dan mengental.</li>
</ol>

<h3>Finishing:</h3>
<ol>
  <li>Setelah bolu matang dan dingin, oles permukaan dengan saus karamel.</li>
  <li>Taburi keju parut di atasnya. Bisa tambahkan mozzarella jika suka leleh.</li>
  <li>Sajikan atau simpan di kulkas agar karamel lebih set.</li>
</ol>

<h3>Tips:</h3>
<ul>
  <li>Pastikan adonan telur dikocok sampai kaku agar hasil bolu mengembang.</li>
  <li>Minyak harus diaduk perlahan supaya adonan tidak turun.</li>
  <li>Jika ingin lebih legit, tambahkan karamel di dalam adonan sebelum dipanggang.</li>
  <li>Saus karamel bisa dibuat lebih asin (salted caramel) sesuai selera.</li>
</ul>

  ';
}

else if ($id == '10') {
  $judul = 'Brownies Air fryer';
  $gambar = 'Brownies Airfrayer.jpg';
  $konten = '
  <h3>Bahan:</h3>
<ul>
  <li>100 gr dark chocolate (coklat batang)</li>
  <li>50 gr butter atau margarin</li>
  <li>50 ml minyak goreng</li>
  <li>2 butir telur</li>
  <li>80 gr gula pasir atau gula halus</li>
  <li>70 gr tepung terigu protein sedang</li>
  <li>25 gr coklat bubuk</li>
  <li>1/4 sdt baking powder (opsional)</li>
  <li>1/4 sdt garam</li>
  <li>1/2 sdt vanili</li>
</ul>

<h3>Cara Membuat:</h3>
<ol>
  <li>Lelehkan dark chocolate dan butter menggunakan teknik tim atau microwave. Setelah meleleh, masukkan minyak goreng, aduk rata dan biarkan agak hangat.</li>
  <li>Dalam mangkuk lain, kocok telur dan gula menggunakan whisk hingga gula larut (tidak perlu sampai mengembang).</li>
  <li>Tuang campuran coklat leleh ke dalam adonan telur, aduk perlahan hingga tercampur rata.</li>
  <li>Ayak tepung terigu, coklat bubuk, garam, baking powder (jika dipakai), dan vanili. Masukkan ke dalam adonan basah, aduk balik menggunakan spatula hingga rata.</li>
  <li>Tuang adonan ke dalam loyang yang sudah dialasi baking paper atau dioles tipis margarin.</li>
</ol>

<h3>Memanggang di Airfryer:</h3>
<ol>
  <li>Panaskan airfryer selama 3–5 menit pada suhu 160°C.</li>
  <li>Masukkan loyang berisi adonan ke dalam airfryer.</li>
  <li>Panggang di suhu 160°C selama ± 25–30 menit.</li>
  <li>Cek kematangan dengan tusuk gigi – jika keluar sedikit remah basah (fudgy), berarti brownies sudah pas.</li>
  <li>Jika ingin lebih matang/dry, lanjutkan panggang 5 menit lagi.</li>
</ol>

<h3>Tips:</h3>
<ul>
  <li>Gunakan loyang yang muat di airfryer (bisa loyang bulat kecil atau persegi 15×15 cm).</li>
  <li>Jangan terlalu sering membuka airfryer agar brownies tidak bantat.</li>
  <li>Bisa tambahkan topping choco chips, kacang almond, atau keju parut sebelum dipanggang.</li>
  <li>Diamkan brownies hingga dingin sebelum dipotong agar hasilnya rapi.</li>
</ul>

  ';
}

else if ($id == '11') {
  $judul = 'Churros';
  $gambar = 'Churros.jpg';
  $konten = '
  <h3>Bahan Churros:</h3>
<ul>
  <li>250 ml air</li>
  <li>2 sdm gula pasir</li>
  <li>1/2 sdt garam</li>
  <li>2 sdm butter / margarin</li>
  <li>150 gr tepung terigu</li>
  <li>1 butir telur</li>
  <li>Minyak untuk menggoreng</li>
</ul>

<h3>Bahan Topping (Opsional):</h3>
<ul>
  <li>Gula pasir + kayu manis bubuk</li>
  <li>Saus coklat / coklat leleh</li>
</ul>

<h3>Cara Membuat:</h3>
<ol>
  <li>Panaskan air, gula, garam, dan butter dalam panci. Masak hingga mendidih dan butter meleleh.</li>
  <li>Kecilkan api, masukkan tepung terigu sekaligus. Aduk cepat hingga kalis dan tidak menempel di panci.</li>
  <li>Angkat adonan dan biarkan hangat.</li>
  <li>Setelah agak dingin, masukkan telur, aduk sampai adonan halus dan tercampur rata.</li>
  <li>Masukkan adonan ke piping bag dengan spuit bintang besar.</li>
  <li>Panaskan minyak, semprotkan adonan langsung ke minyak panas, potong sesuai panjang yang diinginkan.</li>
  <li>Goreng churros hingga keemasan, angkat dan tiriskan.</li>
  <li>Gulingkan churros ke dalam campuran gula pasir dan kayu manis selagi hangat.</li>
  <li>Sajikan dengan saus coklat atau topping favoritmu.</li>
</ol>

  ';
}

else if ($id == '12') {
  $judul = 'Pie Susu Air fryer';
  $gambar = 'piesusu.jpg';
  $konten = '
  <h3>Bahan Kulit Pie:</h3>
<ul>
  <li>150 gr tepung terigu serbaguna</li>
  <li>75 gr margarin atau butter dingin</li>
  <li>2 sdm gula halus</li>
  <li>1 kuning telur</li>
  <li>1–2 sdm air es (jika diperlukan)</li>
  <li>Sejumput garam</li>
</ul>

<h3>Bahan Isi Pie Susu:</h3>
<ul>
  <li>200 ml susu cair full cream</li>
  <li>3 butir kuning telur</li>
  <li>3 sdm susu kental manis</li>
  <li>1 sdm tepung maizena (larutkan dengan sedikit air)</li>
  <li>1 sdt vanili cair atau bubuk</li>
  <li>2 sdm gula pasir (opsional jika ingin lebih manis)</li>
</ul>

<h3>Cara Membuat Kulit Pie:</h3>
<ol>
  <li>Campurkan tepung terigu, gula halus, dan garam dalam wadah.</li>
  <li>Masukkan margarin/butter dingin, aduk dengan garpu atau ujung jari hingga bertekstur seperti pasir/butiran.</li>
  <li>Tambahkan kuning telur, uleni perlahan. Jika adonan terlalu kering, tambahkan sedikit air es.</li>
  <li>Setelah adonan bisa dipadatkan, bungkus dengan plastik wrap dan simpan di kulkas selama 10–15 menit.</li>
  <li>Ambil adonan, pipihkan, lalu tekan ke dalam cetakan pie kecil.</li>
  <li>Lubangi dasar kulit pie dengan garpu agar tidak mengembang saat dipanggang.</li>
</ol>

<h3>Cara Membuat Isian:</h3>
<ol>
  <li>Kocok ringan kuning telur, susu cair, dan susu kental manis.</li>
  <li>Tambahkan tepung maizena yang sudah dilarutkan dan vanili.</li>
  <li>Aduk sampai rata. Tidak perlu dikocok berbusa, cukup tercampur saja.</li>
</ol>

<h3>Memanggang di Airfryer:</h3>
<ol>
  <li>Panaskan airfryer selama 3 menit di suhu 160°C.</li>
  <li>Tuang adonan isi ke dalam kulit pie (isi sekitar ¾ bagian).</li>
  <li>Panggang di airfryer suhu 160°C selama 12–15 menit atau sampai isi mengeras dan permukaan sedikit menguning.</li>
  <li>Jika bagian atas belum kecokelatan, bisa lanjut panggang 3–5 menit di suhu 170°C.</li>
  <li>Dinginkan sebentar sebelum dikeluarkan dari cetakan agar kulit tidak retak.</li>
</ol>

<h3>Tips:</h3>
<ul>
  <li>Jangan over-mix kulit pie agar tetap renyah dan tidak keras.</li>
  <li>Bisa tambahkan topping seperti keju, coklat, atau buah sebelum disajikan.</li>
  <li>Simpan di kulkas dalam wadah tertutup agar tetap awet dan tidak lembek.</li>
</ul>
  ';
}

else if ($id == '13') {
  $judul = 'Bolu Kukus';
  $gambar = 'Bolukukus.jpg';
  $konten = '
  <h3>Bahan Bolu Kukus:</h3>
<ul>
  <li>250 gr tepung terigu protein sedang</li>
  <li>200 gr gula pasir</li>
  <li>2 butir telur</li>
  <li>200 ml air atau susu cair</li>
  <li>1 sachet susu bubuk (optional)</li>
  <li>1 sdt emulsifier (SP/TBM/ovalet)</li>
  <li>1 sdt baking powder</li>
  <li>Pewarna makanan (optional)</li>
</ul>

<h3>Cara Membuat:</h3>
<ol>
  <li>Panaskan kukusan, tutupnya dilapisi kain agar uap tidak menetes ke adonan.</li>
  <li>Campur telur, gula, dan emulsifier. Mixer dengan kecepatan tinggi hingga putih, kental, dan mengembang (±7–10 menit).</li>
  <li>Masukkan tepung terigu, susu bubuk, dan baking powder yang sudah diayak. Mixer sebentar dengan kecepatan rendah.</li>
  <li>Tuang air atau susu cair sedikit demi sedikit sambil diaduk perlahan hingga rata.</li>
  <li>Bagi adonan menjadi beberapa bagian jika ingin menggunakan warna atau rasa berbeda. Tambahkan pewarna makanan sesuai selera.</li>
  <li>Tuang adonan ke dalam cetakan bolu kukus yang sudah dialasi paper cup. Isi hingga penuh agar bisa mekar maksimal.</li>
  <li>Kukus dengan api besar selama 10–15 menit. Jangan buka tutup kukusan selama proses agar bolu mekar sempurna.</li>
  <li>Angkat dan sajikan setelah sedikit dingin.</li>
</ol>

<h3>Tips Supaya Bolu Mekar:</h3>
<ul>
  <li>Api harus besar dan kukusan sudah panas sebelum adonan dimasukkan.</li>
  <li>Jangan buka tutup kukusan sampai bolu matang.</li>
  <li>Isi cetakan sampai penuh supaya tekanan uap membantu bolu mekar.</li>
</ul>

  ';
}

else if ($id == '14') {
  $judul = 'Cinnamon Roll';
  $gambar = 'cinnamonroll.jpg';
  $konten = '
  <h3>Bahan Adonan:</h3>
<ul>
  <li>300 gr tepung terigu protein tinggi</li>
  <li>40 gr gula pasir</li>
  <li>1 sdt ragi instan</li>
  <li>1 butir telur</li>
  <li>150 ml susu hangat</li>
  <li>40 gr butter/margarin (suhu ruang)</li>
  <li>1/4 sdt garam</li>
</ul>

<h3>Bahan Isian (Filling Kayu Manis):</h3>
<ul>
  <li>50 gr mentega leleh</li>
  <li>3 sdm gula pasir atau gula palem</li>
  <li>1 sdm kayu manis bubuk (cinnamon powder)</li>
</ul>

<h3>Bahan Glaze (Opsional):</h3>
<ul>
  <li>50 gr cream cheese</li>
  <li>3 sdm gula halus</li>
  <li>2 sdm susu cair</li>
  <li>1 sdt vanili</li>
</ul>

<h3>Cara Membuat Adonan:</h3>
<ol>
  <li>Campur tepung terigu, gula pasir, dan ragi instan dalam mangkuk.</li>
  <li>Masukkan telur dan susu hangat sedikit demi sedikit sambil diuleni.</li>
  <li>Tambahkan butter dan garam, uleni hingga adonan elastis dan tidak lengket.</li>
  <li>Tutup dengan kain/plastik wrap, diamkan selama 40–60 menit sampai mengembang 2×.</li>
</ol>

<h3>Pembentukan Cinnamon Roll:</h3>
<ol>
  <li>Kempiskan adonan, lalu gilas menjadi bentuk persegi panjang.</li>
  <li>Oles seluruh permukaan dengan mentega leleh.</li>
  <li>Taburi campuran gula + kayu manis secara merata.</li>
  <li>Gulung adonan dari sisi panjang, padatkan pelan-pelan.</li>
  <li>Potong-potong setebal 2–3 cm.</li>
  <li>Susun di loyang yang sudah diolesi margarin / dialasi baking paper.</li>
  <li>Diamkan lagi 15–20 menit supaya mengembang lagi.</li>
</ol>

<h3>Cara Panggang di Oven:</h3>
<ol>
  <li>Panaskan oven suhu 170°C.</li>
  <li>Panggang cinnamon roll selama 15–20 menit hingga permukaan kuning kecokelatan.</li>
  <li>Angkat dan biarkan hangat.</li>
</ol>

<h3>Cara Menambahkan Glaze:</h3>
<ol>
  <li>Kocok cream cheese, gula halus, susu, dan vanili sampai halus.</li>
  <li>Tuang atau oles di atas cinnamon roll saat masih hangat.</li>
</ol>

<h3>Tips:</h3>
<ul>
  <li>Pastikan susu hangatnya tidak terlalu panas agar ragi tetap aktif.</li>
  <li>Jangan memanggang terlalu lama agar tekstur tetap lembut dan moist.</li>
  <li>Bisa simpan di kulkas dan hangatkan lagi sebelum disajikan.</li>
</ul>
  ';
} 

else if ($id == '15') {
  $judul = 'Lava Cake';
  $gambar = 'lavacake.jpg';
  $konten = '
  <h3>Bahan:</h3>
<ul>
  <li>100 gr cokelat batang (dark cooking chocolate / DCC)</li>
  <li>50 gr mentega / butter</li>
  <li>2 butir telur</li>
  <li>50 gr gula pasir</li>
  <li>1 sdt vanili cair / bubuk</li>
  <li>30 gr tepung terigu protein sedang</li>
  <li>1 sdm cokelat bubuk (opsional)</li>
  <li>Sejumput garam</li>
  <li>Margarin & tepung roti untuk olesan cetakan</li>
</ul>

<h3>Cara Membuat:</h3>
<ol>
  <li>Lelehkan cokelat batang & mentega dengan cara <em>double boiler</em> atau microwave. Aduk hingga halus, sisihkan.</li>
  <li>Dalam mangkuk lain, kocok telur, gula, dan vanili hingga gula larut (cukup dikocok ringan, tidak perlu mengembang).</li>
  <li>Tuang campuran cokelat leleh ke adonan telur, aduk rata.</li>
  <li>Masukkan tepung terigu, cokelat bubuk, dan sedikit garam. Aduk perlahan sampai tidak bergerindil.</li>
  <li>Olesi cetakan kecil (ramekin / alumunium cup) dengan margarin, lalu taburi tepung roti atau cokelat bubuk supaya tidak lengket.</li>
  <li>Tuang adonan hingga ¾ tinggi cetakan.</li>
</ol>

<h3>Cara Mengukus:</h3>
<ol>
  <li>Panaskan kukusan hingga air mendidih. Lapisi tutup kukusan dengan kain agar uap tidak menetes ke adonan.</li>
  <li>Masukkan adonan lava cake ke dalam kukusan.</li>
  <li>Kukus selama <strong>6–7 menit saja</strong> dengan api sedang. Jangan terlalu lama agar bagian tengah tetap lumer.</li>
  <li>Angkat perlahan. Hidangkan selagi hangat.</li>
</ol>

<h3>Topping (Opsional):</h3>
<ul>
  <li>Taburan gula halus</li>
  <li>Ice cream vanilla</li>
  <li>Strawberry / buah segar</li>
  <li>Cokelat leleh atau saus karamel</li>
</ul>

<h3>Tips Supaya Tengahnya Tetap Lumer:</h3>
<ul>
  <li>Jangan dikukus terlalu lama, cukup sampai bagian pinggir set & bagian tengah masih goyang.</li>
  <li>Pakai api sedang, jangan api besar (supaya tidak cepat matang semua).</li>
  <li>Sajikan langsung saat masih hangat.</li>
</ul>

  ';
} 

else if ($id == '16') {
  $judul = 'Cromboloni';
  $gambar = 'cromboloni.jpg';
  $konten = '
  <h3>Bahan Adonan Croissant / Puff Pastry:</h3>
<ul>
  <li>250 gr tepung terigu protein sedang</li>
  <li>1 sdm gula pasir</li>
  <li>1/2 sdt garam</li>
  <li>130 ml air dingin / susu dingin</li>
  <li>7 gr ragi instan (opsional, jika ingin lebih mengembang)</li>
  <li>125 gr butter (untuk lipatan / laminasi)</li>
</ul>

<h3>Bahan Isian & Topping:</h3>
<ul>
  <li>Vla vanilla / custard</li>
  <li>Selai cokelat / Nutella</li>
  <li>Lotus Biscoff spread</li>
  <li>Matcha cream / tiramisu cream</li>
  <li>Gula halus untuk taburan</li>
</ul>

<h3>Cara Membuat Adonan Puff / Croissant:</h3>
<ol>
  <li>Campur tepung, gula, garam, dan ragi (jika pakai). Tuang air/susu dingin, uleni hingga rata tapi tidak perlu terlalu kalis.</li>
  <li>Bentuk bulat, bungkus plastik wrap, dan simpan di kulkas 30 menit.</li>
  <li>Siapkan butter untuk lipatan: pipihkan butter di antara plastik hingga berbentuk kotak tipis, lalu dinginkan sebentar.</li>
  <li>Keluarkan adonan, gilas memanjang. Letakkan butter di tengah, lipat adonan menutupi butter.</li>
  <li>Gilas perlahan, lalu lipat 3 bagian (lipatan buku). Diamkan di kulkas 20 menit.</li>
  <li>Ulangi proses gilas-lipat 3x (setiap kali istirahatkan di kulkas).</li>
</ol>

<h3>Membentuk Cromboloni:</h3>
<ol>
  <li>Setelah lipatan terakhir, gilas memanjang lalu potong menjadi persegi panjang.</li>
  <li>Gulung dari sisi pendek hingga membentuk spiral kecil.</li>
  <li>Letakkan di loyang yang sudah dialasi baking paper. Diamkan 30–40 menit supaya sedikit mengembang.</li>
</ol>

<h3>Panggang:</h3>
<ol>
  <li>Panaskan oven 180°C.</li>
  <li>Panggang selama 18–22 menit hingga mengembang dan berwarna keemasan.</li>
</ol>

<h3>Isi dan Finishing:</h3>
<ol>
  <li>Lubangi bagian tengah cromboloni dengan sumpit / piping bag.</li>
  <li>Suntikkan isian seperti vla vanilla, nutella, matcha, tiramisu, atau biscoff.</li>
  <li>Tambahkan topping di permukaan sesuai selera.</li>
  <li>Taburi gula halus, sajikan.</li>
</ol>

<h3>Tips Anti Gagal:</h3>
<ul>
  <li>Butter harus dingin supaya lapisan croissant bertekstur berlapis.</li>
  <li>Jangan menguleni terlalu lama, cukup sampai tercampur.</li>
  <li>Pakai suhu oven stabil agar lapisan mengembang sempurna.</li>
  <li>Bisa pakai puff pastry instan untuk cara cepat!</li>
</ul>

  ';
} 

else if ($id == '17') {
  $judul = 'Bomboloni';
  $gambar = 'bomboloni.jpg';
  $konten = '
  <h3>Bahan Adonan Bomboloni:</h3>
<ul>
  <li>300 gr tepung terigu protein tinggi</li>
  <li>50 gr gula pasir</li>
  <li>1 butir telur</li>
  <li>7 gr ragi instan</li>
  <li>150 ml susu cair hangat</li>
  <li>40 gr butter / margarin</li>
  <li>1/2 sdt garam</li>
  <li>Minyak untuk menggoreng</li>
</ul>

<h3>Cara Membuat Adonan:</h3>
<ol>
  <li>Campur susu hangat dan ragi instan, diamkan 5–10 menit sampai berbuih (tanda ragi aktif).</li>
  <li>Dalam wadah besar, campur tepung dan gula pasir, aduk rata.</li>
  <li>Masukkan telur dan larutan ragi, uleni hingga setengah kalis.</li>
  <li>Tambahkan butter dan garam, uleni lagi sampai adonan halus dan elastis (kurang lebih 10–15 menit).</li>
  <li>Bulatkan adonan, tutup dengan kain bersih atau plastik wrap. Diamkan 45–60 menit sampai mengembang 2× lipat.</li>
</ol>

<h3>Membentuk Bomboloni:</h3>
<ol>
  <li>Kempiskan adonan, bagi menjadi 12–15 bagian sama rata, bulatkan.</li>
  <li>Tata di atas loyang yang telah ditabur sedikit tepung atau baking paper.</li>
  <li>Tutup dan diamkan kembali 20–30 menit sampai mengembang.</li>
</ol>

<h3>Menggoreng:</h3>
<ol>
  <li>Panaskan minyak banyak dengan api kecil–sedang.</li>
  <li>Goreng bomboloni hingga kuning keemasan, balik sekali saja (agar tidak menyerap minyak).</li>
  <li>Angkat dan tiriskan di atas tisu dapur.</li>
</ol>

<h3>Isian Bomboloni:</h3>
<ul>
  <li><strong>Cokelat:</strong> Lelehkan cokelat batang atau gunakan selai cokelat.</li>
  <li><strong>Vla Vanilla:</strong> 
    <ul>
      <li>250 ml susu cair</li>
      <li>2 sdm gula pasir</li>
      <li>1 sdm maizena</li>
      <li>1 kuning telur</li>
      <li>1 sdt vanili</li>
    </ul>
  </li>
</ul>

<h4>Cara Membuat Vla Vanilla:</h4>
<ol>
  <li>Campurkan susu, gula, kuning telur, maizena, dan vanili. Aduk sampai rata.</li>
  <li>Masak dengan api kecil sambil terus diaduk sampai mengental. Dinginkan.</li>
</ol>

<h3>Finishing:</h3>
<ol>
  <li>Buat lubang kecil di sisi bomboloni dengan tusuk atau sumpit.</li>
  <li>Masukkan isian menggunakan piping bag atau plastik segitiga.</li>
  <li>Gulingkan permukaan bomboloni ke gula halus atau biarkan polos.</li>
</ol>

<h3>Tips:</h3>
<ul>
  <li>Pastikan ragi aktif agar bomboloni mengembang sempurna.</li>
  <li>Uleni hingga kalis elastis agar tekstur lembut dan tidak bantat.</li>
  <li>Goreng dengan api kecil supaya matang merata dan tidak cepat cokelat.</li>
</ul>

  ';
} 

else if ($id == '18') {
  $judul = 'Cupcake air fryer';
  $gambar = 'cupcake.jpg';
  $konten = '
  <h3>Bahan:</h3>
<ul>
  <li>150 gr tepung terigu protein sedang</li>
  <li>70 gr gula pasir (atau gula halus)</li>
  <li>1 sdm cokelat bubuk (opsional jika mau rasa coklat)</li>
  <li>1 sdt baking powder</li>
  <li>1/2 sdt baking soda</li>
  <li>1/4 sdt garam</li>
  <li>200 ml air atau santan cair (bisa pakai susu almond/oat jika bukan pantangan)</li>
  <li>50 ml minyak sayur</li>
  <li>1 sdt vanili cair / bubuk</li>
  <li>1 sdt air perasan lemon atau cuka (untuk aktivasi baking soda, bikin ngembang)</li>
</ul>

<h3>Cara Membuat:</h3>
<ol>
  <li>Dalam mangkuk, campur tepung terigu, gula pasir, cokelat bubuk (jika dipakai), baking powder, baking soda, dan garam. Aduk rata.</li>
  <li>Di mangkuk lain, campur air/santan, minyak, vanili, dan perasan lemon/cuka. Aduk perlahan.</li>
  <li>Tuang bahan cair ke bahan kering sedikit demi sedikit sambil diaduk perlahan dengan whisk atau spatula hingga tidak ada yang bergerindil. Jangan overmix.</li>
  <li>Siapkan cetakan cupcake dan isi adonan hingga 3/4 tinggi cup.</li>
</ol>

<h3>Cara Memanggang di Airfryer:</h3>
<ol>
  <li>Panaskan airfryer terlebih dahulu di suhu 150°C selama 3–5 menit.</li>
  <li>Masukkan cetakan cupcake ke dalam airfryer.</li>
  <li>Panggang di suhu 150°C selama 15–18 menit (tes dengan tusuk gigi, jika keluar bersih berarti sudah matang).</li>
  <li>Angkat dan biarkan dingin sebelum diberi topping.</li>
</ol>

<h3>Topping Sederhana (Opsional & Vegan Friendly):</h3>
<ul>
  <li>Gula halus + air/lemon (untuk glaze putih sederhana)</li>
  <li>Selai stroberi, cokelat, atau selai kacang</li>
  <li>Taburan kacang, choco chips vegan, atau buah segar</li>
</ul>

<h3>Tips:</h3>
<ul>
  <li>Kalau pakai santan, rasa lebih gurih dan tekstur lebih lembut.</li>
  <li>Jangan buka airfryer selama proses awal supaya cupcake ngembang maksimal.</li>
 <li>Setelah matang, biarkan dingin agar permukaan tidak kempes.</li>
</ul>

  ';
} 

else if ($id == '19') {
  $judul = 'Banana Cake';
  $gambar = 'bananacake.jpg';
  $konten = '
  <h3>Bahan:</h3>
<ul>
  <li>2 buah pisang matang (pisang ambon/kepok, yang sudah bintik hitam lebih bagus)</li>
  <li>150 gr tepung terigu protein sedang</li>
  <li>70–80 gr gula pasir atau gula halus</li>
  <li>1 butir telur (opsional, bisa tanpa telur)</li>
  <li>60 ml minyak goreng / minyak kelapa</li>
  <li>50 ml susu cair / air / santan</li>
  <li>1 sdt baking powder</li>
  <li>1/2 sdt baking soda</li>
  <li>1/2 sdt vanili bubuk atau cair</li>
  <li>Sejumput garam</li>
</ul>

<h3>Cara Membuat:</h3>
<ol>
  <li>Haluskan pisang menggunakan garpu sampai lumat (boleh masih ada sedikit tekstur).</li>
  <li>Dalam wadah, campurkan pisang halus, gula, telur (jika pakai), minyak, susu/air/santan, dan vanili. Aduk rata pakai whisk atau spatula.</li>
  <li>Ayak tepung terigu, baking powder, baking soda, dan garam. Campurkan ke adonan basah sedikit demi sedikit sambil diaduk perlahan hingga rata (jangan overmix).</li>
  <li>Tuang adonan ke loyang kecil yang sudah dioles margarin & dialasi baking paper / cup kue.</li>
</ol>

<h3>Cara Panggang di Airfryer:</h3>
<ol>
  <li>Panaskan airfryer suhu 150°C selama 3–5 menit.</li>
  <li>Masukkan loyang/ cetakan berisi adonan ke dalam airfryer.</li>
  <li>Panggang pada suhu 150°C selama 20–25 menit (sesuaikan ukuran loyang).</li>
  <li>Cek dengan tusuk gigi — kalau keluar bersih berarti sudah matang.</li>
  <li>Angkat dan dinginkan sebentar sebelum dipotong.</li>
</ol>

<h3>Tambahan Topping (Opsional):</h3>
<ul>
  <li>Choco chips</li>
  <li>Kacang almond/kenari cincang</li>
  <li>Irisan pisang di atas adonan sebelum dipanggang</li>
  <li>Gula halus tabur setelah matang</li>
</ul>

<h3>Tips:</h3>
<ul>
  <li>Gunakan pisang yang sangat matang agar rasa lebih manis & wangi.</li>
  <li>Kalau tanpa telur, bisa tambahkan 1 sdm minyak atau susu tambahan agar tetap moist.</li>
  <li>Jangan buka airfryer di awal pemanggangan supaya cake nggak kempes.</li>
</ul>

  ';
} 

else if ($id == '20') {
  $judul = 'Lapis Legit Kukus';
  $gambar = 'lapislegitkukus.jpg';
  $konten = '
  <h3>Bahan:</h3>
<ul>
  <li>10 butir kuning telur</li>
  <li>3 butir putih telur</li>
  <li>200 gr margarin/butter, lelehkan</li>
  <li>150 gr gula halus</li>
  <li>100 gr tepung terigu protein sedang</li>
  <li>50 gr susu bubuk</li>
  <li>1 sdt vanili bubuk / pasta vanila</li>
  <li>1 sdt kayu manis bubuk (optional, biar harum khas lapis legit)</li>
  <li>1/4 sdt garam</li>
</ul>

<h3>Cara Membuat:</h3>
<ol>
  <li>Kocok gula halus, kuning telur, dan vanili sampai mengembang pucat dan kental (menggunakan mixer speed tinggi).</li>
  <li>Masukkan putih telur, kocok sebentar sampai rata (tidak perlu sampai kaku).</li>
  <li>Ayak tepung terigu, susu bubuk, dan kayu manis bubuk. Masukkan ke adonan telur sedikit demi sedikit, aduk dengan spatula.</li>
  <li>Tuang margarin/butter leleh, aduk balik perlahan sampai benar-benar rata.</li>
</ol>

<h3>Cara Mengukus (Sistem Lapis):</h3>
<ol>
  <li>Siapkan loyang, olesi margarin dan alasi baking paper.</li>
  <li>Panaskan kukusan terlebih dahulu, tutup diberi kain agar uap air tidak menetes.</li>
  <li>Tuang ±3–4 sdm adonan pertama ke dalam loyang, ratakan.</li>
  <li>Kukus selama 5 menit sampai lapisan memadat.</li>
  <li>Tuang adonan berikutnya di atas lapisan pertama, ratakan. Kukus lagi 5 menit.</li>
  <li>Ulangi proses <strong>lapis → kukus 5 menit</strong> sampai adonan habis (bisa jadi 8–10 lapisan).</li>
  <li>Di lapisan terakhir, kukus lebih lama ±15 menit supaya matang sempurna.</li>
</ol>

<h3>Tips:</h3>
<ul>
  <li>Loyang jangan terlalu penuh agar uap panas merata.</li>
  <li>Lapisi tutup kukusan dengan kain agar air tidak menetes.</li>
  <li>Kalau suka aroma lebih khas, bisa tambahkan sedikit bubuk spekuk atau kayu manis + cengkeh.</li>
  <li>Tunggu dingin dulu sebelum dipotong agar lapisannya terlihat rapi.</li>
</ul>

<h3>Penyajian:</h3>
<ul>
  <li>Potong setelah dingin menggunakan pisau tajam.</li>
  <li>Bisa disimpan dalam kulkas agar lebih padat dan awet.</li>
  <li>Cocok untuk cemilan, hantaran, atau suguhan lebaran.</li>
</ul>

  ';
} 

else {
  echo "Resep tidak ditemukan.";
  exit;
}


$komentar_query = "SELECT k.*, u.username FROM komentar k JOIN users u ON k.user_id = u.id WHERE k.resep_id=$id ORDER BY k.tanggal DESC";
$komentar_result = mysqli_query($conn, $komentar_query);
?>

<!DOCTYPE html>
<html>
<head>
  <title><?= $judul ?> - DapurManis</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="header">
  <div class="logo-nav">
    <a href="home.php" style="display:flex; align-items:center; text-decoration:none;">
      <img src="Gambar WhatsApp 2025-07-30 pukul 14.20.33_764f546c.jpg" alt="Logo" class="logo">
      <h1 class="brand-name" style="margin-left:8px; color:#c45b4d;">DapurManis</h1>
    </a>
  </div>
</header>


<main style="max-width: 800px; margin: 30px auto; padding: 0 20px;">
  <h2><?= $judul ?></h2>
  <?php if ($gambar): ?>
    <img src="<?= $gambar ?>" alt="<?= $judul ?>" style="width:100%; max-height:400px; object-fit:cover; border-radius:10px; margin-bottom:20px;">
  <?php endif; ?>
  <div><?= $konten ?></div>
    <!-- Video Tutorial -->
<h3 style="margin-top:40px; color:#c45b4d; text-align:center;">Video Tutorial</h3>

<?php
// === DAFTAR LINK YOUTUBE MANUAL ===
// Tambahin atau ubah sesuai ID resep yang ada
$youtubeLinks = [
    1   => 'https://youtu.be/rCrkzgHpcSo?si=3aWjfPcno9DQsoI6',        
    2   => 'https://youtu.be/cbxjh_8NnKE?si=ihqDcaHjJfTtVxNS',                      
    3   => 'https://youtu.be/HLGDDGZEQjQ?si=EVC7LdNrXOVP5PBS',
    4   => 'https://youtu.be/FF5DDPIl4es?si=lpdSEDXBSiUJc0EC',
    5   => 'https://youtu.be/MmADAEPOOPo?si=lBk1t7GOztiYrlgU',
    6   => 'https://youtu.be/nSUzPqCydJc?si=2qcVpHuZO9ecQAVm',
    7   => 'https://youtu.be/S5jJdrq-lf8?si=tD_Go2QZ0eIDAl8_',
    8   => 'https://youtu.be/yvMrZd6-KeQ?si=uJIl_Jd0TBu9sGKV',
    9   => 'https://youtu.be/x1R92OcNzDw?si=yCzIMxGEmFrclYju',
    10  => 'https://youtu.be/EzMschli7kE?si=OnsicmreX2E86sVL',
    11  => 'https://youtu.be/J3dfFV9Np7Y?si=70ve86VPqq9ZzZ2Y',
    12  => 'https://youtu.be/KwzE3xYPHAc?si=U1H3L9WEUjy6x3ta',
    13  => 'https://youtu.be/BtHVxr33p3U?si=UT3_0rqc_fLmT_82',
    14  => 'https://youtu.be/syhVqCSCzsE?si=CO2DhFae8tRCKCib',
    15  => 'https://youtu.be/WLpQl7F2Bak?si=-k400ZC7DEe0a_6-',
    16  => 'https://youtu.be/jglKB4UBMB4?si=zHQliam7tkFh-h2m',
    17  => 'https://youtu.be/pZbyqM2Qeo4?si=6fmflr01V1iaQowD',
    18  => 'https://youtu.be/vr71C8PB66o?si=kdfEKLcvos5KT3VM',
    19  => 'https://youtu.be/wum-P2l-PnQ?si=BYjgpzkLDgeHcmbL',
    20  => 'https://youtu.be/isZYKGxRz5g?si=iodPkzgxI9W_3hBS',
];

$youtubeLink = isset($youtubeLinks[$id]) ? trim($youtubeLinks[$id]) : '';

// Kalau mau semua resep yang belum ada link otomatis tampil "Belum ada video", biarin kosong aja
?>

<?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true): ?>

    <?php if ($youtubeLink !== ''): 
        // Ambil ID video YouTube biar bisa tampilkan thumbnail cantik
        $videoId = '';
        if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $youtubeLink, $matches)) {
            $videoId = $matches[1];
        }
    ?>

        <div style="text-align:center; margin:35px 0;">
            <?php if ($videoId): ?>
                <a href="<?= $youtubeLink ?>" target="_blank" rel="noopener" style="display:inline-block; position:relative; border:none;">
                    <img src="https://img.youtube.com/vi/<?= $videoId ?>/maxresdefault.jpg" 
                         alt="Video Tutorial <?= htmlspecialchars($judul) ?>" 
                         style="width:80%; max-width:720px; border-radius:15px; box-shadow:0 8px 25px rgba(0,0,0,0.3); transition:transform 0.3s;"
                         onmouseover="this.style.transform='scale(1.03)'"
                         onmouseout="this.style.transform='scale(1)'">
                    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); pointer-events:none;">
                        <svg width="90" height="90" viewBox="0 0 24 24" fill="white">
                            <circle cx="12" cy="12" r="12" fill="black" opacity="0.7"/>
                            <path d="M8 5v14l11-7L8 5z"/>
                        </svg>
                    </div>
                </a>
            <?php endif; ?>

            <p style="margin-top:15px; font-size:1.1em;">
                <a href="<?= $youtubeLink ?>" target="_blank" rel="noopener" 
                   style="color:#c45b4d; font-weight:bold; text-decoration:none; padding:10px 20px; background:#fff2f0; border-radius:30px; box-shadow:0 2px 8px rgba(196,91,77,0.2);">
                   Tonton Video Tutorial di YouTube
                </a>
            </p>
        </div>

    <?php else: ?>
        <p style="text-align:center; color:#777; font-style:italic;">Belum ada video tutorial untuk resep ini.</p>
    <?php endif; ?>

<?php else: ?>
    <p style="text-align:center; color:#c45b4d; margin:30px 0; font-size:1.1em;">
        Login dulu untuk melihat video tutorial.<br>
        <a href="login.php?redirect=detail.php?id=<?= $id ?>" style="color:#c45b4d; font-weight:bold; text-decoration:underline;">Klik di sini untuk Login</a>
    </p>
<?php endif; ?>


  <h3 style="margin-top:40px; text-align:center; color:#c45b4d;">💬 Komentar</h3>

<div class="komentar-container" id="komentarContainer" style="margin: 20px auto; width: 80%;">

  <!-- DAFTAR KOMENTAR + FOTO PROFIL USER -->
  <div class="komentar-list" id="komentarList">
    <?php
    $stmt = $conn->prepare("
      SELECT k.*, u.username, u.foto_profil 
      FROM komentar k 
      LEFT JOIN users u ON k.user_id = u.ID 
      WHERE k.resep_id = ? 
      ORDER BY k.tanggal DESC
    ");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $komentar_result = $stmt->get_result();

    if ($komentar_result->num_rows > 0):
      while ($komentar = $komentar_result->fetch_assoc()):
        $foto = $komentar['foto_profil'] ?? 'default.png';
        $foto_path = 'uploads/' . $foto;
        if (!file_exists($foto_path)) $foto_path = 'uploads/default.png';
    ?>
      <div class="komentar-item" style="background:#fff8f9; margin:10px auto; padding:15px; width:80%; border-radius:10px; box-shadow:0 2px 5px rgba(0,0,0,0.1); display:flex; gap:12px;">
        
        <!-- FOTO USER BULAT -->
        <img src="<?= $foto_path ?>?v=<?= time() ?>" alt="Foto" 
             style="width:42px; height:42px; border-radius:50%; object-fit:cover; border:2px solid #c45b4d; flex-shrink:0;">
        
        <!-- ISI KOMENTAR -->
        <div style="flex:1;">
          <div style="display:flex; justify-content:space-between; align-items:center;">
            <strong style="color:#c45b4d;"><?= htmlspecialchars($komentar['nama'] ?: $komentar['username']) ?></strong>
            <small style="color:#888;"><?= date('d M Y, H:i', strtotime($komentar['tanggal'])) ?></small>
          </div>
          <p style="margin-top:8px; line-height:1.6;"><?= nl2br(htmlspecialchars($komentar['isi'])) ?></p>

          <!-- BALASAN DARI ADMIN — TANPA FOTO! -->
          <?php
          $stmt2 = $conn->prepare("
            SELECT b.*, u.username 
            FROM balasan b 
            JOIN users u ON b.user_id = u.ID 
            WHERE b.komentar_id = ? 
            ORDER BY b.tanggal ASC
          ");
          $stmt2->bind_param("i", $komentar['id']);
          $stmt2->execute();
          $balasan_result = $stmt2->get_result();

          while ($balasan = $balasan_result->fetch_assoc()):
          ?>
            <div style="margin:15px 0 0 30px; padding:12px; background:#ffe9eb; border-left:4px solid #c45b4d; border-radius:0 8px 8px 8px; font-size:0.93em;">
              <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
                <strong style="color:#a64c3c;"><?= htmlspecialchars($balasan['username']) ?> (Admin)</strong>
                <small style="color:#888;"><?= date('d M Y, H:i', strtotime($balasan['tanggal'])) ?></small>
              </div>
              <p style="margin:0; line-height:1.5;"><?= nl2br(htmlspecialchars($balasan['isi'])) ?></p>
            </div>
          <?php endwhile; ?>

          <!-- HAPUS KOMENTAR (ADMIN ONLY) -->
          <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <form action="hapus_komentar.php" method="POST" style="margin-top:12px; text-align:right;">
              <input type="hidden" name="komentar_id" value="<?= $komentar['id'] ?>">
              <button type="submit" onclick="return confirm('Yakin mau hapus?')" style="background:none; border:none; color:#c45b4d; cursor:pointer; font-size:0.9em;">
                Hapus
              </button>
            </form>
          <?php endif; ?>
        </div>
      </div>
    <?php 
      endwhile;
    else: 
    ?>
      <p style="text-align:center; color:#777; padding:40px; font-style:italic; background:#fdf5f5; border-radius:12px;">
        Belum ada komentar. Jadilah yang pertama! 
      </p>
    <?php endif; ?>
  </div>

  <!-- FORM KOMENTAR — TANPA FOTO PROFIL -->
  <?php if (isset($_SESSION['isLoggedIn']) || isset($_SESSION['admin_logged_in'])): ?>
  <div class="komentar-form" style="margin-top:30px; background:#ffe9eb; border-radius:10px; padding:20px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
    <form action="submit_komentar.php" method="POST">
      <input type="hidden" name="resep_id" value="<?= $id ?>">
      
      <!-- TEXTAREA FULL WIDTH -->
      <textarea name="isi" rows="4" required placeholder="Tulis komentar kamu di sini..." 
                style="width:100%; padding:3px; border-radius:8px; border:1px solid #ccc; resize:none; font-size:15px; font-family:Arial; margin-bottom:10px;"></textarea>
      
      <!-- TOMBOL DI KANAN, TAPI GAK OFFSIDE -->
      <div style="display:flex; justify-content:flex-end;">
        <button type="submit" style="background:#c45b4d; color:white; padding:10px 28px; border:none; border-radius:8px; cursor:pointer; font-weight:bold; font-size:15px;">
          Kirim Komentar
        </button>
      </div>
    </form>
  </div>
<?php else: ?>
  <p style="text-align:center; margin-top:30px; font-size:16px;">
    <a href="login.php?redirect=detail.php?id=<?= $id ?>" style="color:#c45b4d; font-weight:bold; text-decoration:underline;">Login</a> untuk berkomentar
  </p>
<?php endif; ?>
</div>

<!-- ANIMASI -->
<style>
@keyframes fadeIn {
  from { opacity:0; transform:translateY(10px); }
  to { opacity:1; transform:translateY(0); }
}
img { transition:transform 0.2s ease; }
img:hover { transform:scale(1.05); }
</style>

<!-- ANIMASI -->
<style>
@keyframes fadeIn {
  from { opacity:0; transform:translateY(10px); }
  to { opacity:1; transform:translateY(0); }
}
</style>

<!-- efek animasi -->
<style>
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>




</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const komentarContainer = document.getElementById("komentarContainer");
  const urlParams = new URLSearchParams(window.location.search);

  // kalau ada parameter scroll=komentar, scroll ke sana
  if (urlParams.get("scroll") === "komentar" && komentarContainer) {
    // kasih delay dikit biar CSS transition jalan halus
    setTimeout(() => {
      komentarContainer.classList.add("show");
      komentarContainer.scrollIntoView({ behavior: "smooth", block: "start" });
    }, 300);
  } else if (komentarContainer) {
    // kalau bukan hasil redirect, tetap munculkan tanpa animasi
    komentarContainer.classList.add("show");
  }
});
</script>




<!-- Script smooth scroll ke bagian komentar -->
<script>
document.addEventListener("DOMContentLoaded", function() {
  const komentarContainer = document.getElementById("komentarContainer");
  const urlParams = new URLSearchParams(window.location.search);
  const scrollParam = urlParams.get("scroll");

  // pastikan komentarContainer ada
  if (!komentarContainer) return;

  // kalau baru habis submit komentar
  if (scrollParam === "komentar") {
    setTimeout(() => {
      komentarContainer.classList.add("show");
      komentarContainer.scrollIntoView({ behavior: "smooth", block: "start" });
    }, 400);
  } else {
    // kalau bukan hasil submit, tampil normal
    komentarContainer.classList.add("show");
  }
});
</script>





  <p><a href="home.php">← Kembali ke Beranda</a></p>
</main>


<footer>
    <p>&copy; 2025 DapurManis</p>
</footer>


</body>
</html>
