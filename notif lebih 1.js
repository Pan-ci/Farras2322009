let notificationsContainer = document.getElementById("contractNotificationsContainer");
// Hapus semua peringatan sebelumnya
const alerts = notificationsContainer.querySelectorAll(".alert");
alerts.forEach(alert => alert.remove());
console.log("Memulai pengecekan kontrak..."); // Log di awal untuk menandai proses dimulai
console.log(contracts);  // Debugging: tampilkan semua kontrak
let hasNotification = false;  // Variabel untuk melacak apakah ada pemberitahuan

contracts.forEach(function(contract) {
    console.log("Memeriksa kontrak ID: " + contract.id_kontrak); // Log ID kontrak saat diperiksa

    let contractEndDate = new Date(contract.akhir_kontrak);
    console.log("Tanggal akhir kontrak (kontrak ID " + contract.id_kontrak + "): " + contractEndDate); // Log tanggal akhir kontrak

    let timeRemaining = contractEndDate - currentDate;
    console.log("Waktu yang tersisa untuk kontrak ID " + contract.id_kontrak + ": " + timeRemaining + " ms"); // Log waktu yang tersisa

    if (timeRemaining <= 0) {
        console.log("Kontrak ID " + contract.id_kontrak + " sudah berakhir!"); // Log jika kontrak sudah berakhir
        let notif = document.createElement("div");
        notif.classList.add("alert", "alert-danger");
        // Menambahkan <br> untuk memisahkan teks menjadi dua baris
        notif.innerHTML = "Kontrak ID " + contract.id_kontrak + " sudah berakhir!<br>Status Karyawan dengan Kontrak ID " + contract.id_kontrak + " telah diubah menjadi 'Tidak Aktif'";
        notificationsContainer.appendChild(notif);
        hasNotification = true; // Menandakan ada pemberitahuan
    } else if (timeRemaining <= 30 * 24 * 60 * 60 * 1000) {
        console.log("Kontrak ID " + contract.id_kontrak + " akan habis dalam waktu dekat!"); // Log jika kontrak hampir habis
        let notif = document.createElement("div");
        notif.classList.add("alert", "alert-warning");
        notif.innerHTML = "Kontrak ID " + contract.id_kontrak + " akan habis dalam waktu dekat!";
        notificationsContainer.appendChild(notif);
        hasNotification = true; // Menandakan ada pemberitahuan
    }
});
// Tampilkan atau sembunyikan container berdasarkan apakah ada pemberitahuan
if (hasNotification) {
    notificationsContainer.style.display = 'block'; // Menampilkan jika ada pemberitahuan
} else {
    notificationsContainer.style.display = 'none';  // Menyembunyikan jika tidak ada pemberitahuan
}
console.log("Pengecekan kontrak selesai."); // Log di akhir untuk menandai proses selesai

contracts.forEach(function(contract) {
    let contractEndDate = new Date(contract.akhir_kontrak);
    let timeRemaining = contractEndDate - currentDate;

    if (timeRemaining <= 0) {
        // Kirim data ke server untuk memperbarui status KRY
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "update_status_kry.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log("Status KRY diperbarui: " + xhr.responseText);
            }
        };
        xhr.send("id_kontrak=" + contract.id_kontrak);
    }
});
