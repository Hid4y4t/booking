<?php
    // Pastikan Anda sudah terhubung ke database sebelum mengeksekusi query
    include "../koneksi/koneksi.php";

    if (isset($_POST["submit"])) {
        // Ambil data dari form
        $nama_katagory = $_POST["nama_katagory"];

        // Proses penyimpanan data ke dalam tabel kategori
        $query = "INSERT INTO kategori (nama_katagory) VALUES ('$nama_katagory')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {
            echo "Gagal menambahkan kategori: " . mysqli_error($conn);
        }
    }
    ?>