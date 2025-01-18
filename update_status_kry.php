<?php
// Koneksi ke database
include_once("koneksi.php");

// Ambil ID kontrak dari permintaan POST
if (isset($_POST['id_kontrak'])) {
    $idKontrak = $_POST['id_kontrak'];

    // Query untuk mendapatkan ID karyawan berdasarkan kontrak
    $sql = "SELECT k.id_KRY, k.status_KRY 
            FROM kontrak c 
            JOIN kry k ON c.id_KRY_kontrak = k.id_KRY 
            WHERE c.id_kontrak = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $idKontrak);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah karyawan ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idKRY = $row['id_KRY'];
        $statusKRY = $row['status_KRY'];

        // Jika status KRY bukan 'Tidak Aktif', maka update status menjadi 'Tidak Aktif'
        if ($statusKRY != 'Tidak Aktif') {
            $updateSql = "UPDATE kry SET status_KRY = 'Tidak Aktif' WHERE id_KRY = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("s", $idKRY);
            if ($updateStmt->execute()) {
                echo "Status KRY berhasil diperbarui menjadi Tidak Aktif.";
            } else {
                echo "Gagal memperbarui status KRY.";
            }
        } else {
            echo "Status KRY sudah Tidak Aktif.";
        }
    } else {
        echo "Karyawan tidak ditemukan.";
    }
} else {
    echo "ID kontrak tidak ditemukan.";
}
?>
