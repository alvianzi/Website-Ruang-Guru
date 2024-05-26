<?php
    session_start();
    require 'koneksi.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RUANG IT</title>

    <!-- untuk sambung ke css -->
    <link rel="stylesheet" href="style1.css">

    <!-- untuk akses ikon di font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="gambar/logo1.png" rel="shorcut icon">
</head>

<body>
    <!-- HEADER -->
    <section class="header">
        <nav>
            <!-- untuk logonya -->
            <h1><a href="index.php">SMART FARM</a></h1>

            <!-- untuk navigasi bar -->
            <div class="navbar" id="navbars">
                <!-- untuk masukin ikon close (aktif ketika layar mengecil) -->
                <i class="fas fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="kursus.php">Suhu dan Kelembaban</a></li>
                    <li><a href="testi.php">Amonia</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><?php if (!isset($_SESSION['log'])) {
                            echo '
                            <li class="btn"><a href="login.php">Masuk/Daftar</a></li>
                            ';
                        } else {

                            if ($_SESSION['role'] == 'Member') {
                                echo '
                                
                    <li class="btn"><a href="profile.php">Halo, </a> ' . $_SESSION["nama"] . '
                    <li><a href="logout.php">Keluar?</a></li>
                    ';
                            }
                            if ($_SESSION['role'] == 'Admin') {

                                header('location:dashboard.php');
                            }
                        };

                        ?></li>
                </ul>

            </div>

            <!-- untuk masukin icon menu navbar -->
            <i class="fas fa-bars" onclick="showMenu()"></i>
        </nav>

        <div class="row">
            <div class="col-1">
                <img src="gambar/el.png" alt="element" class="elemen">
                <img src="gambar/ban3.png" alt="banner">

            </div>
            <div class="col-2">
                <h1>Website Monitoring <br> Monitoring <span>SMART FARM LADAYA</span> </h1>
                <p>Website ini sebagai sistem monitoring untuk menjaga dan memelihara kandang Ayam agar tetap terjaga,
                    Ayam Sehat Perternak Senang.
                </p>
                <a href="transaksi.php" class="btn">Belajar Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Why -->
    <section class="why">
        <h1>Kenapa belajar coding di Ruang IT?</h1>

        <div class="row">
            <div class="why-col">
                <i class="fas fa-sort-alpha-down-alt"></i>
                <h3>Alur Belajar Terarah</h3>
            </div>
            <div class="why-col">
                <i class="fas fa-calendar-check"></i>
                <h3>Waktu Belajar Flexsibel</h3>
            </div>
            <div class="why-col">
                <i class="fas fa-comments"></i>
                <h3>Forum Diskusi</h3>
            </div>
            <div class="why-col">
                <i class="fas fa-user-tie"></i>
                <h3>Mentor Berpengalaman</h3>
            </div>
            <div class="why-col">
                <i class="fas fa-money-bill"></i>
                <h3>Garansi Uang Kembali</h3>
            </div>
            <div class="why-col">
                <i class="fas fa-globe"></i>
                <h3>Kurikulum Standar <br> Industri Global</h3>
            </div>
        </div>
    </section>

    <!-- Course -->
    <section class="course">
        <h1>Paket Kursus</h1>
        <div class="row">
            <div class="course-col">
                <img src="gambar/frontend.jpg">
                <div class="layer">
                    <h3><a href="kursus.php">Front-End Web Developer</a></h3>
                </div>
            </div>
            <div class="course-col">
                <img src="gambar/back.jpg">
                <div class="layer">
                    <h3><a href="kursus.php">Back-End Web Developer</a></h3>
                </div>
            </div>
            <div class="course-col">
                <img src="gambar/ios.jpg">
                <div class="layer">
                    <h3><a href="kursus.php">iOS Developer</a></h3>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIAL -->
    <section class="testi">
        <h1>Alumni Ruang IT</h1>
        <div class="row">
            <div class="testi-col">
                <span class="ikon-user"><i class="fas fa-user-circle"></i></i></span>
                <div class="com">
                    <p>Banyak insight baru saat proses belajar. Penjelasan yang simple tapi terstruktur, mulai dari yang
                        mudah sampai bagian tersulit, telah diuraikan dengan baik. Belajar jadi terasa menantang namun
                        tetap menyenangkan.</p>
                    <h3>Irene</h3>
                    <h5>Back-end Web Developer</h5>
                    <div class="rate"><i class="fas fa-star"></i></div>
                    <div class="rate">
                        <h4>4.5</h4>
                    </div>
                </div>
            </div>
            <div class="testi-col">
                <span class="ikon-user"><i class="fas fa-user-circle"></i></span>
                <div class="com">
                    <p>Materinya cukup lengkap. Penjelasannya juga mudah dimengerti. Belajar jadi lebih menyenangkan dan
                        tidak membosankan. Cocok untuk pemula seperti saya.</p>
                    <h3>Andrew Matt</h3>
                    <h5>iOS Developer</h5>
                    <div class="rate"><i class="fas fa-star"></i></div>
                    <div class="rate">
                        <h4>4.7</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta">
        <h1>Persiapkan Suksesmu Hari Ini</h1>
        <a href="transaksi.php" class="hero-btn">Daftar Sekarang</a>
    </section>

    <!-- FOOTER -->
    <section class="footer">
        <p><i class="far fa-copyright"></i>2021. Ruang IT</p>
    </section>

    <!-- JS toggle menu -->
    <script>
    var navbars = document.getElementById("navbars");

    function showMenu() {
        navbars.style.right = "0";
    }

    function hideMenu() {
        navbars.style.right = "-200px";
    }
    </script>
</body>

</html>