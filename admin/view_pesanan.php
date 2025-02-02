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
                     <li class="breadcrumb-item"><a href="pesanan.php">pesanan</a></li>
                     <li class="breadcrumb-item active">Detail Pesanan</li>
                 </ol>
             </nav>
         </div><!-- End Page Title -->

         <section class="section dashboard">
             <div class="row">

                 <div class="col-xl-4">


                     <div class="card">
                         <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                             <?php

                            include "../koneksi/koneksi.php";
                            // Mendapatkan ID pemesanan yang dipilih dari formulir
                            $id_user = $_GET['id'];

                            // Menjalankan query untuk mendapatkan data pemesanan dan profil pengguna
                            $query = "SELECT p.*, u.* FROM pemesanan AS p JOIN user AS u ON p.id_user = u.id WHERE p.id = '$id_user'";
                            $result = mysqli_query($conn, $query);

                            // Memeriksa apakah query berhasil dijalankan
                            if (!$result) {
                            echo "Error: " . mysqli_error($conn);
                            exit();
                            }

                            // Menampilkan data
                            $row = mysqli_fetch_assoc($result);

                            // Menampilkan detail pemesanan
                            echo "<img style='max-width: 50%;' src=../assets/foto_user/". $row['foto']." alt='Profile'". "class='rounded-circle'>";

                            echo "<h3>" . $row['nama'] . "</h3>";
                            echo "<h5>" . $row['ttl'] . "</h5>";
                            echo "<h5>" . $row['alamat'] . "</h5>";
                            // Menutup koneksi
                            mysqli_close($conn);
                            ?>

                         </div>
                     </div>

                 

                 </div>


                 <div class="col-xl-8">
                     <div class="card">
                         <div class="card-body pt-3">
                             <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                 <?php
                        if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        }
                        include "../koneksi/koneksi.php";
                        $data = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id='$id'");
                        $d = mysqli_fetch_array($data); {
                        ?>

                                 <h5 class="card-title">Detail Pesanan</h5>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label ">Nama</div>
                                     <div class="col-lg-9 col-md-8">: <?php echo $d['nama'];?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Tanggal</div>
                                     <div class="col-lg-9 col-md-8">: <?php echo $d['tanggal'];?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Jam Booking</div>
                                     <div class="col-lg-9 col-md-8">: <?php echo $d['jam'];?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Booking</div>
                                     <div class="col-lg-9 col-md-8">: <?php echo $d['jenis_pesanan'];?></div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-4 label">Harga</div>
                                     <div class="col-lg-9 col-md-8">:Rp <?php echo $d['harga'];?></div>
                                 </div>


                                 <h5 class="card-title">KETERANGAN</h5>
                                 <p class="small fst-italic"><?php echo $d['keterangan'];?></p>


                                 <?php
                                if ($d['status_booking'] == 'Selesai') {
                                    echo "Selesai ";
                                    echo "<button onclick='printNota(" . $d['id'] . ")'>Print Nota</button>";
                                } else {
                                    echo "<button class='btn btn-info btn-sm' onclick='selesaiPemesanan(" . $d['id'] . ")'>Tandai Pesanan Sudah Selesai</button>";
                                }
                                ?>


                             </div>
                         </div>
                     </div>
                 </div>

                 <?php
                }
                ?>

             </div>




         </section>

     </main><!-- End #main -->

     <!-- ======= Footer ======= -->
     <?php include 'root/footer.php'; ?>

     <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
             class="bi bi-arrow-up-short"></i></a>
     <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
             class="bi bi-arrow-up-short"></i></a>

     <script>
     // Fungsi untuk menandai pemesanan sebagai selesai
     function selesaiPemesanan(idPemesanan) {
         if (confirm("Anda yakin pemesanan ini sudah selesai?")) {
             window.location.href = "selesai_pemesanan.php?id=" + idPemesanan;
         }
     }
     </script>


     <script>
     // Fungsi untuk mencetak nota pemesanan
     function printNota(idPemesanan) {
         if (confirm("Anda yakin ingin mencetak nota pemesanan?")) {
             window.open("cetak_struk.php?id=" + idPemesanan, "_blank");
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