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
require "koneksi.php";

$id = $_GET["id"];

$select_sql = "SELECT * FROM login WHERE id = '$_SESSION[id]'";
$result = mysqli_query($conn, $select_sql);

$profile = [];

while ($row = mysqli_fetch_assoc($result)) {
    $profile[] = $row;
}
$profile = $profile[0];

if (isset($_POST["submit"])) {
    $id = $_POST['id'];
    $nama = htmlspecialchars($_POST["nama"]);
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $cpassword = htmlspecialchars($_POST["cpassword"]);

    if ($password === $cpassword) {
            $query = "UPDATE login SET nama = '$nama',username = '$username',Email = '$email', password ='$password'";
            $query .= "WHERE id = '$id'";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Query Error : " . mysqli_errno($conn) . " - " . mysqli_error($conn));
            } else {
                echo "<script>alert('Data Berhasil Diinputkan !');window.location='profile.php';</script>";
            }
    } else {
        echo "<script>alert('Data Gagal Diinputkan !');window.location='profile.php';</script>";
    }
}
