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
            <h1>pesanan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Pesanan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Rpesanan belum baca -->
                <div class="col-12">

                    <div class="card recent-sales overflow-auto">



                        <div class="card-body">
                            <h5 class="card-title">Pesanan Belum di Baca</h5>
                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">ID Pesanan</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Jam</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    // Koneksi ke database
                    include '../koneksi/koneksi.php';

                    // Ambil pesanan yang belum dibaca
                    $query = "SELECT * FROM pemesanan WHERE status='belum dibaca'";
                    $result = mysqli_query($conn, $query);

                    // Tampilkan pesanan yang belum dibaca
                    if (mysqli_num_rows($result) > 0) {
                       
                       

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['nama'] . "</td>";
                            echo "<td>" . $row['tanggal'] . "</td>";
                            echo "<td>" . $row['jam'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                       
                            echo "<td>". "<a href='view_pesanan.php?id=".  $row['id']."'>"." <button type='button' class='btn btn-primary'>
                            <i class='bi bi-eye'></i>
                        </button></a>";
                            echo "</tr>";

                            
                        }

                    
                    } else {
                        echo "Tidak ada pesanan yang belum di lihat.";
                    }

                    // Tutup koneksi database
                    mysqli_close($conn);
                    ?>

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End belum baca -->

                <!-- Top Selling -->
                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">



                        <div class="card-body">
                            <h5 class="card-title">Data <span>| Booking</span></h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">ID Pesanan</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Jam</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                            //koneksi
                                            include '../koneksi/koneksi.php';
                                            $no = 1;
                                            $data = mysqli_query($conn, "select * from pemesanan");
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                    <tr>
                                        <th scope="row"><a href="#"><?php echo $d['id']; ?></a></th>
                                        <td><?php echo $d['nama']; ?></td>
                                        <td><a href="#" class="text-primary"><?php echo $d['tanggal']; ?></a></td>
                                        <td><?php echo $d['jam']; ?></td>
                                        
                                        <td> 
                                            <a href="view_pesanan.php?id=<?php echo $d['id']; ?>"> <button type="button" class="btn btn-primary">
                                                <i class="bi bi-eye"></i>
                                            </button></a>
                                             
                                           

                                            <button class="btn bg-danger" onclick="hapusPesanan('<?php echo $d['id']; ?>')"><i class="ri-delete-bin-2-fill"></i></button>

                                            
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
                </div><!-- End Recent Sales -->
            </div>




        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include 'root/footer.php'; ?>

    <script>
        // Fungsi untuk menandai pemesanan sebagai selesai
        function hapusPesanan(idpemesanan) {
            if (confirm("Anda yakin pemesanan ini sudah selesai?")) {
                window.location.href = "hapus_pesanan.php?id=" + idpemesanan;
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