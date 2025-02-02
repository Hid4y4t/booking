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
            <h1>Pelayanan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Pelayanan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">




                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Waktu Pelayanan <button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#verticalycentered"><i
                                        class="bi bi-plus-circle me-1"></i> Tambah Waktu</button></h5>

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">JAM</th>
                                        <th scope="col">Ketersedian</th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            //koneksi
                                            include '../koneksi/koneksi.php';
                                            $no = 1;
                                            $data = mysqli_query($conn, "select * from jadwal");
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo $d['tanggal']; ?></td>
                                        <td><?php echo $d['jam']; ?></td>
                                        <td><?php echo $d['tersedia']; ?></td>
                                        <td>

                                            <button class="btn bg-danger"
                                                onclick="hapuspelayanan('<?php echo $d['id']; ?>')"><i
                                                    class="bi bi-x"></i></button>
                                        </td>

                                    </tr>

                                    <?php
                                            }
                                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="verticalycentered" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Waktu Pelayanan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>



                            <div class="modal-body">
                                <form action="tambah_waktu.php" method="post">

                                    <div class="row mb-3">
                                        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="tanggal" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputTime" class="col-sm-2 col-form-label">Time</label>
                                        <div class="col-sm-10">
                                            <input type="time" name="jam" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">

                                        <div class="col-sm-10">
                                            <input type="text" hidden name="tersedia" class="form-control" value="0">
                                        </div>
                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jenis Pelayanan <button data-bs-toggle="modal"
                                    data-bs-target="#jenis_pelayanan" type="button" class="btn btn-primary"><i
                                        class="bi bi-plus-circle me-1"></i> Tambah Pelayanan</button></h5>

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Harga</th>

                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                            //koneksi
                                            include '../koneksi/koneksi.php';
                                            $no = 1;
                                            $data = mysqli_query($conn, "select * from jenis_pesanan");
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++ ?></th>
                                        <td><?php echo $d['nama']; ?></td>

                                        <td><?php  
                                        $harga = $d['harga'];

                                        // Format mata uang dengan tanda titik dan koma sebagai pemisah ribuan
                                        $hargaFormatted = number_format($harga, 2, ',', '.');
                                        
                                        echo "Rp" . $hargaFormatted;
                                        ?></td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#jenis_lihat<?php echo $d['id']; ?>"
                                                class="btn btn-success"><i class="bi bi-eye-fill"></i>
                                            </button> |


                                            <button class="btn bg-danger"
                                                onclick="hapusjenis('<?php echo $d['id']; ?>')"><i class="bi bi-x"></i>
                                            </button>
                                        </td>

                                    </tr>
 
                                    <div class="modal fade" id="jenis_lihat<?php echo $d['id']; ?>" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>



                                                <div class="modal-body">

                                                    <b>Nama :</b> <?php echo $d['nama']; ?><br>
                                                    <b>Harga :</b> <?php  
                                        $harga = $d['harga'];

                                        // Format mata uang dengan tanda titik dan koma sebagai pemisah ribuan
                                        $hargaFormatted = number_format($harga, 2, ',', '.');
                                        
                                        echo "Rp" . $hargaFormatted;
                                        ?><br>
                                                    <b>Keterangan :</b> <?php echo $d['keterangan']; ?><br>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                            }
                                            ?>

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

                <div class="modal fade" id="jenis_pelayanan" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Jenis Pelayanan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>



                            <div class="modal-body">
                                <form action="tambah_jenis_pelayanan.php" method="post">

                                    <div class="row mb-3">
                                        <label for="inputDate" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputTime" class="col-sm-2 col-form-label">Harga</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="harga" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputTime" class="col-sm-2 col-form-label">Keterangan</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="keterangan"
                                                style="height: 100px"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>

                                </form>
                            </div>

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
    function hapuspelayanan(id) {
        if (confirm("Anda yakin pemesanan ini sudah selesai?")) {
            window.location.href = "hapus_waktu_pelayanan.php?id=" + id;
        }
    }

    // Fungsi untuk menandai pemesanan sebagai selesai
    function hapusjenis(id) {
        if (confirm("Anda yakin pemesanan ini sudah selesai?")) {
            window.location.href = "hapus_jenis_pelayanan.php?id=" + id;
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