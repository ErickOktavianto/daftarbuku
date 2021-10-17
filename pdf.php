<?php
session_start();
require 'functions.php';

$buku = query("SELECT * FROM buku");

// tombol cari diklik
if(isset($_POST["search"])) {
    $buku = cari($_POST["keyword"]);
    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 style="text-align:center;">Daftar Buku</h1>
    <hr>
    <br><br>

    <div id="container">
    <table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
    
        <th>Gambar</th>
        <th>Tanggal Terbit</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
    </tr>
    <?php $i = 1;?>
    <?php foreach($buku as $row ) :?>


    <tr>
        <td><?= $i;?></td>
        <td>
            <img src="img/<?= $row["gambar"];?>" width="50">
        </td>
        <td><?= $row["tgl"];?></td>
        <td><?= $row["jdl"];?></td>
        <td><?= $row["pengarang"];?></td>
        <td><?= $row["penerbit"];?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach;?>

    </table>
    </div>
        <?php
        if(isset($_POST['cetak'])){
            header(Location: "cetak.php");
        }


        ?>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>