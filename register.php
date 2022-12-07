<?php 
    require 'functions.php';

    // ketika selesai klik tombol register, data akan masuk ke codingan bawah ini
    if(isset($_POST['register'])){ // jika ada post register

        // masukan semua request post ke dalam parameter function register
        $register = register($_POST); // kemudian logic akan di jalan di dalam function register, check file functions.php bagian function register
        // jika sudah selesai di proses di function register, maka akan mengembalikan nilai array yang isi nya status dll 
        // dan akan di simpan ke dalam variable $register

        if(!$register['status']){ // jika ada array yg isi nya status dan status nya false
            $error = $register['message']; // maka array yg isi nya ada message tersebut masukan ke variable error
        }else {
            // jika berhasil register maka akan muncul alert dan redirect ke halaman login
            echo "<script>alert('Register Berhasil!'); window.location.href='login.php';</script>"; 
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/user/register.css">

    <title>Login</title>
</head>
<body>
    <div class="login__container">
        <div class="login-info-container">
            <h1 class="title">Register</h1>
            <?php 
                if(isset($error)){ // jika ada variable error, maka tampilkan pesan error nya
                    echo "<p style='color:red;font-weight:bold'>$error</p>";
                }
            ?>

            <form class="inputs-container" method="POST" action="">
                <input type="text" placeholder="Nama Lengkap" name="nama_pembeli" class="input-control">
                <input type="password" placeholder="Password" name="password" class="input-control">
                <input type="password" placeholder="Confirm Password" name="cpassword" class="input-control">
                <input type="text" placeholder="Alamat" name="alamat_pembeli" class="input-control">
                <input type="email" placeholder="Email" name="email_pembeli" class="input-control">
                <input type="number" placeholder="No. Handphone" name="telp_pembeli" class="input-control">
              
                <button type="submit" class="btn" name="register">Register</button> <!-- ketika klik tombol register, 
                maka isi nya akan masuk ke condingan di atas file ini -->

                <p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
            </form>
        </div>
        <img class="image-container" src="image/register/rgs.svg" alt="">
    </div>
</body>
</html>