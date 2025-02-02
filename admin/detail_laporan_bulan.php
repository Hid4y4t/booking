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
                    <li class="breadcrumb-item active">Detail Laporan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">



                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">




                                <div class="card">



                                <?php
// Ambil bulan dan tahun dari parameter URL
$bulan_terpilih = date('Y-m', strtotime($_GET['bulan']));

// Ambil data jenis pesanan dan jumlahnya berdasarkan bulan
$query_jenis_pesanan = "SELECT jenis_pesanan, COUNT(*) as jumlah FROM pemesanan WHERE DATE_FORMAT(tanggal, '%Y-%m') = '$bulan_terpilih' GROUP BY jenis_pesanan";
$result_jenis_pesanan = mysqli_query($conn, $query_jenis_pesanan);

// Inisialisasi array untuk menyimpan data
$data_jenis_pesanan = [];

while ($row_jenis_pesanan = mysqli_fetch_assoc($result_jenis_pesanan)) {
    $data_jenis_pesanan[] = [
        'value' => (int)$row_jenis_pesanan['jumlah'],
        'name' => $row_jenis_pesanan['jenis_pesanan']
    ];
}

// Tutup koneksi
mysqli_close($conn);
?>

<div class="card-body pb-0">
    <h5 class="card-title">Jumlah Pesanan per Jenis pada <?php echo $bulan_terpilih; ?></h5>

    <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
        echarts.init(document.querySelector("#trafficChart")).setOption({
            tooltip: {
                trigger: 'item',
                formatter: '{a} <br/>{b}: {c} ({d}%)'
            },
            legend: {
                top: '5%',
                left: 'center'
            },
            series: [{
                name: 'Jumlah Pesanan',
                type: 'pie',
                radius: ['40%', '70%'],
                avoidLabelOverlap: false,
                label: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                    }
                },
                labelLine: {
                    show: false
                },
                data: <?php echo json_encode($data_jenis_pesanan); ?> // Menggunakan data yang diambil dari PHP
            }]
        });
    });
    </script>
</div>


                                    </div>
                                </div><!-- End Website Traffic -->

                             <div class="card">
                                <div class="card-body">
                                <?php
// Koneksi ke database
include '../koneksi/koneksi.php';
// Fungsi untuk mengubah format harga menjadi format rupiah
function format_rupiah($nilai) {
    return "Rp " . number_format($nilai, 0, ',', '.');
}
// Ambil bulan dari parameter URL
$bulan_terpilih = $_GET['bulan'];

// Ambil data pesanan berdasarkan bulan
$query_laporan = "SELECT jenis_pesanan, COUNT(*) as jumlah, 
                          AVG(CAST(harga AS DECIMAL(10,2))) as harga_per_jenis,
                          SUM(CAST(harga AS DECIMAL(10,2))) as total_harga
                  FROM pemesanan 
                  WHERE DATE_FORMAT(tanggal, '%Y-%m') = '$bulan_terpilih' 
                  GROUP BY jenis_pesanan";

$result_laporan = mysqli_query($conn, $query_laporan);

// Query untuk menghitung total harga semua pesanan pada bulan tersebut
$query_total_harga = "SELECT SUM(CAST(harga AS DECIMAL(10,2))) as total_harga_semua 
                      FROM pemesanan 
                      WHERE DATE_FORMAT(tanggal, '%Y-%m') = '$bulan_terpilih'";

$result_total_harga = mysqli_query($conn, $query_total_harga);
$row_total_harga = mysqli_fetch_assoc($result_total_harga);
$total_harga_semua = $row_total_harga['total_harga_semua'];
?>

<h2>Laporan Pemesanan pada Bulan <?php echo $bulan_terpilih; ?></h2>

<table class="table table-borderless datatable">
    <tr>
        <th>Jenis Pesanan</th>
        <th>Jumlah</th>
        <th>Harga per Jenis</th>
        <th>Total Harga</th>
    </tr>

    <?php
    while ($row_laporan = mysqli_fetch_assoc($result_laporan)) {
        echo "<tr>";
        echo "<td>" . $row_laporan['jenis_pesanan'] . "</td>";
        echo "<td>" . $row_laporan['jumlah'] . "</td>";
        echo "<td>" . format_rupiah($row_laporan['harga_per_jenis']) . "</td>";
        echo "<td>" . format_rupiah($row_laporan['total_harga']) . "</td>";
        echo "</tr>";
    }
    ?>

    <!-- Menampilkan Total Harga Semua Pesanan pada Bulan Tersebut -->
    <tr>
        <td><strong>Total Harga Semua</strong></td>
        <td></td>
        <td></td>
        <td><strong><?php echo format_rupiah($total_harga_semua); ?></strong></td>
    </tr>
</table>


                                </div>
                             </div>
                            </div>

                        </div>
                    </div><!-- End Left side columns -->


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