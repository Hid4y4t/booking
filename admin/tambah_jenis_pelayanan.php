<?php
// Koneksi ke database
include "../koneksi/koneksi.php";
$nama = $_POST['nama'];
$harga = $_POST['harga'];

// Menghilangkan titik dan koma dari input harga
$validharga = str_replace(',', '', $harga);
$validharga = str_replace('.', '', $validharga);
$keterangan = $_POST['keterangan'];
// Memvalidasi harga sebagai angka
if (!is_numeric($validharga)) {
    echo "Harga harus berupa angka.";
    exit();
}

// Mengatur query untuk menyimpan data ke tabel jenis_pesanan
$query = "INSERT INTO jenis_pesanan (nama, harga, keterangan) VALUES ('$nama', '$validharga', '$keterangan')";

// Menjalankan query
if (mysqli_query($conn, $query)) {
    header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>
