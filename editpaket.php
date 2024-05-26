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

$id = $_GET["id"];
var_dump($id);

$select_sql = "SELECT * FROM paket WHERE id = $id";
$result = mysqli_query($conn, $select_sql);

$paket = [];

while ($row = mysqli_fetch_assoc($result)) {
    $paket[] = $row;
}
$paket = $paket[0];

if (isset($_POST["Input"])) {
    $id = $_POST['id'];
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

            $query = "UPDATE paket SET nama_paket = '$nama_paket',deskripsi = '$deskripsi',harga = '$harga',gambar = '$gambar_baru' ";
            $query .= "WHERE id = '$id'";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Query Error : " . mysqli_errno($conn) . " - " . mysqli_error($conn));
            } else {
                echo "<script>alert('Data Berhasil Diinputkan !');window.location='datapaket.php';</script>";
            }
        } else {
            echo "<script>alert('Ekstensi Gambar Hanya Bisa jpg dan png!');window.location='editpaket.php';</script>";
        }
    } else {
        $query = "UPDATE paket SET nama_paket = '$nama_paket',harga = '$harga' ";
        $query .= "WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query Error : " . mysqli_errno($conn) . " - " . mysqli_error($conn));
        } else {
            echo "<script>alert('Data Berhasil Diinputkan !');window.location='datapaket.php';</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Cafe</title>
    <link rel="stylesheet" href="style2.css">
    <link href="gambar/logo1.png" rel="shorcut icon">
</head>

<body>
    <section class="latar">
        <div class="container">
            <div class="title">Edit Data Paket...</div>
            <div class="content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Nama Paket</span>
                            <input type="text" placeholder="Masukkan Nama Paket" name="nama_paket" required
                                value="<?= $paket["nama_paket"]; ?>"><br><br>
                            <input type="hidden" name="id" value="<?= $paket["id"]; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Deskripsi</span>
                            <input type="text" placeholder="Masukkan Deskripsi Paket" name="deskripsi" required
                                value="<?= $paket["deskripsi"]; ?>"><br><br>
                            <input type="hidden" name="id" value="<?= $paket["id"]; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Harga</span>
                            <input type="text" placeholder="Masukkan Harga Paket" name="harga" required
                                value="<?= $paket["harga"]; ?>"><br><br>
                            <input type="hidden" name="id" value="<?= $paket["id"]; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Image</span>
                            <img src="gambar/<?= $paket['gambar']; ?>"
                                style="width: 120px; float:left;margin-bottom:5px;">
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