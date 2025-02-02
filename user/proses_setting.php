<?php
session_start();
include '../koneksi/koneksi.php';

$id_user = $_SESSION["id"];

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $ttl = $_POST["ttl"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $email = $_POST["email"];
    $status = "aktif";
    $jabatan = "user";

    // Jika foto tidak diubah, ambil foto yang sudah ada dari database
    $query_get_foto = "SELECT foto FROM user WHERE id = $id_user";
    $result_get_foto = mysqli_query($conn, $query_get_foto);

    if ($result_get_foto) {
        $row_get_foto = mysqli_fetch_assoc($result_get_foto);
        $existing_foto = $row_get_foto["foto"];

        // Periksa apakah ada file gambar yang diunggah
        if (!empty($_FILES["foto"]["name"])) {
            $foto = $_FILES["foto"]["name"];
            $foto_tmp = $_FILES["foto"]["tmp_name"];
            $foto_path = "../assets/foto_user/" . $foto; // Ganti "folder_anda" dengan direktori tempat menyimpan foto
            move_uploaded_file($foto_tmp, $foto_path);
        } else {
            // Jika foto tidak diubah, gunakan foto yang sudah ada
            $foto = $existing_foto;
        }

        // Proses penyimpanan perubahan data user ke dalam tabel user
        $query = "UPDATE user SET nama='$nama', username='$username', password='$password', ttl='$ttl', alamat='$alamat', no_hp='$no_hp', email='$email', foto='$foto', status='$status', jabatan='$jabatan' WHERE id=$id_user";

        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: setting.php");
        } else {
            echo "Gagal menyimpan perubahan data: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal mengambil data foto user: " . mysqli_error($conn);
    }
}

$query_user = "SELECT * FROM user WHERE id=$id_user";
$result_user = mysqli_query($conn, $query_user);

if ($result_user) {
    $data_user = mysqli_fetch_assoc($result_user);
} else {
    echo "Gagal mengambil data user: " . mysqli_error($conn);
}
?>
