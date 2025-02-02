<?php
// Koneksi ke database
include '../koneksi/koneksi.php';

// Mengambil data dari form edit
$id = $_POST['id'];
$ig = $_POST['ig'];
$fb = $_POST['fb'];
$tiktok = $_POST['tiktok'];
$hp = $_POST['hp'];

// Query untuk mengupdate data pada tabel sosmed
$query = "UPDATE sosmed SET ig='$ig', fb='$fb', tiktok='$tiktok', hp='$hp' WHERE id=$id";

// Menjalankan query
if (mysqli_query($conn, $query)) {
    // Jika berhasil, redirect ke halaman utama atau halaman lain
    header("Location: setting.php");
    exit();
} else {
    // Jika terjadi error, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>
