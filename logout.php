<?php
session_start(); // Mulai sesi

// Hapus semua variabel sesi
session_unset();

// Hapus sesi itu sendiri
session_destroy();

// Arahkan pengguna ke halaman login setelah logout
header("Location: index.php");
exit();
/* Langkah 6: Menambahkan Pengamanan Password
Pada saat menambah data pengguna baru, pastikan untuk menyimpan password dengan aman menggunakan password_hash. Misalnya, untuk menambah user baru:

php
Copy code
$password = 'admin123';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password) VALUES ('admin', '$hashed_password')";*/
?>