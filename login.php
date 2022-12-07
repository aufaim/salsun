<?php
    require 'functions.php';

    // ketika selesai klik tombol login data akan masuk ke codingan bawah ini
    if(isset($_POST['submit'])){ // jika ada post submit

        // masukan semua request post ke dalam function login 
        $login = login($_POST); // kemudian logic akan di jalan di dalam function login, check file functions.php bagian function login
        // jika sudah selesai di proses di function login, maka akan mengembalikan nilai array yang isi nya status dll

        if(!$login['status']){ // jika ada array yg isi nya status dan status nya false
            if($login['message'] != ''){ // jika ada array yg isi nya message dan message nya tidak kosong
                $error = $login['message']; // maka message tersebut masukan ke variable error
            }
        }else {
            if($login['path'] != ''){ // jika ada array yg isi nya path dan path nya tidak kosong
                header('Location: '.$login['path']); // maka redirect ke path tersebut
            }
        }
    }

    // di bawah ini untuk middleware mencegah user atauu admin yang sudah login tidak bisa mengakses halaman login
    if(isset($_SESSION['status_login']) && $_SESSION['status_login']){ // jika ada session status_login dan nilai nya ada true
        if($_SESSION['type'] == 'admin'){ // lakukan pengecekan apakah type nya admin atau tidak
            header("Location: Admin/index.php"); // jika admin redirect ke halaman admin 
        }else{
            header("Location: index.php"); // jika bukan admin redirect ke halaman index (user)
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/user/login.css">

    <title>Login</title>
</head>
<body>
    <div class="login__container">
        <div class="login-info-container">
            <h1 class="title">Log in with</h1>
        
            <div class="social-login">
                <div class="social-login-element">
                    <img src="image/login/google.png" alt="google-image">
                    <span>Google</span>
                </div>
                <div class="social-login-element">
                    <img src="image/login/facebook.jpg" alt="facebook-image">
                    <span>Facebook</span>
                </div>
            </div>
            <p>or</p>
            
            <form method="post" action="" class="inputs-container">
            <?php 
                if(isset($error)){  // jika ada variable error, tampilan pesan error
                    echo '<p style="color:red;font-weight:bold;font-size:20px;">'.$error.'</p>';
                }
            ?>
                <input type="text" name="user" placeholder="Username" class="input-control">
                <input type="password" name="pass" placeholder="Password" class="input-control">
                <select name="type" id="type">
                    <option value="" disabled selected>Log in As</option>
                    <option value="admin">Admin</option> <!-- table penjual -->
                    <option value="user">User</option> <!-- table pembeli -->
                </select>
                <input type="submit" name="submit" value="Login" class="btn"> <!-- Ketika tombol login di klik, nanti isi nya 
                akan ke kirim ke codingan di di atas file ini -->

                <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
            </form>
        </div>
        <img class="image-container" src="image/login/log.svg" alt="">
    </div>
</body>
</html>