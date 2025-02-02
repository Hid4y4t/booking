



<?php
// proses_login.php

session_start();

// Pastikan Anda sudah terhubung ke database sebelum mengeksekusi query
include '../koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Enkripsi password menggunakan MD5

    // Cari pengguna berdasarkan username dan password yang sesuai
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && $user["status"] === 'aktif') {
        // Jika login berhasil dan status user aktif, atur session berdasarkan jabatan (admin atau user)
        $_SESSION["id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["jabatan"] = $user["jabatan"];
        
        // Redirect ke halaman sesuai jabatan (admin atau user)
        if ($user["jabatan"] === "admin") {
            header("Location: ../admin/index.php");
        } else {
            header("Location: ../user/index.php");
        }
        exit();
    } else {
         // Jika login gagal atau status user tidak aktif, kembali ke halaman login dengan pesan kesalahan
         $_SESSION["pesan"] = "Login gagal. Username atau password salah atau akun tidak aktif.";
         header("Location: index.php");
         exit();
    }
}
?>

