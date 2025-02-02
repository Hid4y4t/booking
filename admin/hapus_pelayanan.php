<?php
 include "../koneksi/koneksi.php";

$idData = $_GET['id'];; // ID data yang ingin dihapus

// Query untuk mengambil informasi file foto yang akan dihapus
$query = "SELECT foto FROM kelebihan_pelayanan WHERE id = $idData";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
$namaFoto = $row['foto'];

// Query untuk menghapus data dari tabel
$query = "DELETE FROM kelebihan_pelayanan WHERE id = $idData";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
  echo "Error: " . mysqli_error($conn);
}

// Lokasi folder tempat menyimpan foto

$folderFoto = "../assets/fotopelayanan/";

// Menghapus file foto
$lokasiFoto = $folderFoto . $namaFoto;
if (file_exists($lokasiFoto)) {
    unlink($lokasiFoto);
}

// Menutup koneksi ke database
mysqli_close($conn);
?>
