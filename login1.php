<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hrd_3_genap";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek apakah form login sudah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Query untuk mencari user berdasarkan username
    $sql = "SELECT * FROM admin WHERE nama_admin = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    // Jika user ditemukan, cek password
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Setelah login berhasil, lakukan validasi password
        if (password_verify($pass, $row['pass_admin'])) {
            $_SESSION['username'] = $row['nama_admin'];
            $_SESSION['id_admin'] = $row['id_admin'];  // Menyimpan id_admin di session
            $_SESSION['id_KRY'] = $row['id_KRY'];
            // Pengarahan berdasarkan id_admin
            switch ($row['id_admin']) {
                case '1':
                    // Pengguna dengan id_admin 'ADM1' diarahkan ke halaman admin
                    header("Location: HRD.php");
                    break;
                case '2':
                    // Jika id_admin tidak dikenali, tampilkan pesan error atau arahkan ke halaman login lagi
                    header("Location: HRD - Copy.php");
                    break;
            }
            exit(); // Pastikan script tidak melanjutkan eksekusi setelah redirect
        } else {
            echo "Password salah!";
        }
    } else {
        // Jika user tidak ditemukan di tabel admin, cek di tabel karyawan
        $sql_karyawan = "SELECT * FROM kry WHERE nama_KRY = ?";
        $stmt_karyawan = $conn->prepare($sql_karyawan);
        $stmt_karyawan->bind_param("s", $user);
        $stmt_karyawan->execute();
        $result_karyawan = $stmt_karyawan->get_result();

        // Jika user ditemukan di tabel karyawan
        if ($result_karyawan->num_rows > 0) {
            $row_karyawan = $result_karyawan->fetch_assoc();

            // Validasi password untuk karyawan
            if (password_verify($pass, $row_karyawan['pass_KRY'])) {
                $_SESSION['username'] = $row_karyawan['nama_KRY'];
                $_SESSION['id_KRY'] = $row_karyawan['id_KRY'];  // Menyimpan id_KRY di session
                
                // Pengarahan berdasarkan id_KRY
                header("Location: HRD - Copy - Copy.php"); // Ganti dengan halaman yang sesuai untuk karyawan
                exit();
            } else {
                echo "Password salah!";
            }
        } else {
            echo "Username tidak ditemukan!";
        }
    }
}

$conn->close();
?>
