<!DOCTYPE html>
<html lang="en">

<head>
    <?php
                                            //koneksi
                                            include 'koneksi/koneksi.php';
                                            $no = 1;
                                            $data = mysqli_query($conn, "select * from perusahaan");
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $d['nama_usaha']; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.php"><?php echo $d['nama_usaha']; ?></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto " href="login/index.php">Login</a></li>
            
                    
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->


            <?php
                    $data = mysqli_query($conn, "select * from sosmed");
                     while ($h = mysqli_fetch_array($data)) {
                     ?>
                            
                            <div class="social-links">
                                <a href="<?php echo $h['ig']; ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="<?php echo $h['fb']; ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="<?php echo $h['tiktok']; ?>" class="instagram"><i class="bi bi-instagram"></i></a>

                            </div>
                            <?php
                                            }
                                            ?>


           
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="clearfix">
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center" data-aos="fade-up">
                <div class="col-lg-6 intro-info order-lg-first order-last" data-aos="zoom-in" data-aos-delay="100">
                    <h2>Selamat Datang<br>Di <span><?php echo $d['nama_usaha']; ?></span></h2>
                    <div>
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>

                <div class="col-lg-6 intro-img order-lg-last order-first" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/intro-img.svg" alt="" class="img-fluid">
                </div>
            </div>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row">

                    <div class="col-lg-5 col-md-6">
                        <div class="about-img" data-aos="fade-right" data-aos-delay="100">
                            <img style="max-width: 50%;" src="assets/logo_usaha/<?php echo $d['logo']; ?>" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="about-content" data-aos="fade-left" data-aos-delay="100">
                            <h2>About Us</h2>
                            <h3><?php echo $d['penjelasan']; ?></h3>

                        </div>
                    </div>
                </div>
            </div>

        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Jenis Pelayanan</h3>

                </header>

                <div class="row g-5">


                    <?php
                    $data = mysqli_query($conn, "select * from jenis_pesanan");
                     while ($c = mysqli_fetch_array($data)) {
                     ?>
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class=" box">
                            <div class="icon" style="background: #e1eeff;"><i class="bi bi-brightness-high"
                                    style="color: #2282ff;"></i></div>
                            <h4 class="title"><a href=""><?php echo $c      ['nama']; ?></a></h4>
                            <p class="description"><?php echo $c['keterangan']; ?></p>
                        </div>
                    </div>
                    <?php
                      }
                    ?>

                </div>

            </div>
        </section><!-- End Services Section -->

        

        <!-- ======= Call To Action Section ======= -->
        <section id="call-to-action" class="call-to-action">
            <div class="container" data-aos="zoom-out">
                <div class="row">
                    
                </div>

            </div>
        </section><!--  End Call To Action Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">

            <?php
        $data = mysqli_query($conn, "SELECT * FROM kelebihan_pelayanan");
        $show_left = true; // Variabel untuk mengontrol tampilan di sebelah kiri

        while ($e = mysqli_fetch_array($data)) {
            // Menampilkan data di sebelah kiri atau kanan sesuai variabel show_left
            if ($show_left) {
                ?>

                <div class="row feature-item">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <center><img style="max-width: 50%;" src="assets/fotopelayanan/<?php echo $e['foto']; ?>"
                                class="img-fluid" alt=""></center>
                    </div>
                    <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0" data-aos="fade-left" data-aos-delay="150">
                        <h4><?php echo $e['nama_pelayanan']; ?></h4>
                        <p>
                            <?php echo $e['penjelasaan']; ?>
                        </p>

                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="row feature-item mt-5 pt-5">
                    <div class="col-lg-6 wow fadeInUp order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <center><img style="max-width: 50%;" src="assets/fotopelayanan/<?php echo $e['foto']; ?>"
                                class="img-fluid" alt=""></center>
                    </div>

                    <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-right"
                        data-aos-delay="150">
                        <h4><?php echo $e['nama_pelayanan']; ?>
                        </h4>
                        <p>
                            <?php echo $e['penjelasaan']; ?>
                        </p>

                    </div>

                </div>
                
                <?php
            }

            // Mengganti nilai variabel show_left untuk iterasi berikutnya
            $show_left = !$show_left;
        }
        ?>

            </div>
        </section><!-- End Features Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3 class="section-title">Portfolio </h3>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <?php
                    $data = mysqli_query($conn, "select * from kategori");
                     while ($f = mysqli_fetch_array($data)) {
                     ?>


                            <li data-filter=".katagori-<?php echo $f['nama_katagory']; ?>">
                                <?php echo $f['nama_katagory']; ?></li>

                            <?php
                      }
                    ?>

                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    <?php
                     $query = "SELECT p.id, p.nama, p.tanggal, p.penjelasan, p.foto_1, p.foto_2, p.foto_3, k.nama_katagory 
                     FROM portofolio p 
                     INNER JOIN kategori k ON p.kategory_id = k.id";
           $result = mysqli_query($conn, $query);
                     ?>

                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <div class="col-lg-4 col-md-6 portfolio-item katagori-<?php echo $row['nama_katagory']; ?>">
                        <div class="portfolio-wrap">
                            <img src="assets/foto_portofolio/<?php echo $row['foto_1']; ?>" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.php?id=<?php echo $row['id']; ?>">View</a></h4>
                                <p><?php echo $row['nama']; ?></p>
                                <div>
                                    <a href="assets/foto_portofolio/<?php echo $row['foto_1']; ?>"
                                        data-gallery="portfolioGallery" title="App 1"
                                        class="link-preview portfolio-lightbox"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.php?id=<?php echo $row['id']; ?>" class="link-details"
                                        title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; ?>


                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->
       
        <!-- ======= Clients Section ======= -->
        <!-- <section id="clients" class="clients">
            <div class="container" data-aos="zoom-in">

                <header class="section-header">
                    <h3>Our Clients</h3>
                </header>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section> -->
        <!-- End Clients Section -->

        <!-- End Pricing Section -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="section-bg">
        <div class="footer-top">
            <div class="container">

                <div class="row">

                    <div class="col-lg-6">

                        <div class="row">

                            <div class="col-sm-12">

                                <div class="footer-info">
                                    <h3><?php echo $d['nama_usaha']; ?></h3>
                                    <p><?php echo $d['penjelasan']; ?></p>
                                </div>

                            </div>



                        </div>

                    </div>


                    <div class="col-sm-3">
                        <div class="footer-links">
                            <h4>Jenis Pelayanan</h4>
                            <ul>
                            <?php
                    $data = mysqli_query($conn, "select * from jenis_pesanan");
                     while ($i = mysqli_fetch_array($data)) {
                     ?>
                                <li><a href="#"><?php echo $i['nama']; ?></a></li>
                                
                                <?php
                                            }
                                            ?>
                            </ul>
                        </div>



                    </div>

                    <div class="col-md-3">
                        <div class="col-sm-6">

                        <?php
                    $data = mysqli_query($conn, "select * from sosmed");
                     while ($h = mysqli_fetch_array($data)) {
                     ?>
                            <div class="footer-links">
                                <h4>Contact Us</h4>
                                <p>
                                    <?php echo $d['alamat']; ?> <br>
                                    <strong>Phone:</strong> <?php echo $h['hp']; ?><br>
                                   
                                </p>
                            </div>

                            <div class="social-links">
                                <a href="<?php echo $h['ig']; ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="<?php echo $h['fb']; ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="<?php echo $h['tiktok']; ?>" class="instagram"><i class="bi bi-instagram"></i></a>

                            </div>
                            <?php
                                            }
                                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><?php echo $d['nama_usaha']; ?></strong>. All Rights Reserved

            </div>
    </footer><!-- End  Footer -->
    <?php
                                            }
                                            ?>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>