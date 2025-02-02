<?php
 include "../koneksi/koneksi.php";

// Mendapatkan ID data yang ingin dihapus
$id = $_GET['id'];

// Menjalankan query untuk menghapus data
$query = "DELETE FROM jadwal WHERE id = '$id'";
$result = mysqli_query($conn, $query);

// Memeriksa apakah query berhasil dijalankan
if ($result) {
    header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
  echo "Error: " . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>
