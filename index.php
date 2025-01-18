<?php
session_start();  // Mulai sesi pertama

// Hapus sesi lama jika ada
session_unset();  // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi yang ada

// Mulai sesi baru
session_start();  // Mulai sesi baru

// Set variabel sesi baru jika diperlukan
// $_SESSION['username'] = 'some_value';

// Anda bisa melanjutkan dengan form login atau proses lainnya
?>
<!DOCTYPE html> <!-- deklarasi HTML5 -->
<html lang="id"> <!-- bahasa konten -->
<head>
    <meta charset="UTF-8"> <!-- kode karakter -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- lebar perangkat, skala tanpa zoom -->
    <title>Edit Karyawan</title>
    <link rel="stylesheet" href="templet.css"> <!-- lembar styling -->
    <!--<script src="validasi_editKRY.js" defer></script>  menambahkan skrip JS terpisah -->
</head>
<body>
    <header>
        <img src="rumput.jpg" alt="sentuh rumput dulu" class="header-image"> <!-- alternative text -->
        <div class="overlay"></div> <!-- elemen kontainer -->
        <h1>HR Management</h1>
    </header>
    <hr>
    <div class="containerBG">
        <div class="containerEstimasi">
            <div class="boxx"><br>
                <h2>Login</h2>
                <form action="login1.php" method="POST">
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" required><br><br>

                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required><br><br>

                    <input type="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
