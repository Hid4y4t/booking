<?php
session_start();

// Cek apakah pengguna sudah login dan memiliki jabatan sebagai admin
if (!isset($_SESSION["id"]) || $_SESSION["jabatan"] !== "user") {
    header("Location: ../login/index.php");
    exit();
}
include '../koneksi/koneksi.php';
$id_login = $_SESSION["id"];
$query = "SELECT * FROM user WHERE id='$id_login'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
// Jika memiliki jabatan admin, tampilkan halaman admin
?>