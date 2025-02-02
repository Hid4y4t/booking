<?php
 include "../koneksi/koneksi.php";
// Mendapatkan ID pemesanan dari parameter URL
$id = $_GET['id'];

// Update status pemesanan menjadi "Selesai"
$query = "UPDATE user SET status = 'tidak aktif' WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    // Redirect kembali ke halaman sebelumnya
    header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
    echo "Gagal menyelesaikan pemesanan: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
