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

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom css file link -->
    <link rel="stylesheet" href="css/user/index.css">
    
</head>
<body>
<!-- Header section starts -->
<header class="header">
    <a href="#" class="logo">
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
        <a href="#home">Home</a>
        <a href="#menu">menu</a>
        <a href="#order">Order</a>
        <a href="#contact">Contact</a>
        <a href="#review">Review</a>
        <a href="#about">About Us</a>
       
        
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



<!-- Home section starts -->

    
    <!-- awal bootstrap -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="image/user/1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="image/user/2.2.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="image/user/3.2.png" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
    </div>

    <!-- akhir bootstrap -->


<!-- Home section Ends -->

<!-- menu section starts start -->
<section class="menu" id="menu">
    <h1 class="heading"> Our <span>menu</span></h1>
    <div class="box-container">
        <?php
            $produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY kode_produk DESC LIMIT 8");
            if(mysqli_num_rows($produk) > 0){
                while($p = mysqli_fetch_array($produk)){
        ?>
            <div class="box">
                <a href="detail-produk.php?id=<?php echo $p['kode_produk'] ?>" style="text-decoration:none;">
                    <img src="image/upload/<?php echo $p['gambar_produk'] ?>" alt="">
                </a>
                <h3><?php echo substr($p['nama_produk'], 0, 20) ?></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <span>Rp. <?php echo number_format($p['harga_produk']) ?></span>
                <a href="#order" class="btn">Masukan Keranjang</a>
            </div>
                          
        <?php }}else{ ?>
            <p>Produk Tidak Ada</p>
        <?php } ?>            
    </div>

</section>
<!-- menu section ends -->
<!-- booking section starts -->
<section class="order" id="order">
    <h1 class="heading"><span>order</span> now</h1>
    <div class="row">
        <div class="image">
            <img src="image/user/bookImg.svg" alt="">
        </div>

        <form action="">
            <h3>Pesanan Anda</h3>
            <!-- punya ester -->
            <div class="inputBox">
                <div class="input">
                    <span>Nama</span>
                    <input type="text" placeholder="Masukan Nama Anda">
                </div>
                
                <div class="input">
                    <span>Orderan</span>
                    <input type="text" placeholder="Masukan Nama Makanan">
                </div>
                
                <div class="input">
                    <span>Nomor Telepon</span>
                    <input type="number" placeholder="Masukan Nomor HP">
                </div>

                <div class="input">
                    <span>Berapa Banyak</span>
                    <input type="number" placeholder="Jumlah Orderan">
                </div>
                
                <div class="input">
                    <span>Tanggal Pesan</span>
                    <input type="datetime-local">
                </div>

                <div class="input">
                    <span>Alamat</span>
                    <textarea name="" id="" cols="30" placeholder="Tulis Alamat" rows="10"></textarea>
                </div>
                
                <div class="input">
                    <span>Note</span>
                    <textarea name="" id="" cols="30" placeholder="Tulis Note Pesan anda" rows="10"></textarea>
                </div>

            </div>
           <?php if(isset($_SESSION['status_login']) && $_SESSION['status_login'] == true) {?>
                <a href="#" input  type="submit"class="btn"> Order Now</a>
            <?php }else {?>
                <a href="login.php" input  type="submit"class="btn"> Order Now</a>
            <?php } ?>
        </form>
    </div>
</section>
<!-- booking section ends -->




<!-- review section starts -->
<section class="review" id="review">
    <h1 class="heading">Client's<span> Review</span></h1>
    <div class="box-container">
        <div class="box">
            <img src="image/pic-1.png" alt="">
            <h3>John Deo</h3>
            <div class="stars">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star-half-stroke"></i>
            </div>
            <div class="text">Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Laboriosam Sapiente Nihil Aperiam? Repellat Sequi Nisi Aliquid Perspiciatis Libero Nobis Rem Numquam Nesciunt Alias Sapiente Minus Voluptatem, Reiciendis Consequuntur Optio Dolorem!</div>
        </div>

        <div class="box">
            <img src="image/pic-2.png" alt="">
            <h3>John Deo</h3>
            <div class="stars">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star-half-stroke"></i>
            </div>
            <div class="text">Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Laboriosam Sapiente Nihil Aperiam? Repellat Sequi Nisi Aliquid Perspiciatis Libero Nobis Rem Numquam Nesciunt Alias Sapiente Minus Voluptatem, Reiciendis Consequuntur Optio Dolorem!</div>
        </div>

        <div class="box">
            <img src="image/pic-3.png" alt="">
            <h3>John Deo</h3>
            <div class="stars">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star-half-stroke"></i>
            </div>
            <div class="text">Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Laboriosam Sapiente Nihil Aperiam? Repellat Sequi Nisi Aliquid Perspiciatis Libero Nobis Rem Numquam Nesciunt Alias Sapiente Minus Voluptatem, Reiciendis Consequuntur Optio Dolorem!</div>
        </div>
    </div>
