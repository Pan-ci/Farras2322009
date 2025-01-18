<?php
session_start(); // Panggil session_start() sebelum HTML atau output apapun.
?>
<!DOCTYPE html> <!--deklarasi HTML5-->
<html lang="id"> <!--bahasa konten-->
<head>
    <meta charset="UTF-8"> <!--kode karakter-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--lebar perangkat, skala tanpa zoom-->
    <title>Halaman Beranda</title>
    <link rel="stylesheet" href="Portal Informasi Mahasiswa - revisi terbaru.css"> <!--lembar styling-->
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
echo "<br>Selamat datang, Karyawan " . $_SESSION['username'] . "!<br>";
echo "<br><button class=\"button reset\" style=\"width: 100px\" onclick=\"window.location.href='logout.php'\">Logout</button>";
echo "<br><br></div>";
?></div>
    <div class="containerBeranda">
        <div class="column">
            <a href="Laporan Harian Kehadiran Karyawan/index - Copy - Copy.php" class="box" onclick="alert('Membuka halaman Laporan Kehadiran Harian!')"> <!--event click, fungsi js kotak dialog, ok u/ tutup-->
                <img src="download (1).jpeg" alt="daftar" class="box-image">
                <div class="box-text">
                <h2>Laporan<br>Kehadiran<br>Harian</h2>
                </div>
            </a>
            <a href= "Domisili/cek.php" class="box" onclick="alert('Membuka halaman Pengecekan Domisili!')"> <!--dengan link dan alert, bisa di set ke return false;-->
            <img src="images.jpeg" alt="daftar" class="box-image">
            <div class="box-text">
            <h2>Cek Domisili</h2>
            </div>
        </a>
        </div>
        <div class="column">
            <a href="Laporan Gaji Bulanan Karyawan/index - Copy - Copy.php" class="box" onclick="alert('Membuka halaman Laporan Gaji Bulanan!')"> <!--dengan link dan alert, bisa di set ke return false;-->
                <img src="images.jpeg" alt="daftar" class="box-image">
                <div class="box-text">
                <h2>Laporan<br>Gaji<br>Bulanan</h2>
                </div>
            </a>
            <a href="Data Kontrak/index - Copy - Copy.php" class="box" onclick="alert('Membuka halaman Data Kontrak!')"> <!--dengan link dan alert, bisa di set ke return false;-->
            <img src="images.jpeg" alt="daftar" class="box-image">
            <div class="box-text">
            <h2>Data Kontrak</h2>
            </div>
        </a>
        </div>
    </div>
</div>
   <!--<<script src="script.js"></script>-->
</body>
</html>
