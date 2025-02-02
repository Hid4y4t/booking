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
      <h1>Laporan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Laporan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- pesanan Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                
                <div class="card-body">
                  <h5 class="card-title">Booking <span>| Hari Ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?php
                          include '../koneksi/koneksi.php';
                          $tanggal = date("Y-m-d"); // Mendapatkan tanggal hari ini

                          $query = "SELECT COUNT(*) AS jumlah_data FROM pemesanan WHERE tanggal = '$tanggal'";
                          $result = mysqli_query($conn, $query);

                          if ($result) {
                              $row = mysqli_fetch_assoc($result);
                              $jumlah_data = $row['jumlah_data'];
                              echo  $jumlah_data;
                          } else {
                              echo "0" ;
                          }

                          mysqli_close($conn);
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
                  <h5 class="card-title">Laporan Pertanggal</h5>
                

<?php
// Koneksi ke database
include '../koneksi/koneksi.php';

// Ambil data unik untuk kolom tanggal
$query_tanggal = "SELECT DISTINCT tanggal FROM pemesanan";
$result_tanggal = mysqli_query($conn, $query_tanggal);

?>
<table class="table table-borderless datatable">
    <tr>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>

    <?php
    while ($row_tanggal = mysqli_fetch_assoc($result_tanggal)) {
        echo "<tr>";
        echo "<td>" . $row_tanggal['tanggal'] . "</td>";
        echo "<td><a href='detail_laporan.php?tanggal=" . $row_tanggal['tanggal'] . "'>Lihat Laporan</a></td>";
        echo "</tr>";
    }
    ?>

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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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