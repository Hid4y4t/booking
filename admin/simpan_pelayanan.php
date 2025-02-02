<?php
// Koneksi ke database
include "../koneksi/koneksi.php";

// Mendapatkan data dari form
$nama = $_POST['nama'];
$penjelasan = $_POST['penjelasan'];

// Memeriksa apakah file foto diunggah
if (isset($_FILES['foto']) && $_FILES['foto']['name'] != '') {
    // Mengunggah foto baru
    $targetDir = '../assets/fotopelayanan/';
    $namaFoto = uniqid() . '_' . $_FILES['foto']['name'];
    $targetPath = $targetDir . $namaFoto;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetPath)) {
        // Menyimpan data ke database
        $query = "INSERT INTO kelebihan_pelayanan (nama_pelayanan, penjelasaan, foto) VALUES ('$nama', '$penjelasan', '$namaFoto')";
        if (mysqli_query($conn, $query)) {
            $pesan = "Data berhasil disimpan dengan foto baru.";
        } else {
            $pesan = "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        $pesan = "Gagal mengunggah foto baru.";
    }
} else {
    // Jika tidak ada foto diunggah, hanya menyimpan data tanpa foto
    $query = "INSERT INTO kelebihan_pelayanan (nama_pelayanan, penjelasaan) VALUES ('$nama', '$penjelasan')";
    if (mysqli_query($conn, $query)) {
        $pesan = "Data berhasil disimpan tanpa foto.";
    } else {
        $pesan = "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Menutup koneksi
mysqli_close($conn);

// Mengarahkan pengguna ke halaman setting.php dengan menyertakan pesan hasil penyimpanan data sebagai parameter
header("Location: setting.php?pesan=" . urlencode($pesan));
exit();
?>
