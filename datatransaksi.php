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
    require 'koneksi.php';
    error_reporting(0);
    //cari
    $query = $_POST['query'];
    if ($query != '') {
        $read_sql = "SELECT * FROM transaksi WHERE nama LIKE '%" . $query . "%' ";
    } else {
        $read_sql = "SELECT * FROM transaksi ";
    }
    //sorting
    if (isset($_POST['asc'])) {
        $read_sql = "SELECT * FROM transaksi  ORDER BY nama asc";
        $result =  mysqli_query($conn, $read_sql);
    } elseif (isset($_POST['desc'])) {
        $read_sql = "SELECT * FROM transaksi  ORDER BY nama desc";
        $result = mysqli_query($conn, $read_sql);
    } else {
        $default_query = "SELECT * FROM transaksi ";
        $result =  mysqli_query($conn, $read_sql);
    }
    $result = mysqli_query($conn, $read_sql);

    $transaksi = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $transaksi[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruang IT</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="gambar/logo1.png" rel="shorcut icon">


</head>

<body>
    <!-- SIDEBAR ADMIN -->
    <section class="dash">
        <div class="navigation">
            <ul>
                <li class="list">
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
                <li class="list active">
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

        <!-- DATA TRANSAKSI -->
        <div class="latar">
            <div class="box">
                <div class="tbl">
                    <h1>Data Transaksi ...</h1><br>
                    <form action="" method="POST">
                        <input type="text" name="query" class="input-box" placeholder="Cari data" />
                        <input type="submit" name="cari" class="btn" value="Search" />

                    </form><br>

                    <table class="table">
                        <thead>

                            <th>NO</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Paket</th>
                            <th>Tanggal</th>


                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($transaksi as $dbtransaksi) : ?>
                            <tr>
                                <td data-label="NO"><?= $i; ?></td>
                                <td data-label="Nama"><?= $dbtransaksi["nama"]; ?></td>
                                <td data-tabel="Email"><?= $dbtransaksi["email"]; ?></td>
                                <td data-label="Paket"> <?= $dbtransaksi["paket"]; ?></td>
                                <td data-label="Tanggal"><?= $dbtransaksi["tanggal"]; ?></td>


                            </tr>

                            <?php $i++; ?>
                            <?php endforeach; ?>
                    </table>

                    <form action="" method="POST">
                        <input type="submit" name="asc" class="btn" value="Ascending" />
                        <input type="submit" name="desc" class="btn" value="Descending" />
                    </form>
                </div>
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