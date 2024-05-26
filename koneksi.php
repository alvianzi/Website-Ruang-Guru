<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "rit";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("Gagal terhubung ke database" . mysqli_connect_error());
}

function registrasi($data)
{
    global $conn;
    $nama =$data["nama"];
    $username = strtolower(stripslashes($data["username"]));
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username
    $result = mysqli_query($conn, "SELECT username FROM login WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script> alert('Maaf username sudah terdaftar!')</script>";
        return false;
    }


    // cek konfirm pass
    if ($password != $password2) {
        echo "<script> alert('konfirmasi password tidak sesuai!')</script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //TAMBAH USERBARU
    
    mysqli_query($conn, "insert into login (nama,username, email, password) 
		values('$nama','$username','$email','$password')");
    return mysqli_affected_rows($conn);
}
