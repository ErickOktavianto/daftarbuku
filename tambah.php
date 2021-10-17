<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';
// koneksi ke dbms
$conn = mysqli_connect("localhost","root","", "phpdasar");

// cek
if(isset($_POST["submit"])){

if(tambah($_POST)>0) {
    echo "
        <script>
            alert('Data Berhasil Ditambahkan!!!');
            document.location.href = 'index.php';
        </script  
    ";
} else{
    echo "
    <script>
        alert('Data Gagal Ditambahkan!!!');
        document.location.href = 'index.php';
    </script  
    ";
}
    
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tambah.css">
    <title>Tambah Data Buku</title>
</head>
<body>
    <div class="container">
    <h1>Tambah Data Buku</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="close">
    <span><a href="index.php">X</a></span>
    </div>
            <div class="input-box">
                <label for="Tanggal Terbit">Tanggal Terbit :</label>
                <input type="text" name="Tanggal" id="Tanggal Terbit" required autocomplete="off">
                </div>
            <div class="input-box">
                <label for="Judul">Judul :</label>
                <input type="text" name="Judul" id="Judul" required autocomplete="off">
            </div>
            <div class="input-box">
                <label for="Pengarang">Pengarang :</label>
                <input type="text" name="Pengarang" id="Pengarang" required autocomplete="off">
            </div>
            <div class="input-box">
                <label for="Penerbit">Penerbit :</label>
                <input type="text" name="Penerbit" id="Penerbit" required autocomplete="off">
            </div>
            <div class="input-img">
                <label class="img" for="Gambar">Gambar :</label>
                <input class="img-button" type="file" name="gambar" id="gambar" required>
            </div>
            <div class="input-button">
                <button  class="login-btn"type="submit" name="submit">Upload</button>
            </div>
        </ul>
    </form>
    </div>
</body>
</html>