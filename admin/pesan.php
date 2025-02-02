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
      <h1>PESAN</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Pesan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Advanced Content</h5>

              <!-- List group with Advanced Contents -->
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">List group item heading</h5>
                    <small>3 days ago</small>
                  </div>
                  <p class="mb-1">Some placeholder content in a paragraph.</p>
                  <small>And some small print.</small>
                </a>
                
              </div><!-- End List group Advanced Content -->

            </div>
          </div>
        </div>
  
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