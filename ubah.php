<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

$id = $_GET["id"];

// query data buku berdsrkan idnya
$buku = query("SELECT * FROM buku WHERE id = $id ")[0];


// cek
if(isset($_POST["submit"])){


if( ubah($_POST) > 0) {
    echo "
        <script>
            alert('Data Berhasil Diubah!!!');
            document.location.href = 'index.php';
        </script  
    ";
} else{
    echo "
    <script>
        alert('Data Gagal Diubah!!!');
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
    <title>Ubah Data Buku</title>
    <link rel="stylesheet" href="ubah.css">
</head>
<body>
    <div class="container">
    <h1>Edit Data Buku</h1>
    <hr style="width:100%;border:2px solid black">
    <form action="" method="post" enctype="multipart/form-data"> 
        <input type="hidden" name="id" value="<?= $buku["id"];?>">
        <input type="hidden" name="gambarLama" value="<?= $buku["gambar"];?>">
        <span class="close"><a href="index.php">X</a></span>
        <div class="input-img">
                <img class="img-gambar" src="img/<?= $buku['gambar'];?>" width="200px">
                <br>
                
            </div>

            <div class="input-box">
            
                <label for="Tanggal Terbit">Tanggal Terbit :</label>
                <input type="text" name="Tanggal" id="Tanggal Terbit" required value="<?= $buku ["tgl"];?>">
          
            </div>
            <div class="input-box">
        
                <label for="Judul">Judul :</label>
                <input type="text" name="Judul" id="Judul" value="<?= $buku ["jdl"];?>" size="30">
          
            </div>
            <div class="input-box">
        
                <label for="Pengarang">Pengarang :</label>
                <input type="text" name="Pengarang" id="Pengarang" value="<?= $buku ["pengarang"];?>">
          
            </div>
            <div class="input-box">
        
                <label for="Penerbit">Penerbit :</label>
                <input type="text" name="Penerbit" id="Penerbit" value="<?= $buku ["penerbit"];?>">
            </div>
            <div class="input-img">
            <label class="img" for="Gambar">Gambar :    </label>
            <input class="img-button"type="file" name="gambar" id="gambar">
            </div>
           
            <div class="input-button">
                <button class="edit-btn" type="submit" name="submit">Edit</button>
            </div>
    </form>
</div>
</body>
</html> 