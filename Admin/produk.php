<?php
    require '../functions.php';
    require 'Services/middleware_admin.php';

    $products = get_product();
    $i = 1;
    if(!$products['status']){
        $error = $products['message'];
    }else {
        $products = $products['data'];
    }

    $url = getCurrentUrl();
    $query_string = getQueryString($url);
    if($query_string != [] && isset($query_string['idp'])) {
        $response = delete_product($query_string['idp']);
        if(!$response['status']){
            $error = $response['message'];
        }else {
            echo "<script>alert('".$response['message']."');window.location.href='produk.php';</script>";
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
            <h1>Produk</h1>
            <small>Home / Produk</small>
        </div>
        
         <!-- about section starts -->
        <section class="order" id="about">
        <h1 class="heading"><span>Data</span> Produk</h1>
            <?php 
                if(isset($error)){
                    echo "<div style='font-size:30px;font-weight:bold;color:red;'>$error</div>";
                }       
            ?>
            <div class="box">
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Stok</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (isset($error)){ ?>
                            <tr>
                                <td colspan="8">Tidak ada data</td>
                            </tr>
                        <?php } else { ?>
                            <?php foreach($products as $row){ ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['nama_produk'] ?></td>
                                    <td>Rp <?php echo number_format($row['harga_produk']) ?></td>
                                    <td><?php echo $row['deskripsi_produk'] ?></td>
                                    <td>
                                        <img src="../image/upload/<?php echo $row['gambar_produk'] ?>" width="100px">
                                    </td>
                                    <td><?php echo $row['stok_produk'] ?></td>
                                    <td>
                                        <a href="crud/produk/edit-produk.php?id=<?php echo $row['kode_produk'] ?>">Edit</a> || <a href="produk.php?idp=<?php echo $row['kode_produk'] ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
                <p><a href="crud/produk/tambah-produk.php" class="btn">Tambah Data</a></p><br>
            </div>
        </section> 
    </main>

</div>
    <?php 
        include 'Services/script.php';
    ?>
</body>
</html>