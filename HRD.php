<?php
session_start(); // Panggil session_start() sebelum HTML atau output apapun.
?>
<?php
// Koneksi ke database
include_once("koneksi.php");

// Ambil data kontrak dari database
$query = "SELECT id_kontrak, akhir_kontrak FROM kontrak";
$result = $conn->query($query);

// Membuat array untuk mengirimkan data ke JavaScript
$contracts = [];
while ($row = $result->fetch_assoc()) {
    $contracts[] = $row;  // Masukkan setiap data kontrak ke dalam array
}
?>
<!DOCTYPE html> <!--deklarasi HTML5-->
<html lang="id"> <!--bahasa konten-->
<head>
    <meta charset="UTF-8"> <!--kode karakter-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--lebar perangkat, skala tanpa zoom-->
    <title>Halaman Beranda</title>
    <link rel="stylesheet" href="Portal Informasi Mahasiswa - revisi terbaru.css"> <!--lembar styling-->
    <?php
// Kirim data kontrak ke JavaScript
echo "<script>var contracts = " . json_encode($contracts) . ";</script>";
?>
<script>
    console.log(contracts);  // Menampilkan data kontrak yang diterima oleh JavaScript
</script>
<script>
    var currentDate = new Date();  // Tanggal saat ini di JavaScript
</script>
</head>
<body>
    <header>
        <img src="612be5f575843da081e377cd_grass-growing-outdoors.jpg" 
        alt="sentuh rumput dulu" class="header-image"> <!--alternative text-->
        <div class="overlay"></div> <!--elemen kontainer-->
        <h1>
            HR Management
        </h1>
    </header>
    <hr>
    <div class="containerBG">
    <div><?php
// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login12.php"); // Jika belum login, arahkan ke halaman login
    exit();
}
echo "<div style=\"background-color: rgba(0, 150, 255, 0.9); text-align: center;\">";
/*/ Cek apakah data kontrak berhasil ditarik dari database
echo "<pre>";
var_dump($contracts);  // Tampilkan array data kontrak
echo "</pre>";*/
echo "<br>Selamat datang, Manager " . $_SESSION['username'] . "!<br>";
echo "<br><button class=\"button reset\" style=\"width: 100px\" onclick=\"window.location.href='logout.php'\">Logout</button>";
echo "<br><br>";
echo "<div id=\"contractNotificationsContainer\" style=\"padding: 10px; background-color: #ffcc00; color: black; border-radius: 5px;\">";
echo "<strong>Perhatian:</strong> Ada kontrak yang hampir habis atau sudah berakhir!";
echo "</div>";
echo "</div>";
?></div>
    <div class="containerBeranda">
        <div class="column">
            <a href="Laporan Harian Kehadiran Karyawan/index.php" class="box" onclick="alert('Membuka halaman Laporan Kehadiran Harian!')"> <!--event click, fungsi js kotak dialog, ok u/ tutup-->
                <img src="download (1).jpeg" alt="daftar" class="box-image">
                <div class="box-text">
                <h2>Laporan<br>Kehadiran<br>Harian</h2>
                </div>
            </a>
            <a href="Daftar Karyawan/index.php" class="box" onclick="alert('Membuka halaman Daftar Karyawan!')"> <!--event click, fungsi js kotak dialog, ok u/ tutup-->
            <img src="download (1).jpeg" alt="daftar" class="box-image">
            <div class="box-text">
            <h2>Daftar Karyawan</h2>
            </div>
        </a>
        <a href= "Data Jabatan/index.php" class="box" onclick="alert('Membuka halaman Data Jabatan!')">
            <img src="download.png" alt="daftar" class="box-image">
            <div class="box-text">
            <h2>Data Jabatan</h2>
            </div>
        </a>
        <a href= "Domisili/index.php" class="box" onclick="alert('Membuka halaman Pengecekan Domisili!')"> <!--dengan link dan alert, bisa di set ke return false;-->
            <img src="images.jpeg" alt="daftar" class="box-image">
            <div class="box-text">
            <h2>Data Domisili</h2>
            </div>
        </a>
        <a href= "Data Admin/index.php" class="box" onclick="alert('Membuka halaman Data Admin!')"> <!--dengan link dan alert, bisa di set ke return false;-->
            <img src="images.jpeg" alt="daftar" class="box-image">
            <div class="box-text">
            <h2>Data Admin</h2>
            </div>
        </a>
        </div>
        <div class="column">
            <a href="Laporan Gaji Bulanan Karyawan/index1.php" class="box" onclick="alert('Membuka halaman Laporan Gaji Bulanan!')"> <!--dengan link dan alert, bisa di set ke return false;-->
                <img src="images.jpeg" alt="daftar" class="box-image">
                <div class="box-text">
                <h2>Laporan<br>Gaji<br>Bulanan</h2>
                </div>
            </a>    
            <a href="Data Kontrak/index.php" class="box" onclick="alert('Membuka halaman Data Kontrak!')"> <!--dengan link dan alert, bisa di set ke return false;-->
            <img src="images.jpeg" alt="daftar" class="box-image">
            <div class="box-text">
            <h2>Data Kontrak</h2>
            </div>
        </a>
            <a href="Data Gaji/index.php" class="box" onclick="alert('Membuka halaman Data Gaji!')"> <!--dengan link dan alert, bisa di set ke return false;-->
            <img src="images.jpeg" alt="daftar" class="box-image">
            <div class="box-text">
            <h2>Data Gaji</h2>
            </div>
        </a>
        <a href="Data Departemen/index.php" class="box" onclick="alert('Membuka halaman Data Departemen!')">
            <img src="Grading-2018-1.png" alt="daftar" class="box-image">
            <div class="box-text">
            <h2>Data Departemen</h2>
            </div>
        </a>
        <a href="Status Kehadiran/index.php" class="box" onclick="alert('Membuka halaman Status Kehadiran!')">
            <img src="Grading-2018-1.png" alt="daftar" class="box-image">
            <div class="box-text">
            <h2>Status Hadir</h2>
            </div>
        </a>
        </div>
    </div>
</div>
<script src="notif lebih 1.js"></script>
</body>
</html>