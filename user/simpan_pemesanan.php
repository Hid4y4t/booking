<?php include 'root/session.php'; ?>
<?php
// proses_input_pemesanan.php

// Pastikan Anda sudah terhubung ke database sebelum mengeksekusi query
include '../koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id_user = $_SESSION["id"]; // Mendapatkan ID user dari sesi yang aktif
    $nama = $_POST["nama"];
    $tanggal = $_POST["tanggal"];
    $jenis_pesanan_id = $_POST["jenis_pesanan"];

    // Query untuk mengambil data jenis pesanan berdasarkan ID yang dipilih
    $query_jenis_pesanan = "SELECT * FROM jenis_pesanan WHERE id = ?";
    $stmt_jenis_pesanan = mysqli_prepare($conn, $query_jenis_pesanan);
    mysqli_stmt_bind_param($stmt_jenis_pesanan, "i", $jenis_pesanan_id);
    mysqli_stmt_execute($stmt_jenis_pesanan);
    $result_jenis_pesanan = mysqli_stmt_get_result($stmt_jenis_pesanan);
    $row_jenis_pesanan = mysqli_fetch_assoc($result_jenis_pesanan);

    $jenis_pesanan = $row_jenis_pesanan["nama"];
    $harga = $row_jenis_pesanan["harga"];
    $keterangan = $_POST["keterangan"];
    $status = "belum dibaca"; // Default status saat pemesanan
    $status_booking = "belum"; // Default status booking saat pemesanan

    // Query untuk mengambil jam berdasarkan tanggal yang dipilih
    $query_jam = "SELECT jam FROM jadwal WHERE tanggal = ? AND tersedia = 0 LIMIT 1";
    $stmt_jam = mysqli_prepare($conn, $query_jam);
    mysqli_stmt_bind_param($stmt_jam, "s", $tanggal);
    mysqli_stmt_execute($stmt_jam);
    $result_jam = mysqli_stmt_get_result($stmt_jam);
    if (mysqli_num_rows($result_jam) > 0) {
        $row_jam = mysqli_fetch_assoc($result_jam);
        $jam = $row_jam["jam"];
        // Update status tersedia di tabel jadwal menjadi 1 (telah terpesan)
        $query_update_jadwal = "UPDATE jadwal SET tersedia = 1 WHERE tanggal = ? AND jam = ?";
        $stmt_update_jadwal = mysqli_prepare($conn, $query_update_jadwal);
        mysqli_stmt_bind_param($stmt_update_jadwal, "ss", $tanggal, $jam);
        mysqli_stmt_execute($stmt_update_jadwal);
    } else {
        // Jika tidak ada jam tersedia pada tanggal yang dipilih, beri pesan error
        echo "Gagal menyimpan pemesanan: Tidak ada jam tersedia pada tanggal yang dipilih.";
        exit; // Hentikan eksekusi skrip
    }

    // Proses penyimpanan data pemesanan ke dalam tabel pemesanan menggunakan prepared statements
    $query = "INSERT INTO pemesanan (id_user, nama, tanggal, jam, jenis_pesanan, harga, keterangan, status, status_booking) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "issssisss", $id_user, $nama, $tanggal, $jam, $jenis_pesanan, $harga, $keterangan, $status, $status_booking);
    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        $_SESSION["success_message"] = "Pemesanan berhasil dilakukan.";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        $_SESSION["error_message"] = "Gagal menyimpan pemesanan: " . mysqli_error($conn);
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}
?>
