<?php
session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Admin'){
    }else{
        echo "<script>alert('Anda tidak memiliki Hak Akses !');window.location='index.php';</script>"; 
    }
    ;

} else {
    echo "<script>alert('Anda tidak memiliki Hak Akses !');window.location='index.php';</script>";
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RUANG IT</title>
    <!-- untuk sambung ke css -->
    <link rel="stylesheet" href="style2.css">

    <!-- untuk akses ikon di font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="gambar/logo1.png" rel="shorcut icon">
</head>

<body>
    <!-- Halaman utama -->
    <section class="dash">
        <div class="navigation">
            <ul>
                <li class="list active">
                    <a href="dashboard.php">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="tittle">Dashboard</span>
                    </a>
                </li>
                <li class="list">
                    <a href="datapelanggan.php">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <span class="tittle">Data Pelanggan</span>
                    </a>
                </li>
                <li class="list">
                    <a href="datatransaksi.php">
                        <span class="icon"><i class="fas fa-money-check"></i></span>
                        <span class="tittle">Data Transaksi</span>
                    </a>
                </li>
                <li class="list">
                    <a href="datapaket.php">
                        <span class="icon"><i class="fas fa-file"></i></i></span>
                        <span class="tittle">Data Paket</span>
                    </a>
                </li>
                <li class="list">
                    <a href="logout.php">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="tittle">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="helo">
            <div class="kol-2">
                <h2>Selamat Datang <br> Di <span>Ruang IT</span></h2>
                <h4>Anda Login Sebagai Admin</h4>
            </div>
            <div class="kol-1">
                <img src="gambar/ban6.png" alt="banner">
            </div>

        </div>
    </section>

    <!-- JS toggle menu -->
    <script>
    // untuk menandakan pilihan navbar yg aktif
    const list = document.querySelectorAll('.list');

    function activeLink() {
        list.forEach((item) =>
            item.classList.remove('active'));
        this.classList.add('active');
    }
    list.forEach((item) =>
        item.addEventListener('click', activeLink));
    </script>
</body>

</html>