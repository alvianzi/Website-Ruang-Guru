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

$delete_sql = "DELETE FROM paket WHERE id_paket = $id";
$result = mysqli_query($conn, $delete_sql);

if ($result) {
    echo "<script>
        alert('Data berhasil dihapus!');
        document.location.href = 'datapaket.php';
    </script>";
} else {
    echo "<script>
        alert('Data gagal dihapus!');
        document.location.href = 'datapaket.php';
    </script>";
}