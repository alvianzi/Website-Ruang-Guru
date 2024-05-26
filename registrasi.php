<?php
require 'koneksi.php';
session_start();
if(!isset($_SESSION['log'])){
	
} else {
	header('location:index.php');
};
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script> alert('Selamat user berhasil ditambahkan!')</script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RUANG IT</title>
    <link rel="stylesheet" href="style2.css">
    <link href="gambar/logo1.png" rel="shorcut icon">
</head>

<body>
    <section class="latar">
        <div class="container">
            <div class="title">HALAMAN REGISTRASI ...</div>
            <div class="content">
                <form action="" method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Nama</span>
                            <input type="text" placeholder="Masukkan Nama lengkap Kamu" name="nama" id="nama" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input type="text" placeholder="Masukkan Username" name="username" id="username" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" placeholder="Masukkan Email Kamu" name="email" id="email" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" placeholder="Masukkan Password" name="password" id="password" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Konfirmasi Password</span>
                            <input type="password" placeholder="Masukkan Kembali Password" name="password2" id="password2"
                                required>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Register !" name="register">
                    </div>
                    <div class="button">
                        <input type="reset" value="Reset Data" name="Input">
                    </div>
                    <center>
                        <p>Kembali ke Halaman <a href="login.php">LOGIN</a></p>
                    </center>

                </form>
            </div>
        </div>
    </section>

</body>

</html>