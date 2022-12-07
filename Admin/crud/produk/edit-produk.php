<?php
    require '../../../functions.php';
    require '../../Services/middleware_admin_crud.php';

    $url = getCurrentUrl();
    $query_string = getQueryString($url);
    $id = null;
    if($query_string != []) {
        $id = $query_string['id'];
        $response = get_single_product($id);
        if($response['status']){
            $p = $response['data'];
        }else {
            echo "<script>alert('".$response['message']."');window.location.href='../../produk.php';</script>";
        }
    }
   
    if(isset($_POST['submit'])){      
        $res_edit = edit_product($id,$_POST,$_FILES);
        if($res_edit['status']){
            echo "<script>alert('".$res_edit['message']."');window.location.href='../../produk.php';</script>";
        }else {
            $error = $res_edit['message'];
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
    <!-- script -->
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    
    <link rel="stylesheet" href="../../../css/admin/edit-produk.css">
</head>
<style>
 
</style>
<body>
    <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h2 class="fa-brands fa-accusoft"><span>Admin</span></h2>
        </div>
        
        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(../../../image/SALSUN_LOGO.png)"></div>
                <h4>Salsun Premium Fruit Salad</h4>
                <small><?php echo $_SESSION['data']->nama_penjual ?></small>
            </div> 
    
            <div class="side-menu">
                    <ul>
                        <li>
                            <a href="../../index.php">
                                <span  class='bx bxs-dashboard icon'></span>
                                <small>Dashboard</small>
                            </a>
                        </li>
    
                        <li>
                            <a href="../../profile.php" >
                                <span class="fa-solid fa-user"></span>
                                <small>Profile</small>
                            </a>
                        </li>

                        <li>
                            <a href="../../pesanan.php">
                                <span class="fa-solid fa-cart-shopping"></span>
                                <small>Pesanan</small>
                            </a>
                        </li>
    
                        <li>
                            <a href="../../data.php">
                                <span class="fa-solid fa-chart-simple"></span>
                                <small>Data</small>
                            </a>
                        </li>
                        
                     
                        <li>
                            <a href="../../produk.php">
                                <span class="fa-solid fa-bag-shopping"></span>
                                <small>Produk</small>
                            </a>
                        </li>

                        <li>
                            <a href="../../pengaturan.php">
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
                        <div class="bg-img" style="background-image: url(../../../image/SALSUN_LOGO.png)"></div>
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
                <h1>Produk</h1>
                <small>Home /<a href="produk.php">Produk</a> / Edit Data Produk</small>
            </div>
            <section class="order" id="order">
                <h1 class="heading"><span>Edit Data </span> Produk</h1>
                <?php 
                    if(isset($error)){
                        echo "<div style='font-size:30px;font-weight:bold;color:red;'>$error</div>";
                    }
                ?>
                <div class="row">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="text" name="nama" placeholder="Nama Produk" class="box" value="<?php echo $p->nama_produk ?>" required>
                        <input type="number" name="harga" placeholder="Harga Produk" class="box" value="<?php echo $p->harga_produk ?>" required>
                        
                        <img src="../../../image/upload/<?php echo $p->gambar_produk ?>" width="200px">
                        <input type="hidden" name="foto" value="<?php echo $p->gambar_produk ?>">
                        <input type="file" name="gambar" class="box">
                        <textarea name="deskripsi" class="box" placeholder="Deskripsi"><?php echo $p->deskripsi_produk?></textarea><br>
                        <input type="text" name="stok" placeholder="Stok Produk" class="box" value="<?php echo $p->stok_produk ?>" required>
                        <input type="submit" name="submit" value="Submit" class="btn">
                    </form>
                </div>
            </section>

        </main>

    </div>
    <?php 
        include '../../Services/script.php';
    ?>
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>