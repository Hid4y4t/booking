<?php include 'root/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'root/head.php'; ?>


<body>

    <?php include 'root/header.php'; ?>

    <!-- ======= Sidebar ======= -->
    <?php include 'root/navbar.php'; ?>

    <main id="main" class="main">
        <?php
if (isset($_SESSION["success_message"])) {
    echo "<div style='color: green;'>{$_SESSION["success_message"]}</div>";
    unset($_SESSION["success_message"]); // Hapus sesi setelah ditampilkan
}

if (isset($_SESSION["error_message"])) {
    echo "<div style='color: red;'>{$_SESSION["error_message"]}</div>";
    unset($_SESSION["error_message"]); // Hapus sesi setelah ditampilkan
}
?>
        <div class="pagetitle">
            <h1>Booking</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Booking</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <form action="simpan_pemesanan.php" method="post">
                            <div class="row mb-3">
                                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-5">
                                    <input type="text" name="nama" class="form-control" id="inputNama" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Pilih Tanggal</label>
                                <div class="col-sm-5">
                                    <?php
            include '../koneksi/koneksi.php'; // Sesuaikan dengan file koneksi database Anda

            $query_jadwal = "SELECT * FROM jadwal WHERE tersedia = 0";
            $result_jadwal = mysqli_query($conn, $query_jadwal);

            while ($row_jadwal = mysqli_fetch_assoc($result_jadwal)) {
                echo "<input type='radio' name='tanggal' value='". $row_jadwal["tanggal"] . "'>";
                echo $row_jadwal["tanggal"] . " - " . $row_jadwal["jam"] . "<br>";
            }
            ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPesanan" class="col-sm-2 col-form-label">Jenis Pesanan</label>
                                <div class="col-sm-5">
                                    <select name="jenis_pesanan" required class="form-select"
                                        aria-label="Default select example">
                                        <?php
                $query_jenis = "SELECT * FROM jenis_pesanan";
                $result_jenis = mysqli_query($conn, $query_jenis);

                while ($row_jenis = mysqli_fetch_assoc($result_jenis)) {
                    echo "<option value='" . $row_jenis["id"] . "'>" . $row_jenis["nama"] . "</option>";
                }
                ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputKeterangan" class="col-sm-2 col-form-label">Buat Keterangan</label>
                                <div class="col-sm-5">
                                    <input type="text" name="keterangan" class="form-control" id="inputKeterangan"
                                        required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-5">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-1"></i> Buat Pemesanan
                                    </button>
                                </div>
                            </div>
                        </form>


                        <hr>
                        <hr>
                    </div>
                </div><!-- End Left side columns -->
                <?php
include '../koneksi/koneksi.php';

// Gantilah $id_login dengan nilai sesuai dengan kebutuhan Anda
$id_login = $_SESSION["id"];

// Query SQL dengan pengurutan descending berdasarkan kolom id
$query = "SELECT * FROM pemesanan WHERE id_user = ? ORDER BY id DESC";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id_login);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
                <table class="table table-borderless datatable">
                    <tr>

                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Jenis Pesanan</th>
                        <th>Harga</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Status Booking</th>
                    </tr>

                    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
       
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['tanggal'] . "</td>";
        echo "<td>" . $row['jam'] . "</td>";
        echo "<td>" . $row['jenis_pesanan'] . "</td>";
        echo "<td>" . $row['harga'] . "</td>";
        echo "<td>" . $row['keterangan'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['status_booking'] . "</td>";
        echo "</tr>";
    }
    ?>

                </table>

            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include 'root/footer.php'; ?>



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>






    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>