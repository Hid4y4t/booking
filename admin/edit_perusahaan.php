<?php
// Koneksi ke database
include '../koneksi/koneksi.php';

// Mengambil data dari form edit
$id = $_POST['id'];
$namaUsaha = $_POST['nama_usaha'];
$alamat = $_POST['alamat'];
$penjelasan = $_POST['penjelasan'];
$visi = $_POST['visi'];
$misi = $_POST['misi'];

// Memeriksa apakah ada file logo yang diunggah
if (isset($_FILES['logo']) && $_FILES['logo']['name'] != '') {
    // Mengunggah logo baru
    $targetDir = '../assets/logo_usaha/'; // Ganti dengan lokasi folder penyimpanan logo
    $namaLogo = uniqid() . '_' . $_FILES['logo']['name'];
    $targetPath = $targetDir . $namaLogo;

    if (move_uploaded_file($_FILES['logo']['tmp_name'], $targetPath)) {
        // Menyimpan data ke database dengan logo baru
        $query = "UPDATE perusahaan SET nama_usaha='$namaUsaha', alamat='$alamat', penjelasan='$penjelasan', visi='$visi', misi='$misi', logo='$namaLogo' WHERE id=$id";
        mysqli_query($conn, $query);
    } else {
        // Jika gagal mengunggah logo baru
        $query = "UPDATE perusahaan SET nama_usaha='$namaUsaha', alamat='$alamat', penjelasan='$penjelasan', visi='$visi', misi='$misi' WHERE id=$id";
        mysqli_query($conn, $query);
    }
} else {
    // Jika tidak ada logo diunggah, hanya menyimpan data tanpa logo
    $query = "UPDATE perusahaan SET nama_usaha='$namaUsaha', alamat='$alamat', penjelasan='$penjelasan', visi='$visi', misi='$misi' WHERE id=$id";
    mysqli_query($conn, $query);
}

// Menutup koneksi
mysqli_close($conn);

// Mengarahkan pengguna kembali ke halaman form edit tanpa menampilkan pesan hasil penyimpanan data
header("Location: setting.php");
exit();
?>
