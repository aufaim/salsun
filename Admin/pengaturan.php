<?php
    require '../functions.php';
    require 'Services/middleware_admin.php';

    if(isset($_POST['submit'])){
        $response = edit_profile_admin($_POST);
        if($response['status']){
            echo "<script>alert('".$response['message']."');window.location.href='pengaturan.php';</script>";
        }else{
            echo "<script>alert('".$response['message']."');</script>";
        }
    }


    if(isset($_POST['ubah_password'])){
        $res_password = ubah_password_admin($_POST);
        if($res_password['status']){
            echo "<script>alert('".$res_password['message']."');window.location.href='pengaturan.php';</script>";
        }else{
            echo "<script>alert('".$res_password['message']."');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>Admin Salsun</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <link rel="stylesheet" href="../css/admin/produk.css">
</head>
<body>
    <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h2 class="fa-brands fa-accusoft"><span> Admin</span></h2>
        </div>
        
        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(../image/SALSUN_LOGO.png)"></div>
                <h4>Salsun Premium Fruit Salad</h4>
                <small><?php echo $_SESSION['data']->nama_penjual ?></small>
            </div> 
    
            <div class="side-menu">
                    <ul>
                        <li>
                            <a href="index.php">
                                <span  class='bx bxs-dashboard icon'></span>
                                <small>Dashboard</small>
                            </a>
                        </li>

                        <li>
                            <a href="pesanan.php">
                                <span class="fa-solid fa-cart-shopping"></span>
                                <small>Pesanan</small>
                            </a>
                        </li>

                        <li>
                            <a href="produk.php">
                                <span class="fa-solid fa-bag-shopping"></span>
                                <small>Produk</small>
                            </a>
                        </li>

                        <li>
                            <a href="pengaturan.php">
                                <span class="fa-solid fa-gears"></span>
                                <small>Pengaturan</small>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>      
    </div>

    <!-- Masuk menu -->
    <div class="main-content">
        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span  class="fa-solid fa-bars"></span>
                </label>

                <div class="header-menu">
                    <label for="">
                        <span class="fa-solid fa-magnifying-glass"></span>
                    </label>

                    <div class="notify-icon">
                        <span class="fa-solid fa-envelope"></span>
                        <span class="notifiy">4</span>
                    </div>

                    <div class="notify-icon">
                        <span class="fa-solid fa-bell"></span>
                        <span class="notifiy">3</span>
                    </div>
                    
                    <div class="user">
                        <div class="bg-img" style="background-image: url(../image/SALSUN_LOGO.png)"></div>
                        <span>
                            <form action="" method="POST" id="form-logout">
                                <input type="hidden" name="logout">
                                <span class="fa-solid fa-power-off" ></span>
                                <span id="logout">Logout</span>
                            </form>
                        </span>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="page-header">
                <h1>Pengaturan</h1>
                <small>Home / Pengaturan</small>
            </div>

            <!-- form section starts -->
                <section class="order" id="order">
                    <h1 class="heading"><span>Pengaturan</span> Akun</h1>
                    <div class="row">
                        <form action="" method="POST">
                            <h3>PROFIL</h3>
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="box" value="<?php echo $_SESSION['data']->nama_penjual ?>" required>
                            <input type="text" name="user" placeholder="Username" class="box" value="<?php echo $_SESSION['data']->username ?>" required>
                            <input type="email" name="email" placeholder="Email" class="box" value="<?php echo $_SESSION['data']->email_penjual ?>" required>
                            <input type="text" name="hp" placeholder="No. Hp" class="box" value="<?php echo $_SESSION['data']->telp_penjual ?>" required>
                            <input type="text" name="alamat" placeholder="Alamat" class="box" value="<?php echo $_SESSION['data']->alamat_penjual ?>" required>
                            <input type="submit" name="submit" value="Ubah Profil" class="btn">
                        </form>
                    </div>
                </section>
            <!-- form section ends -->

            <!-- booking section starts -->
                <section class="order" id="order">
                    <h1 class="heading"></h1>
                    <div class="row">
                        <form action="" method="POST">
                            <h3>Password</h3>
                            <input type="password" name="pass1" placeholder="Password Baru" class="box"  required>
                            <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="box"  required>
                            <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                        </form>
                    </div>
                </section>
            <!-- booking section ends -->

        
        </main>

    
        
    </div>

    <?php 
        include 'Services/script.php';
    ?>
</body>
</html>