</section>
<!-- review section ends -->


<!-- about section starts -->
<section class="about" id="about">
    <h1 class="heading"><span>About</span> Us</h1>
    <div class="row">
        <div class="image">
            <img src="image/aboutImg.svg" alt="">
        </div>
        <div class="content">
            <h3>we are batam state polytechnic students</h3>
            <p>Website ini dibuat oleh 4 mahasiswa semester 3 polibatam.</p>
            <p>Tujuan Website ini dibuat adalah melaukan transaksi ataupun kegiatan jual -beli secara online, Sebagai media penyampaian informasi produk, dan mampu untuk menjaring pelanggan secara luas</p>
            <a href="#team"  class="btn">Learn More<span class="fas fa-chevron-right"></span></a>

        </div>
    </div>
</section>
<!-- about section ends -->

<!-- team section starts -->
<section class="team" id="team">
    <h1 class="heading">Our<span> Team</span></h1>
    <div class="box-container">
        <div class="box">
            <img src="image/4.jpg" alt="" style="height: 100 ; width:100;">
            <h3>Aisyah Beningsari Mahadi</h3>
            <span>Ketua</span>
            <div class="share">
                <a href="https://www.facebook.com/aisyhhbm" class="fa-brands fa-facebook-f"></a>
                <a href="https://twitter.com/aisyhhbm" class="fa-brands fa-twitter"></a>
                <a href="https://www.instagram.com/aisyhhbm/" class="fa-brands fa-instagram"></a>
                <a href="https://www.linkedin.com/in/aisyah-beningsari-mahadi-557b1023a/" class="fa-brands fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <img src="image/5.jpg" alt="">
            <h3>Restu Hikmal</h3>
            <span>Anggota</span>
            <div class="share">
                <a href="#" class="fa-brands fa-facebook-f"></a>
                <a href="#" class="fa-brands fa-twitter"></a>
                <a href="https://www.instagram.com/rstuhkml/" class="fa-brands fa-instagram"></a>
                <a href="#" class="fa-brands fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <img src="image/1.jpg" alt="">
            <h3>Ester Hutabarat</h3>
            <span>Anggota</span>
            <div class="share">
                <a href="#" class="fa-brands fa-facebook-f"></a>
                <a href="#" class="fa-brands fa-twitter"></a>
                <a href="https://www.instagram.com/est_er17/" class="fa-brands fa-instagram"></a>
                <a href="#" class="fa-brands fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <img src="image/pic-3.png" alt="">
            <h3>Muhammad Aufa Ilham</h3>
            <span>Anggota</span>
            <div class="share">
                <a href="#" class="fa-brands fa-facebook-f"></a>
                <a href="#" class="fa-brands fa-twitter"></a>
                <a href="#" class="fa-brands fa-instagram"></a>
                <a href="#" class="fa-brands fa-linkedin"></a>
            </div>
        </div>

        
    </div>
</section>
<!-- team section ends -->


<!-- footer section starts -->
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Quick Links</h3>
            <a href="#home"><i class="fa-solid fa-chevron-right"></i>Home</a>
            <a href="#menu"><i class="fa-solid fa-chevron-right"></i>menu</a>
            <a href="#order"><i class="fa-solid fa-chevron-right"></i>Order</a>
            <a href="#about"><i class="fa-solid fa-chevron-right"></i>About Us</a>
            <a href="#book"><i class="fa-solid fa-chevron-right"></i>Book</a>
            <a href="#review"><i class="fa-solid fa-chevron-right"></i>Review</a>
        </div>

        <div class="box">
            <h3>Our menu</h3>
            <a href="#"><i class="fa-solid fa-chevron-right"></i>Manggo Sago</a>
            <a href="#"><i class="fa-solid fa-chevron-right"></i>Hongkong Dessert</a>
            <a href="#"><i class="fa-solid fa-chevron-right"></i>Strawberry Cheesecake</a>
            <a href="#"><i class="fa-solid fa-chevron-right"></i>Kiwi Cheesecake</a>
            <a href="#"><i class="fa-solid fa-chevron-right"></i>Overnight Oats</a>
            <a href="#"><i class="fa-solid fa-chevron-right"></i>Fruit Salad In Jar</a>
            <a href="#"><i class="fa-solid fa-chevron-right"></i>Reguler Fruit Salad</a>
            <a href="#"><i class="fa-solid fa-chevron-right"></i>Mini Preety Fruit Salad</a>
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
<script type="text/javascript" href="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="js/jquery.js"></script>
</body>
</html>