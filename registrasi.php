<?php
require 'functions.php';


if( isset($_POST["register"]) ) {

    if( registrasi ($_POST) > 0 ){
        echo    "<script>
                    alert('user baru berhasil ditambahkan');
                </script";
        
    }else{
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"> 
</head>
<body>
    <div class="form-box">
    <div class="login-page">         
           <a href="landing.php">Back To Landing Page</a>
       </div>
        <h1>Halaman Registrasi</h1>
       
    <form action="" method="POST">
        <div class="input-box">
        <i class="far fa-user"></i>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Masukkan Username"
        autofocus autocomplete="off">
        </div>
        <div class="input-box">
        <i class="fas fa-unlock"></i>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Masukkan Password" autofocus autocomplet="off">
        </div>

        <div class="input-box">
        <i class="fas fa-unlock"></i>
        <label for="password2">Confirm Password</label>
        <input type="password" name="password2" id="password2" placeholder="Masukkan Password" autofocus autocomplet="off">
        </div>
        <button type="submit" class="login-btn" name="register" >Daftar</button>
    </form>

</div>  



    <!-- <h1>Halaman Registrasi</h1>
    <form action="" method="POST" >
    <hr style="width:100%;border:2px solid black">
    <ul>
        <li>
            <label for="username">Username  </label>
            <input type="text" name="username" id="username">
        </li> 
        <li>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <label for="password2">Konfirmasi Password</label>
            <input type="password" name="password2" id="password2">
        </li>
        <br>
        <li>
            <button type="submit" name="register">Sign Up</button>
        </li>
    </ul>
    </form> -->
</body>
</html>