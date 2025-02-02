<?php
// Koneksi ke database
include "../koneksi/koneksi.php";
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$tersedia = $_POST['tersedia'];


// Mengatur query untuk menyimpan data ke tabel jadwal
$query = "INSERT INTO jadwal (tanggal, jam, tersedia) VALUES ('$tanggal', '$jam', '$tersedia')";

// Menjalankan query
if (mysqli_query($conn, $query)) {
    header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>
