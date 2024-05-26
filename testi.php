<?php
    session_start();
    // Koneksi ke database
    require 'conn.php';

    //perintah untuk membaca data di databasenya
    $query = "SELECT * FROM komen";
    $result = mysqli_query($conn, $query);
    
    if(isset($_POST["submit"])){
        $nama_komen = $_POST["nama_orang"];
        $kelas = $_POST["kelas"];
        $rating = $_POST["rating"];
        $teks = $_POST["teks"];

        // Menambahkan data ke tabel komen
        $query = "INSERT INTO komen (nama_orang,kelas,rating,teks) VALUES ('$nama_komen','$kelas','$rating','$teks')";
        
        $result = mysqli_query($conn, $query);
        if($result){
            echo "<script> 
            alert('Berhasil Ditambahkan');
            document.location.href = 'testi.php';
            </script>";
        } 
    }

    // perintah untuk menampilkan data dari db
    $dkomen = [];
    while($row = mysqli_fetch_assoc($result)){
        $dkomen[] = $row;
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
                <img src="gambar/ban1.png" alt="banner">
            </div>
            <div class="col-4">
                <h1>Testimonial</h1>
            </div>
        </div>
    </section>

    <!-- TESTIMONIAL -->
    <section class="testi">
        <h1>Alumni Ruang IT</h1>
        <div class="row">
            <?php foreach($dkomen as $dkom):?>
            <div class="testi-col">
                <span class="ikon-user"><i class="fas fa-user"></i></span>
                <div class="com">
                    <p><?= $dkom['teks'];?></p>
                    <h3><?= $dkom['nama_orang'];?></h3>
                    <h5><?= $dkom['kelas'];?></h5>
                    <div class="rate"><i class="fas fa-star"></i></div>
                    <div class="rate">
                        <h4><?= $dkom['rating'];?></h4>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </section>

    <!-- FORM KOMENTAR -->
    <section class="komen-box">
        <h2>Leave a comment</h2>
        <form action="" method="post">
            <input type="text" name="nama_orang" placeholder="Masukkan Nama" required>
            <label>Kelas</label>
            <select name="kelas" id="kelas">
                <option value="front" required>Front-End Web</option>
                <option value="back" required>Back-End Web</option>
                <option value="ios" required>iOS</option>
            </select><br>
            <label>Rating</label>
            <select name="rating" id="rating">
                <option value="1.1" required>1.1</option>
                <option value="1.2" required>1.2</option>
                <option value="1.3" required>1.3</option>
                <option value="1.4" required>1.4</option>
                <option value="1.5" required>1.5</option>
                <option value="1.6" required>1.6</option>
                <option value="1.7" required>1.7</option>
                <option value="1.8" required>1.8</option>
                <option value="1.9" required>1.9</option>
                <option value="2.0" required>2.0</option>
                <option value="1.1" required>2.1</option>
                <option value="1.2" required>2.2</option>
                <option value="1.3" required>2.3</option>
                <option value="1.4" required>2.4</option>
                <option value="1.5" required>2.5</option>
                <option value="1.6" required>2.6</option>
                <option value="1.7" required>2.7</option>
                <option value="1.8" required>2.8</option>
                <option value="1.9" required>2.9</option>
                <option value="2.0" required>3.0</option>
                <option value="3.1" required>3.1</option>
                <option value="3.2" required>3.2</option>
                <option value="3.3" required>3.3</option>
                <option value="3.4" required>3.4</option>
                <option value="3.5" required>3.5</option>
                <option value="3.6" required>3.6</option>
                <option value="3.7" required>3.7</option>
                <option value="3.8" required>3.8</option>
                <option value="3.9" required>3.9</option>
                <option value="3.0" required>4.0</option>
                <option value="4.1" required>4.1</option>
                <option value="4.2" required>4.2</option>
                <option value="4.3" required>4.3</option>
                <option value="4.4" required>4.4</option>
                <option value="4.5" required>4.5</option>
                <option value="4.6" required>4.6</option>
                <option value="4.7" required>4.7</option>
                <option value="4.8" required>4.8</option>
                <option value="4.9" required>4.9</option>
                <option value="5.0" required>5.0</option>
            </select>
            <textarea name="teks" id="teks" placeholder="Tambahkan Komentar Anda" required></textarea>
            <?php if(!isset($_SESSION['log'])){
                        echo'<a href="login.php" class="btn">POST</a>';
                    }else{
                        echo'<button type="submit" name="submit">POST</button>';
                    }?>

        </form>
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