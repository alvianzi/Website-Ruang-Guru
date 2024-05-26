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



if (isset($_POST["Input"])) {
    $nama_paket = htmlspecialchars($_POST["nama_paket"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $gambar = htmlspecialchars($_FILES["gambar"]['name']);

    if ($gambar != "") {
        $ektensi_gambar = ['png', 'jpg'];
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $angka_acak = rand(1, 999);
        $gambar_baru = $angka_acak . '-' . $gambar;

        if (in_array($ekstensi, $ektensi_gambar) === true) {
            move_uploaded_file($file_tmp, 'gambar/' . $gambar_baru);

            $query = "INSERT INTO paket (nama_paket, harga,deskripsi, gambar) VALUES ('$nama_paket', '$harga','$deskripsi', '$gambar_baru')";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Query Error : " . mysqli_errno($conn) . " - " . mysqli_error($conn));
            } else {
                echo "<script>alert('Data Berhasil Diinputkan !');window.location='datapaket.php';</script>";
            }
        } else {
            echo "<script>alert('Ekstensi Gambar Hanya Bisa jpg dan png!');window.location='create.php';</script>";
        }
    } else {
        $query = "INSERT INTO paket (nama_paket, harga) VALUES ('$nama_menu', '$harga', '$deskripsideskripsi')";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query Error : " . mysqli_errno($conn) . " - " . mysqli_error($conn));
        } else {
            echo "<script>alert('Data Berhasil Ditambahkan !');window.location='datapaket.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruang IT</title>
    <link rel="stylesheet" href="style2.css">
    <link href="gambar/logo1.png" rel="shorcut icon">
</head>

<body>
    <section class="latar">
        <div class="container">
            <div class="title">Inputkan Data Paket ...</div>
            <div class="content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Nama Paket</span>
                            <input type="text" placeholder="Masukkan Nama Paket" name="nama_paket" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Harga</span>
                            <input type="number" placeholder="Enter your Price" name="harga" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Deskripsi</span>
                            <input type="text" placeholder="Enter your Desk" name="deskripsi" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Image</span>
                            <input type="file" name="gambar" required>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Input Data" name="Input">
                    </div>
                    <div class="button">
                        <input type="reset" value="Reset Data" name="Input">
                        <br>
                        </br>
                        <center>
                            <p>Kembali ke Halaman <a href="datapaket.php">Data Paket </a>
                            <p>
                        </center>
                    </div>

                </form>
            </div>
        </div>
    </section>

</body>

</html>