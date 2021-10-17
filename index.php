<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: landing.php");
    exit;
}
require 'functions.php';

$buku = query("SELECT * FROM buku");

// tombol cari diklik
if(isset($_POST["search"])) {
    $buku = cari($_POST["keyword"]);
    
}

if(isset($_POST['cetak'])){
    header(Location: "cetak.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Daftar Buku</h1>
    </p>
    <hr style="width:100%px;border:2px solid black">
    <a class="tambah" href="tambah.php">Tambah Data Buku</a>
    <a class="tambah" href="cetak.php" target="_blank" name="cetak">Print</a>
    <a class="logout" href="logout.php">Logout</a>
  
    <br><br>

    <form action="" method="POST">

    <input class="form-cari" type="text" name="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" id="keyword">
    <button type ="submit"name="cari" id="tombol-cari">Search</button>
    <br><br>
    <img class="loader" src="img/load.gif" >

    </form>
    <div id="container">
    <table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th class="aksi">Aksi</th>
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
        <td class="aksi">
            <a class="ubah" href="ubah.php?id=<?= $row["id"];?>">Ubah</a>  |
            <a class="hapus" href="hapus.php?id=<?= $row["id"];?>" onclick ="return confirm('Yakin?')">Hapus</a>
        </td>
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


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>