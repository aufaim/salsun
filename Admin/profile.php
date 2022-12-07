<?php
    require '../functions.php';
    require 'Services/middleware_admin.php';
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
    <link rel="stylesheet" href="../css/admin/style.css">
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
                            <a href="profile.php" >
                                <span class="fa-solid fa-user"></span>
                                <small>Profile</small>
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
            <h1>Profile</h1>
            <small>Home / Profile</small>
        </div>

        <!-- Masuk keisinya ges -->
        <section class="order" id="order">
            <h1 class="heading"><span>Profil</span> Admin</h1>
            <div class="row">
                <div class="image">
                    <img src="../image/admin/profilImg.svg" alt="">
                </div>
        
                <form action="">
                    <h3>Data Diri Admin</h3>
                    <h4>Nama Lengkap &ensp; : <?php echo $_SESSION['data']-> nama_penjual ?> </h4>
                    <h4>Unsername &ensp; &nbsp;   &emsp; : <?php echo $_SESSION['data']->username ?></h4>
                    <h4>Email &ensp;  &ensp; &ensp; &ensp; &ensp; &nbsp;   &emsp; : <?php echo $_SESSION['data']->email_penjual ?></h4>
                    <h4>No HP &emsp;  &emsp; &emsp; &emsp; &nbsp; : <?php echo $_SESSION['data']->telp_penjual ?></h4>
                    <h4>Alamat &nbsp; &nbsp;   &emsp; &nbsp; &nbsp;  &emsp;  : <?php echo $_SESSION['data']->alamat_penjual ?></h4>
                </form>
            </div>
        </section>

        
    </main>
</div>
    <?php 
        include 'Services/script.php';
    ?>
</body>
</html>