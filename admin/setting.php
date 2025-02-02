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
                    <li class="breadcrumb-item active">Setting</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <?php
                                            //koneksi
                                            include '../koneksi/koneksi.php';
                                            $no = 1;
                                            $data = mysqli_query($conn, "select * from perusahaan");
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
                            <img style="max-width: 30%;" src="../assets/logo_usaha/<?php echo $d['logo']; ?>"
                                alt="Profile" class="rounded-circle">
                            <h2><?php echo $d['nama_usaha']; ?></h2>
                            <?php
                                            }
                                            ?>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#Pelayanan">keterangan Pelayanan</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Perusahaan">Edit
                                        Profile Perusahaan</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#Sosmed">Sosmed</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#portofolio">Portofolio</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active Pelayanan" id="Pelayanan">
                                    <h5 class="card-title">Tambah Pelayanan <button data-bs-toggle="modal"
                                            data-bs-target="#tambah_pelayanan" type="button" class="btn btn-primary"><i
                                                class="bi bi-plus-circle me-1"></i> Tambah Pelayanan</button>
                                    </h5>


                                    <div class="modal fade" id="tambah_pelayanan" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Jenis Pelayanan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="simpan_pelayanan.php"
                                                        enctype="multipart/form-data">
                                                        <div class="row mb-3">
                                                            <label for="inputDate"
                                                                class="col-sm-2 col-form-label">Nama</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="nama" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="inputTime"
                                                                class="col-sm-2 col-form-label">Penjelasan</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="penjelasan"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="inputTime"
                                                                class="col-sm-2 col-form-label">foto</label>
                                                            <div class="col-sm-10">
                                                                <input type="file" id="foto" name="foto">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">

                                                            <div class="col-sm-12">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card top-selling overflow-auto">
                                            <div class="card-body pb-0">
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">foto</th>
                                                            <th scope="col">nama</th>
                                                            <th scope="col">Opsi</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                            //koneksi
                                            include '../koneksi/koneksi.php';
                                            $no = 1;
                                            $data = mysqli_query($conn, "select * from kelebihan_pelayanan");
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                                        <tr>
                                                        <tr>
                                                            <th scope="row"><a href="#"><img
                                                                        src="../assets/fotopelayanan/<?php echo $d['foto']; ?>"
                                                                        alt=""></a></th>
                                                            <td><a href="#"
                                                                    class="text-primary fw-bold"><?php echo $d['nama_pelayanan']; ?></a>
                                                            </td>
                                                            <td>
                                                            <td>
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#jenis_lihat<?php echo $d['id']; ?>"
                                                                    class="btn btn-success"><i
                                                                        class="bi bi-eye-fill"></i>
                                                                </button> |
                                                                <button class="btn bg-danger"
                                                                    onclick="hapusjenis('<?php echo $d['id']; ?>')"><i
                                                                        class="bi bi-x"></i>
                                                                </button>
                                                            </td>
                                                            </td>

                                                        </tr>
                                                        <div class="modal fade" id="jenis_lihat<?php echo $d['id']; ?>"
                                                            tabindex="-1">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">

                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <b>Nama :</b>
                                                                        <?php echo $d['nama_pelayanan']; ?><br>
                                                                        <b>Penjelasan :</b>
                                                                        <?php echo $d['penjelasaan']; ?>
                                                                        <br>
                                                                        <br><br>
                                                                        <img src="../assets/fotopelayanan/<?php echo $d['foto']; ?>"
                                                                            alt=""><br>

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
                                </div>

                                <div class="tab-pane fade Perusahaant pt-3" id="Perusahaan">

                                    <!-- Profile Edit Form -->
                                    <form method="post" action="edit_perusahaan.php" enctype="multipart/form-data">



                                        <?php
                                            //koneksi
                                            include '../koneksi/koneksi.php';
                                            $no = 1;
                                            $data = mysqli_query($conn, "select * from perusahaan");
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">


                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
                                                Nama Usaha</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="nama_usaha" type="text" class="form-control" id="fullName"
                                                    value="<?php echo $d['nama_usaha']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="company" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="alamat" type="text" class="form-control" id="company"
                                                    value="<?php echo $d['alamat']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">Penjelasan
                                                Usaha</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="penjelasan" class="form-control" id="about"
                                                    style="height: 100px"><?php echo $d['penjelasan']; ?></textarea>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">Visi</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="visi" class="form-control" id="about"
                                                    style="height: 100px"><?php echo $d['visi']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">Misi</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="misi" class="form-control" id="about"
                                                    style="height: 100px"><?php echo $d['misi']; ?></textarea>
                                            </div>
                                        </div>


                                        <div class="row mb-3">

                                            <label for="profileImage"
                                                class="col-md-4 col-lg-3 col-form-label">Logo</label>

                                            <div class="col-md-8 col-lg-9">

                                                <img style="max-width: 30%;"
                                                    src="../assets/logo_usaha/<?php echo $d['logo']; ?>" alt="Profile">

                                                <div class="pt-2">
                                                    <input type="file" name="logo" id="">

                                                </div>
                                            </div>
                                        </div>


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">simpan</button>
                                        </div>


                                        <?php
                                            }
                                            ?>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="Sosmed">
                                    <?php
                                            //koneksi
                                            include '../koneksi/koneksi.php';
                                            $no = 1;
                                            $data = mysqli_query($conn, "select * from sosmed");
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                    <!-- Settings Form -->
                                    <form method="post" action="edit_sosemed.php">

                                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">

                                        <div class="row mb-3">
                                            <label for="Email"
                                                class="col-md-4 col-lg-3 col-form-label">Instagram</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="ig" type="text" class="form-control" id="ig"
                                                    value="<?php echo $d['ig']; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                                Facebook</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fb" type="text" class="form-control" id="fb"
                                                    value="<?php echo $d['fb']; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="tiktok" type="text" class="form-control" id="Facebook"
                                                    value="<?php echo $d['tiktok']; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Whatsapp
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="hp" type="text" class="form-control" id="Instagram"
                                                    value="<?php echo $d['hp']; ?>">
                                            </div>
                                        </div>



                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End settings Form -->
                                    <?php
                                            }
                                            ?>
                                </div>

                                <div class="tab-pane fade pt-3" id="portofolio">


                                    <!-- Default Table -->
                                    <table class="table">
                                        <button data-bs-toggle="modal" data-bs-target="#tambah_katagori" type="button"
                                            class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i>Katagori
                                        </button>

                                        <div class="modal fade" id="tambah_katagori" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah Katagori</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="simpan_katagori.php"
                                                            enctype="multipart/form-data">
                                                            <div class="row mb-3">
                                                                <label for="inputDate"
                                                                    class="col-sm-2 col-form-label">Nama</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="nama_katagory"
                                                                        class="form-control">
                                                                </div>
                                                            </div>


                                                            <div class="row mb-3">

                                                                <div class="col-sm-12">
                                                                    <button type="submit" name="submit"
                                                                        class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Katagori</th>
                                                <th></th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            //koneksi
                                            include '../koneksi/koneksi.php';
                                            $no = 1;
                                            $data = mysqli_query($conn, "select * from kategori");
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $no++; ?></th>
                                                <td><?php echo $d['nama_katagory']; ?></td>
                                                <td><button class="btn bg-danger"
                                                        onclick="hapuskatagori('<?php echo $d['id']; ?>')"><i
                                                            class="bi bi-x"></i>
                                                    </button></td>

                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                    <!-- End Default Table Example -->

                                    <br>
                                    Portofolio
                                    <hr>
                                    <div class="modal fade" id="tambah_portofolio" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah Portofolio</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <?php
                                                    // Pastikan Anda sudah terhubung ke database sebelum mengeksekusi query
                                                    include '../koneksi/koneksi.php';

                                                    if (isset($_POST["submit"])) {
                                                        // Ambil data dari form
                                                        $kategory_id = $_POST["kategory_id"];
                                                        $nama = $_POST["nama"];
                                                        $tanggal = $_POST["tanggal"];
                                                        $penjelasan = $_POST["penjelasan"];

                                                        // Proses penyimpanan data ke dalam tabel portofolio
                                                        $query = "INSERT INTO portofolio (kategory_id, nama, tanggal, penjelasan) VALUES ('$kategory_id', '$nama', '$tanggal', '$penjelasan')";
                                                        $result = mysqli_query($conn, $query);

                                                        if ($result) {
                                                            $portofolio_id = mysqli_insert_id($conn); // Mendapatkan ID portofolio yang baru saja ditambahkan

                                                            // Proses penyimpanan foto-foto ke folder dengan nama unik
                                                            $foto_extensions = array("jpg", "jpeg", "png", "gif");
                                                            for ($i = 1; $i <= 3; $i++) {
                                                                if (!empty($_FILES["foto_$i"]["name"])) {
                                                                    $foto_name = $_FILES["foto_$i"]["name"];
                                                                    $foto_tmp = $_FILES["foto_$i"]["tmp_name"];
                                                                    $extension = strtolower(pathinfo($foto_name, PATHINFO_EXTENSION));

                                                                    // Membuat nama unik dengan format portofolio_id_nomor_unik.extension
                                                                    $unique_name = $portofolio_id . "_" . uniqid() . "." . $extension;

                                                                    if (in_array($extension, $foto_extensions)) {
                                                                        move_uploaded_file($foto_tmp, "../assets/foto_portofolio/" . $unique_name);
                                                                        $query_update_foto = "UPDATE portofolio SET foto_$i='$unique_name' WHERE id=$portofolio_id";
                                                                        mysqli_query($conn, $query_update_foto);
                                                                    }
                                                                }
                                                            }

                                                            echo "Portofolio berhasil ditambahkan!";
                                                        } else {
                                                            echo "Gagal menambahkan portofolio: " . mysqli_error($conn);
                                                        }
                                                    }

                                                    // Query untuk mendapatkan daftar kategori
                                                    $query_kategori = "SELECT * FROM kategori";
                                                    $result_kategori = mysqli_query($conn, $query_kategori);
                                                    ?>



                                                    <div class="modal-body">
                                                        <form action="setting.php" method="post"
                                                            enctype="multipart/form-data">


                                                            <table>
                                                                <tr>
                                                                    <td><label for="kategory_id">Kategori</label></td>
                                                                    <td><select name="kategory_id" required>
                                                                            <?php while ($row_kategori = mysqli_fetch_assoc($result_kategori)) : ?>
                                                                            <option
                                                                                value="<?php echo $row_kategori['id']; ?>">
                                                                                <?php echo $row_kategori['nama_katagory']; ?>
                                                                            </option>
                                                                            <?php endwhile; ?>
                                                                        </select></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><label for="nama">Nama:</label></td>
                                                                    <td><input type="text" name="nama" required></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><label for="tanggal">Tanggal</label></td>
                                                                    <td> <input type="date" name="tanggal" required>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label for="penjelasan">Penjelasan</label></td>
                                                                    <td><textarea name="penjelasan" rows="4"
                                                                            required></textarea></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><label for="foto_1">Foto 1:</label></td>
                                                                    <td><input type="file" name="foto_1"><br></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label for="foto_1">Foto 2:</label></td>
                                                                    <td><input type="file" name="foto_2"><br></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label for="foto_1">Foto 3:</label></td>
                                                                    <td><input type="file" name="foto_3"><br></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="submit" name="submit"
                                                                    value="Tambah Portofolio"></td>
                                                                </tr>
                                                            </table>


                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <table class="table table-borderless">
                                        <!-- tambah portofolio -->
                                        <button data-bs-toggle="modal" data-bs-target="#tambah_portofolio" type="button"
                                            class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i>Portofolio
                                        </button>

                                       
                                    
                                        <!-- end portofolio -->
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <center>foto</center>
                                                </th>
                                                <th scope="col">nama</th>

                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //koneksi
                                            include '../koneksi/koneksi.php';
                                            $no = 1;
                                            $data = mysqli_query($conn, "select * from portofolio");
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <center><img style="max-width: 30%;"
                                                            src="../assets/foto_portofolio/<?php echo $d['foto_1']; ?>"
                                                            alt=""></center>
                                                </td>
                                                <td><?php echo $d['nama']; ?></td>

                                                <td><button class="btn bg-danger"
                                                        onclick="hapusportofolio('<?php echo $d['id']; ?>')"><i
                                                            class="bi bi-x"></i>
                                                    </button></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>

                                </div>

                            </div><!-- End Bordered Tabs -->

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
    function hapusjenis(id) {
        if (confirm("Anda yakin menghapus ini")) {
            window.location.href = "hapus_pelayanan.php?id=" + id;
        }
    }

    // Fungsi untuk menandai pemesanan sebagai selesai
    function hapussosmed(id) {
        if (confirm("Anda yakin menghapus ini?")) {
            window.location.href = "hapus_jenis_pelayanan.php?id=" + id;
        }
    }

    function hapuskatagori(id) {
        if (confirm("Anda yakin katagori ini?")) {
            window.location.href = "hapuskatagori.php?id=" + id;
        }
    }

    function hapusportofolio(id) {
        if (confirm("Anda yakin menghapus ini?")) {
            window.location.href = "hapus_portofolio.php?id=" + id;
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