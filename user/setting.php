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

// Mengambil data user berdasarkan ID login
$id_user = $_SESSION["id"];
$data = mysqli_query($conn, "SELECT * FROM user WHERE id = $id_user");

while ($d = mysqli_fetch_array($data)) {
?>
    <img style="max-width: 30%;" src="../assets/foto_user/<?php echo $d['foto']; ?>" alt="" class="rounded-circle">
    <h2><?php echo $d['nama']; ?></h2>
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

                            <?php
// Pastikan Anda sudah terhubung ke database sebelum mengeksekusi query
include '../koneksi/koneksi.php';

$id_user = $_SESSION["id"]; // Anda harus sesuaikan cara mendapatkan ID user dengan sesi yang digunakan

// Query untuk mengambil data user berdasarkan ID pengguna
$query_user = "SELECT * FROM user WHERE id=$id_user";
$result_user = mysqli_query($conn, $query_user);
$data_user = mysqli_fetch_assoc($result_user);
?>


                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Perusahaan">Edit
                                        Profile </button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                               

                                <div class="tab-pane fade Perusahaan show active " id="Perusahaan">

                                    <!-- Profile Edit Form -->
                                    <form method="post" action="proses_setting.php" enctype="multipart/form-data">



                                        
                                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">


                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
                                                Nama </label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="nama" type="text" class="form-control" id="fullName"
                                                value="<?php echo $data_user["nama"]; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="company" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="username" type="text" class="form-control" id="company"
                                                value="<?php echo $data_user["username"]; ?>" required>
                                                <input type="text" hidden name="password" class="form-control" value="<?php echo $data_user["password"]; ?>" required>
                                            </div>
                                        </div>
                          

                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" name="ttl" value="<?php echo $data_user["ttl"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                            <div class="col-md-8 col-lg-9">
                                            <input type="text" name="alamat" value="<?php echo $data_user["alamat"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">No Hp</label>
                                            <div class="col-md-8 col-lg-9">
                                            <input type="text" name="no_hp" value="<?php echo $data_user["no_hp"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                            <input type="text" name="email" value="<?php echo $data_user["email"]; ?>" required>
                                            </div>
                                        </div>
                                        </div>


                                        <div class="row mb-3">

                                            <label for="profileImage"
                                                class="col-md-4 col-lg-3 col-form-label">Foto</label>

                                            <div class="col-md-8 col-lg-9">

                                                <img style="max-width: 30%;"
                                                    src="../assets/foto_user/<?php echo $data_user["foto"]; ?>" alt="Profile">

                                                <div class="pt-2">
                                                    <input type="file" name="foto">

                                                </div>
                                            </div>
                                        </div>


                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary">simpan</button>
                                        </div>


                                       
                                    </form><!-- End Profile Edit Form -->

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