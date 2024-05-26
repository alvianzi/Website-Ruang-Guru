<?php
    session_start();
    // Koneksi ke database
    require 'conn.php';
    include 'function.php';

    //perintah untuk membaca data di databasenya
    $read_sql = "SELECT * FROM paket";
    $result = mysqli_query($conn, $read_sql);

    // perintah untuk menampilkan data dari db
    $dpaket = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $dpaket[] = $row;
    }
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
    <section class="sub-header">

        <nav>
            <!-- untuk logonya -->
            <h1><a href="index.php">RUANG IT</a></h1>

            <!-- untuk navigasi bar -->
            <div class="navbar" id="navbars">
                <!-- untuk masukin ikon close (aktif ketika layar mengecil) -->
                <i class="fas fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="kursus.php">Kursus Online</a></li>
                    <li><a href="testi.php">Testimonial</a></li>
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

        <div class="rows">
            <div class="col-3">
                <img src="gambar/ban2.png" alt="banner">
            </div>
            <div class="col-4">
                <h1>Paket Kursus</h1>
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
        <div class="container-empat">
            <?php foreach ($dpaket as $dpak) : ?>
            <div class="card">
                <div class="head"><img src="gambar/<?= $dpak["gambar"]; ?>" alt="banner"></div>
                <div class="content">
                    <h3><?= $dpak["nama_paket"]; ?></h3>
                    <p><?= $dpak["deskripsi"]; ?></p>
                    <h3><?= buatRp($dpak['harga']); ?></h3>
                    <br>
                    <a href="transaksi.php" class="btn-2">Berlangganan Sekarang</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- FOOTER -->
    <section class="footer">
        <hr>
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