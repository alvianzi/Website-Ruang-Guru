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
    $read_sql = "SELECT * FROM login WHERE username LIKE '%" . $query . "%' ";
} else {
    $read_sql = "SELECT * FROM login";
}
//sorting
if (isset($_POST['asc'])) {
    $read_sql = "SELECT * FROM login ORDER BY username asc";
    $result =  mysqli_query($conn, $read_sql);
} elseif (isset($_POST['desc'])) {
    $read_sql = "SELECT * FROM login ORDER BY username desc";
    $result = mysqli_query($conn, $read_sql);
} else {
    $default_query = "SELECT * FROM login ";
    $result =  mysqli_query($conn, $read_sql);
}
$result = mysqli_query($conn, $read_sql);

$login = [];
while ($row = mysqli_fetch_assoc($result)) {
    $login[] = $row;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Admin</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="gambar/logo1.png" rel="shorcut icon">
</head>

<body>
    <!-- SIDEBAR ADMIN -->
    <section class="dash">
        <div class="navigation">
            <ul>
                <li class="list ">
                    <a href="dashboard.php">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="tittle">Dashboard</span>
                    </a>
                </li>
                <li class="list active">
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

        <!-- DATA PELANGGAN -->
        <div class="latar">
            <div class="box">
                <div class="tbl-3">
                    <h1>Data Pelanggan ...</h1><br>
                    <form action="" method="POST">
                        <input type="text" name="query" class="input-box" placeholder="Cari data" />
                        <input type="submit" name="cari" class="btn" value="Search" />
                    </form><br>
                    <table class="table">
                        <thead>

                            <th>NO</th>
                            <th>Nama Pelanggan</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>ACTION</th>

                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($login as $user) : ?>
                            <tr>
                                <td data-label="NO"><?= $i; ?></td>
                                <td data-label="Nama Pelanggan"><?= $user["nama"]; ?></td>
                                <td data-label="Username"><?= $user["username"]; ?></td>
                                <td data-label="Email"><?= $user["Email"]; ?></td>
                                <td data-label="ACTION">
                                    <a href="delete.php?id=<?= $user["id"]; ?>"><button class="btn">HAPUS</button></a>

                                </td>
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