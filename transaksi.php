<?php
session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Member') {
    } else {
        echo "<script>alert('Anda tidak memiliki Hak Akses !');window.location='index.php';</script>";
    };
} else {
    echo "<script>alert('Anda tidak memiliki Hak Akses !');window.location='index.php';</script>";
};
require 'koneksi.php';
error_reporting(0);
$id = $_GET["id"];

$select_sql = "SELECT * FROM paket WHERE id_paket = '$id'";
$result = mysqli_query($conn, $select_sql);

$paket = [];

while ($row = mysqli_fetch_assoc($result)) {
    $paket[] = $row;
}

$paket = $paket[0];

$username = $_SESSION['username'];

$select_sql = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");
$login = [];
while ($row = mysqli_fetch_assoc($select_sql)) {
    $login[] = $row;
}

if (isset($_POST["Input"])) {
    $nama = htmlspecialchars($_POST["nama"]);
    $email = htmlspecialchars($_POST["email"]);
    $paket = htmlspecialchars($_POST["nama_paket"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $tanggal = htmlspecialchars(date("Y-m-d "));

    $create_sql = "INSERT INTO transaksi VALUES ('','$nama','$email','$paket','$harga','$tanggal')";
    $result = mysqli_query($conn, $create_sql);

    if ($result) {
        echo "<script>
            alert('Transaksi Berhasil!');
            document.location.href = 'hasil.php?nama=$nama&email=$email&paket=$paket&harga=$harga&tanggal=$tanggal';
        </script>";
    } else {
        echo "<script>
            alert('Transaksi gagal!');
            document.location.href = 'transaksi.php';
        </script>";
    }
}
?>

<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Paket</title>
    <link rel="stylesheet" href="style2.css">
    <link href="gambar/logo1.png" rel="shorcut icon">
</head>

<body>
    <!-- FORM TRANSAKSI -->
    <section class="latar-2">
        <div class="container-2">
            <div class="content-2">
                <h1>Transaksi</h1>
                <form action="" method="post" enctype="multipart/form-data">
                   
                <?php foreach ($login as $user) : ?>

                    <div class="inputBox">

                        <p>Nama</p>
                        <input type="text" placeholder="Masukkan Nama Anda" name="nama" readonly
                            value="<?= $user['nama']; ?>">

                    </div>


                    <div class="inputBox">
                        <p>Email</p>
                        <input type="text" placeholder="Masukkan Email Anda" name="email" readonly
                            value="<?= $user['Email']; ?>">
                        </span>
                    </div>
                    <?php endforeach ?>

                    <div class="input-box">
                        <span class="details">Nama Paket</span>
                        <input type="text" placeholder="Masukkan Nama Paket" name="nama_paket" readonly
                            value="<?= $paket["nama_paket"]; ?>"><br><br>
                        <input type="hidden" name="id_paket" value="<?= $paket["id_paket"]; ?>">
                    </div>
                    <div class="input-box">
                        <span class="details">Harga</span>
                        <input type="text" placeholder="Masukkan Harga Paket" name="harga" readonly
                            value="<?= $paket["harga"]; ?>"><br><br>
                        <input type="hidden" name="id_paket" value="<?= $paket["id_paket"]; ?>">
                    </div>
                    <label for="tanggal">Tanggal</label><br>
                    <input type="text" name="tanggal" readonly value="<?=date('l, d-m-Y')?>"><br><br>

                    <div class="button">
                        <input type="submit" value="Konfirmasi" name="Input">
                    </div>
                    <div class="button">
                        <br>
                        <center>
                            <p>Kembali ke Halaman <a href="kursus.php">Paket Kursus</a>
                            <p>
                        </center>
                    </div>

                </form>

                <!-- KODINGAN SEBELUMNYA JGN DIHAPUS BUN -->
                <!-- <form action="" method="post">
                    <label>Nama</label><br>
                    <input type="text" name="nama" id="nama" class="inp-bayar" required><br><br>
                    <label for="email">Email </label><br>
                    <input type="text" name="email" id="email" class="inp-bayar" required><br><br>
                    <label for="paket">Paket</label><br>
                    <input type="radio" name="paket" id="paket" value="Front-End Developer">Front-End
                    Developer Rp. 200.000,00 <br>
                    <input type="radio" name="paket" id="paket" value="iOS Developper">iOS Developer Rp.
                    400.000,00 <br>
                    <input type="radio" name="paket" id="paket" value="Back-End Developer">Back-End Developer Rp.
                    500.000,00<br>
                    <label for="tanggal">Tanggal</label><br>
                    <input type="datetime-local" name="tanggal" id="tanggal"><br>
                    <button class="btn-bayar" type="submit" name="submit">Konfirmasi</button>
                </form> -->
                <button class="btn-bayar-2"><a href="index.php">Home</a></button>
            </div>
        </div>
    </section>


</body>




</html>