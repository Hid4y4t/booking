<?php include 'root/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'root/head.php'; ?>
<body>
    <?php include 'root/header.php'; ?>
    <!-- ======= Sidebar ======= -->
    <?php include 'root/navbar.php'; ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- pesanan Card -->
                        <div class="col-xxl-4 col-md-12">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Booking <span>| Hari Ini</span> </h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <?php
                                                include '../koneksi/koneksi.php';
                                                $id_login = $_SESSION["id"];
                                                // Ambil data pemesanan berdasarkan ID login yang tersimpan dalam session
                                                $query = "SELECT * FROM pemesanan WHERE id_user='$id_login'";
                                                $result = mysqli_query($conn, $query);

                                                if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $tanggal_selesai = date("Y-m-d H:i:s", strtotime($row["tanggal"] . " " . $row["jam"]));
                                                    $countdown_js = strtotime($tanggal_selesai) * 1000; // Konversi ke milidetik untuk JavaScript
                                                    $countdown_id = 'countdown-' . $row["id"]; // Buat ID unik untuk hitungan mundur
                                                    echo "<p>Waktu Antrian Anda: <span id='" . $countdown_id . "'></span></p>";
                                                }
                                                } else {
                                                    echo "Anda Belum Melakukan Booking.";
                                                }
                                                ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->
                       <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <h5 class="card-title">Riwayat Pemesanan</h5>
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Jam</th>
                                                <th scope="col">Jenis</th>
                                                <th scope="col"> Harga</th>
                                                <th scope="col"> Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            include '../koneksi/koneksi.php';
                                             // Misalkan ID pengguna saat ini disimpan dalam variabel $id_pengguna_saat_ini
                                            $id_pengguna_saat_ini = $_SESSION["id"]; // Ganti dengan ID pengguna saat ini (misalnya, ID dari session)

                                            // Query untuk mengambil data pemesanan berdasarkan ID pengguna tertentu
                                            $query = "SELECT * FROM pemesanan WHERE id_user=$id_pengguna_saat_ini ORDER BY tanggal DESC, jam DESC";

                                            // Menjalankan query
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <?php
                                                    // Loop untuk menampilkan data pemesanan
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    
                                                        $nama = $row['nama'];
                                                        $tanggal = $row['tanggal'];
                                                        $jam = $row['jam'];
                                                        $jenis_pesanan = $row['jenis_pesanan'];
                                                        $harga = $row['harga'];
                                                        $keterangan = $row['keterangan'];
                                                        $harga_rupiah = "Rp " . number_format($harga, 0, ',', '.');
                                                        echo "<tr>";
                                                    
                                                        echo "<td>$nama</td>";
                                                        echo "<td>$tanggal</td>";
                                                        echo "<td>$jam</td>";
                                                        echo "<td>$jenis_pesanan</td>";
                                                        echo "<td>$harga_rupiah</td>";
                                                        echo "<td>$keterangan</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Recent Sales -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <?php include 'root/footer.php'; ?>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script>
    // Fungsi untuk meng-update hitungan mundur
    function updateCountdown(targetTime, elementId) {
        const now = new Date().getTime();
        const countdown = targetTime - now;
        if (countdown > 0) {
            const days = Math.floor(countdown / (1000 * 60 * 60 * 24));
            const hours = Math.floor((countdown % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((countdown % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((countdown % (1000 * 60)) / 1000);
            const countdown_text = (days >= 1) ? days + " Hari" : ("0" + hours).slice(-2) + ":" + ("0" + minutes).slice(
                -2) + ":" + ("0" + seconds).slice(-2);
            document.getElementById(elementId).innerHTML = countdown_text;
        } else {
            document.getElementById(elementId).innerHTML = "Selesai";
        }
    }
    // Jalankan fungsi updateCountdown setiap detik
    <?php
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "setInterval(function() { updateCountdown($countdown_js, '$countdown_id'); }, 1000);";
        }
        ?>
    </script>
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