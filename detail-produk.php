<?php
    require 'functions.php';
    // ini adalah penghapus session
    // session_destroy();

    // ini merupakan middleware untuk mencegah admin yg sudah login masuk ke dalam halaman user
    if(isset($_SESSION['status_login'])){ // jika ada session status_login

        // jika ada session status_login dan nilai nya true dan type nya admin maka redirect ke halaman admin
        if($_SESSION['status_login'] == true && $_SESSION['type'] == 'admin'){ 
            echo '<script>window.location="Admin/index.php"</script>';
        }
    }

    // ketika selesai klik tombol logout data akan masuk ke function js_logout dii file js/script.js kemudian masuk ke codingan bawah ini
    if(isset($_POST['logout'])){ // jika ada post logout
        logout(); // maka jalankan function logout di functions.php
    }
    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salsun</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom css file link -->
    <link rel="stylesheet" href="css/user/detail-produk.css">
    
</head>
<body>
<!-- Header section starts -->
<header class="header">
    <a href="index.php" class="logo">
        <i class=image>
            <img src="image/SALSUN_LOGO.png" alt="" width="45px" height="45px">
        </i></a>
    <!-- Search -->
    <div class="search">
        <div class="search-contrainer">
            <form action="cari-produk.php">
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
            
        
    </div>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="index.php#menu">menu</a>
        <a href="index.php#order">Order</a>
        <a href="index.php#review">Review</a>
        <a href="index.php#about">About Us</a>
       
        
        <?php 
            if(isset($_SESSION['status_login']) && $_SESSION['status_login']){ // jika ada session status_login, tampilkan tombol logout
        ?>  
                <a href="#" id="logout" onclick="js_logout()">Logout</a> <!-- pakai javascript untuk kirim value nya ke post -->
                <form method="post" action="" id="form_logout">
                    <input type="hidden" name="logout">
                </form>
        <?php } ?>
    </nav>
    <!-- Bars -->
    <div id="menu-btn" class="fas fa-bars"></div>

</header>
<!-- Header section ends-->

<!-- menu section starts start -->
<section>
    <div class="menu">
        <h1 class="heading"> Our <span>menu</span></h1>
        <div class="box-container">
            <div class="box">
                <div class="col-2">
                    <img src="image/upload/<?php echo $p->gambar_produk ?>" width="100%">
                </div>
                <div class="col-3">
                    <h3><?php echo $p->nama_produk ?></h3>
                    <h4>Rp. <?php echo number_format($p->harga_produk) ?></h4>
                    <p>Deskripsi : <br>
                        <?php echo $p->deskripsi_produk ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    
</section>


<!-- footer section starts -->
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Quick Links</h3>
            <a href="index.php#home"><i class="fa-solid fa-chevron-right"></i>Home</a>
            <a href="index.php#menu"><i class="fa-solid fa-chevron-right"></i>menu</a>
            <a href="index.php#order"><i class="fa-solid fa-chevron-right"></i>Order</a>
            <a href="index.php#about"><i class="fa-solid fa-chevron-right"></i>About Us</a>
            <a href="index.php#review"><i class="fa-solid fa-chevron-right"></i>Review</a>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <a href="#"><i class="fa-solid fa-phone"></i>+123-456-789</a>
            <a href="#"><i class="fa-solid fa-phone"></i>+111-222-3333</a>
            <a href="#"><i class="fa-solid fa-envelope"></i>Aisyah Beningsari Mahadi</a>
            <a href="#"><i class="fa-solid fa-envelope"></i>Ester Hutabarat</a>
            <a href="#"><i class="fa-solid fa-location-dot"></i>Batam, Indonesia</a>
        </div>

        <div class="box">
            <h3>Follow Us</h3>
            <a href="#"><i class="fa-brands fa-facebook-f"></i> Facebook</a>
            <a href="#"><i class="fa-brands fa-twitter"></i>Twitter</a>
            <a href="#"><i class="fa-brands fa-instagram"></i>Instagram</a>
            <a href="#"><i class="fa-brands fa-linkedin"></i>linkedin</a>
            <a href="#"><i class="fa-brands fa-pinterest"></i>Pinterest</a>
        </div>
    </div>
    <div class="credit">Created by <span>college student</span> | Batam State Polytechnic</div>
</section>
<!-- footer section ends -->


<!-- custom js file link    -->
<script src="js/script.js"></script>
</body>
</html>