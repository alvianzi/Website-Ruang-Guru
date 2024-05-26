<?php
    $nama = htmlspecialchars($_GET["nama"]);
    $email = htmlspecialchars($_GET["email"]);
    $paket = htmlspecialchars($_GET["paket"]);
    $harga = htmlspecialchars($_GET["harga"]);
    $tanggal = htmlspecialchars($_GET["tanggal"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link href="gambar/logo1.png" rel="shorcut icon">
    <title>RUANG IT</title>
</head>

<body>
    <section class="back">
        <div class="alas">
            <div class="isi">
                <img src="gambar/logo1.png">
                <h2>RUANG IT</h2>
                <h4>STRUK PEMBAYARAN</h4>
                <table>
                    <tr>
                        <td>
                            <div class="label">Nama</div>
                        </td>
                        <td>:</td>
                        <td>
                            <div class="data"><?=$nama?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="label">Email</div>
                        </td>
                        <td>:</td>
                        <td>
                            <div class="data-email"><?=$email?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="label">Jenis Paket</div>
                        </td>
                        <td>:</td>
                        <td>
                            <div class="data"><?=$paket?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="label">Harga</div>
                        </td>
                        <td>:</td>
                        <td>
                            <div class="data"><?=$harga?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="label">Tanggal</div>
                        </td>
                        <td>:</td>
                        <td>
                            <div class="data"><?=$tanggal?></div>
                        </td>
                    </tr>
                </table>
                <br>
                <a href="index.php" class="btn-home">Home</a>
            </div>
        </div>
    </section>

    <script>
    window.print();
    </script>
</body>

</html>