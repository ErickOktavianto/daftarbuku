<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="css/landing.css">
</head>
<body>
    <div class="banner">
        <video  autoplay loop muted>
            <source src="img/vid.mp4">
        </video>
        <div class="navbar">
            <img src="img/logo.png" class="logo">
            <ul>
                <li class="overlay"><a href="login.php">Login</a></li>
                <li><a href="registrasi.php">Registrasi</a></li>
                <li><a href="materialize/index1.html" target="_blank">Another</a></li>
            </ul>
        </div>
        <div class="content">
        <div class="container">
            <h1>Landing Page Untuk Melihat <br> Daftar Buku Yang Kami Miliki</h1>
            <p>||Login Terlebih Dahulu Untuk Melihat Daftar Buku||<br> |||Follow Juga Sosial Media Kami.||</p>
            <div>
               
                <button type="button" onclick="visitPage()"><span></span> Instagram</a></button>
                <button type="button" onclick="visitPage1()"> <span></span>Facebook</button>

            </div>
            </div>
        </div>
      
    </div>
    

    <script>
    function visitPage(){
        window.location="http://instagram.com/rick_okt";
    }
</script>
<script>
    function visitPage1(){
        window.location="https://www.facebook.com/profile.php?id=100030158839144";
    }
</script>

    
</body>
</html>