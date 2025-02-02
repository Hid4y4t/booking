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
            <h1>User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">user</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

            <div class="col-12">
                    <div class="card recent-sales overflow-auto">



                        <div class="card-body">
                            <h5 class="card-title">Data <span>| User</span></h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">ID User</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">No Hp</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                            //koneksi
                                            include '../koneksi/koneksi.php';
                                            $no = 1;
                                            $data = mysqli_query($conn, "select * from user");
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                    <tr>
                                        <th scope="row"><a href="#"><?php echo $d['id']; ?></a></th>
                                        <td><?php echo $d['nama']; ?></td>
                                        <td><a href="#" class="text-primary"><?php echo $d['no_hp']; ?></a></td>
                                        <td><?php echo $d['alamat']; ?></td>
                                        
                                        <td> 
                                            <a href="view_user.php?id=<?php echo $d['id']; ?>"> <button type="button" class="btn btn-primary">
                                                <i class="bi bi-eye"></i>
                                            </button></a>
                                             
                                           

                                            <button class="btn bg-danger" onclick="hapususer('<?php echo $d['id']; ?>')"><i class="ri-delete-bin-2-fill"></i></button>

                                            
                                    </tr>
                                    <?php
                                            }
                                            ?>
                                </tbody>
                            </table>

                            <!-- modal lihat data pesanan -->
                            
                            
                            <!-- endmodal lihat data pesanan -->

                        </div>

                    </div>
                </div>
                
            </div>

        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include 'root/footer.php'; ?>

  
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