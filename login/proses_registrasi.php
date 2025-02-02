<?php
// proses_registrasi.php

// Pastikan Anda sudah terhubung ke database sebelum mengeksekusi query
include '../koneksi/koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Enkripsi password menggunakan MD5
    $nama = $_POST["nama"];
    $ttl = $_POST["ttl"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $email = $_POST["email"];

    // Cek apakah username atau nomor HP sudah terdaftar sebelumnya
    $query_check = "SELECT * FROM user WHERE username='$username' OR no_hp='$no_hp'";
    $result_check = mysqli_query($conn, $query_check);
    if (mysqli_num_rows($result_check) > 0) {
        echo "Registrasi gagal. Username atau nomor HP sudah terdaftar sebelumnya. <a href='register.php'> kembali</a>";
        exit();
    }

    // Upload foto ke folder "foto_user"
    $target_dir = "../assets/foto_user/";
    $foto = $_FILES["foto"]["name"];
    $extension = pathinfo($foto, PATHINFO_EXTENSION);
    $foto_name = $username . '_' . uniqid() . '.' . $extension;
    $target_file = $target_dir . $foto_name;
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

    // Proses penyimpanan data user ke dalam database
    $query = "INSERT INTO user (username, password, nama, ttl, alamat, no_hp, email, foto, status, jabatan) VALUES ('$username', '$password', '$nama', '$ttl', '$alamat', '$no_hp', '$email', '$foto_name', 'aktif', 'user')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal melakukan registrasi: " . mysqli_error($conn);
    }
}
?>
