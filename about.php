<?php
    session_start();
    // Koneksi ke database
    require 'conn.php';
    include 'function.php';

    //perintah untuk membaca data di databasenya
    $read_sql = "SELECT * FROM mentor";
    $result = mysqli_query($conn, $read_sql);

    // perintah untuk menampilkan data dari db
    $mentor = [];
    while($row = mysqli_fetch_assoc($result)){
        $mentor[] = $row;
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
                <img src="gambar/ban4.png" alt="banner">
            </div>
            <div class="col-4">
                <h1>About Us</h1>
            </div>
        </div>
    </section>

    <!-- ABOUT US CONTENT -->
    <section class="about-us">
        <div class="row">
            <div class="about-col">
                <h1>Mengejar Mimpi Bersama Ruang IT</h1>
                <p>Ruang IT merupakan platform edukasi programming berbahasa Indonesia yang didirikan pada tahun 2021. Tujuan kami adalah untuk membantu para tenaga IT dalam meningkatkan dan mengembangkan skill IT agar siap bersaing di dunia kerja.</p>
            </div>
            <div class="about-col">
                <img src="gambar/ab.jpg" alt="empat orang sedang diskusi di kantor">
            </div>
        </div>
    </section>

    <!-- OUR TEAM -->
    <section class="container">
        <h1>OUR TEAM</h1>    
        <div class="brs">
            <?php foreach($mentor as $dmen):?>    
            <div class="klm">
                <img src="gambar/<?= $dmen["foto"];?>" alt="member" class="pic">
                <div class="layer-2">
                    <img src="gambar/<?= $dmen["foto"];?>" alt="member">
                </div>
                <div class="info">
                    <h3><?= $dmen["nama_mentor"];?></h3>
                    <h4><?= $dmen["nim"];?></h4>
                    <h4><?= $dmen["profesi"];?></h4>
                </div>
            </div>
            <?php endforeach;?>
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
        function showMenu(){
            navbars.style.right = "0";
        }
        function hideMenu(){
            navbars.style.right = "-200px";
        }
    </script>
</body>
</html>