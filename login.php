<?php
session_start();
require 'functions.php';

// cek cookie
if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])){

    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    // ambil username berdasarkan idnya
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id =$id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if($key === hash('sha256', $row['username'])){
        $_SESSION['login'] =  true;
    }

}

if(isset($_SESSION["login"])){
    header("Location: index.php");
}


if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

// cek username
if(mysqli_num_rows($result) === 1){

    
    // cek password
    $row = mysqli_fetch_assoc($result);
   if( password_verify($password, $row["password"]) ) {
    //    cek session
    $_SESSION["login"] = true;
    // cek remember me
    if(isset($_POST["remember"])){
        // buat cookie

        setcookie('id',$row['id'],time()+60);
        setcookie('key',hash('sha256',$row['username']),time()+60);
    }

    header ("Location: index.php");
    exit;
   }


}
$error = true;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title> 
    <link rel="stylesheet" href="css/style2.css">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"> 
</head>
<body>

    <div class="form-box">
        <h1>Halaman Login</h1>
        <?php if(isset($error)):?>
        <p style="color:red; font-style:italic;">Username / Password Salah</p>
    <?php endif;?>
    <form action="" method="POST">
        <div class="input-box">
        <i class="far fa-user"></i>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Masukkan Username"
        autofocus autocomplete="off" required>
        </div>
        <div class="input-box">
        <i class="fas fa-unlock"></i>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Masukkan Password" autofocus autocomplet="off" required>
        <span class="eye" onclick="myFunction()">
        <i id="hide1" class="fas fa-eye"></i>
        <i id="hide2" class="fas fa-eye-slash"></i>
        </span>
        </div>
        <div class="check-box">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember Me!</label>
        <div class="sign-up">
            <span> Not have an account?</span>
            <a href="registrasi.php">Sign Up</a>
        </div>
        </div>
        <button type="submit" class="login-btn" name="login">Login</button>
    </form>

    </div>
    <script>
        function myFunction(){
            var x = document.getElementById("password");
            var y = document.getElementById("hide1");
            var z = document.getElementById("hide2");

            if(x.type === "password"){
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
       }    else{
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
       }
    }

    </script>


    // <!-- <h1>Halaman Login</h1>
    // <form action="" method="POST">

    //     <ul>
    //         <li>
    //             <label for="username">Username</label>
    //             <input type="text" name="username" id="username">
    //         </li>
    //         <li>
    //             <label for="password">Password</label>
    //             <input type="password" name="password" id="password">
    //         </li>
    //         <li>
    //             <input type="checkbox" name="remember" id="remember">
    //             <label for="remember">Remember Me!</label>
    //         </li>
    //         <li>
    //             <button type="submit" name="login">Login</button>
    //         </li>
    //     </ul>
    // </form> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>