<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db_name = "rit1";

    //koneksi ke mysql
    $conn = mysqli_connect($server,$user,$password,$db_name);

    if(!$conn){
        die("Tidak tersambung ke database" . mysqli_connect_error());
    }

    
?>