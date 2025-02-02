<?php include 'root/session.php'; ?>
<?php
   include "../koneksi/koneksi.php";
   $id = $_GET['id'];
$status = mysqli_query($conn, "UPDATE pemesanan SET status='sudah dibaca' WHERE id=$id"); 

 ?>



<!DOCTYPE html>
<html lang="en">
<?php include 'root/head.php'; ?>


<body>

    <?php include 'root/header.php'; ?>

    <!-- ======= Sidebar ======= -->
    <?php include 'root/navbar.php'; ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Detail</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="user.php">user</a></li>
                    <li class="breadcrumb-item active">Detail user</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <?php
                        if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        }
                        include "../koneksi/koneksi.php";
                        $data = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");
                        $d = mysqli_fetch_array($data); {
                        ?>
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img style="max-width: 50%;" src="../assets/foto_user/<?php echo $d['foto'];?>" alt="Profile" class="rounded-circle">
                            <h2><?php echo $d['nama'];?></h2>
                            <h3><?php echo $d['no_hp'];?></h3>

                        </div>
                    </div>
                </div>


                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">


                                <h5 class="card-title">Detail User</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                                    <div class="col-lg-9 col-md-8">: <?php echo $d['nama'];?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Username</div>
                                    <div class="col-lg-9 col-md-8">: <?php echo $d['username'];?></div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">TTL</div>
                                    <div class="col-lg-9 col-md-8">: <?php echo $d['ttl'];?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                                    <div class="col-lg-9 col-md-8">:<?php echo $d['alamat'];?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">NoMor Hp</div>
                                    <div class="col-lg-9 col-md-8">:<?php echo $d['no_hp'];?></div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">:<?php echo $d['email'];?></div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                                    <div class="col-lg-9 col-md-8">:<?php echo $d['alamat'];?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jabatan</div>
                                    <div class="col-lg-9 col-md-8">:<?php echo $d['jabatan'];?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Status</div>
                                    <div class="col-lg-9 col-md-8">:<?php echo $d['status'];?></div>
                                </div>


                                <br>

                                <?php
                                 if ($d['status'] == 'tidak aktif') {
                                    echo "<button  type='button' class='btn btn-primary rounded-pill '  onclick='aktifkan(" . $d['id'] . ")'> <i class='bi bi-check-circle'> </i>Aktifkan User</button>";
                                } else {
                                    echo "<button type='button' class='btn btn-danger rounded-pill' onclick='blokir(" . $d['id'] . ")'><i class='bi bi-exclamation-octagon'> </i>Blokir User</button>";
                                }
                                ?>

<button class="btn btn-danger rounded-pill" onclick="hapususer('<?php echo $d['id']; ?>')"><i class="ri-delete-bin-2-fill"></i> Hapus User</button>

                            </div>
                        </div>
                    </div>
                </div>

                <?php
                }
                ?>


                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Pesanan</h5>

                            <?php
                        if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        }
                        include "../koneksi/koneksi.php";
                        $data = mysqli_query($conn, "SELECT * FROM pemesanan WHERE  id_user='$id'");
                        $d = mysqli_fetch_array($data); {
                        ?>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Jam</th>
                                        <th scope="col">Jenis Pemesanan </th>
                                        <th scope="col">Biaya</th>
                                        <th scope="col">status</th>
                                        <th scope="col">status_booking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                       
                                        <td><?php echo $d['tanggal'];?></td>
                                        <td><?php echo $d['jam'];?></td>
                                        <td><?php echo $d['jenis_pesanan'];?></td>
                                        <td><?php echo $d['harga'];?></td>
                                        <td><?php echo $d['status'];?></td>
                                        <td><?php echo $d['status_booking'];?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                            <?php
                }
                ?>

                        </div>
                    </div>

                </div>




            </div>




        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include 'root/footer.php'; ?>
    <script>
        // Fungsi untuk menandai pemesanan sebagai selesai
        function hapususer(id) {
            if (confirm("Anda yakin pemesanan ini sudah selesai?")) {
                window.location.href = "hapus_user.php?id=" + id;
            }
        }
    </script>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script>
    // Fungsi untuk menandai pemesanan sebagai selesai
    function blokir(idPemesanan) {
        if (confirm("Anda yakin blokir User ini?")) {
            window.location.href = "blokir_user.php?id=" + idPemesanan;
        }
    }
    </script>
    <script>
    // Fungsi untuk menandai pemesanan sebagai selesai
    function aktifkan(id) {
        if (confirm("Anda yakin aktifkan User ini?")) {
            window.location.href = "aktifkan_user.php?id=" + id;
        }
    }
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