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
            <h2 class="fa-brands fa-accusoft"><span>Admin</span></h2>
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
            <h1>Dashboard</h1>
            <small>Home / Dashboard</small>
        </div>

        <div class="page-content">
            <div class="analytics">
                <div class="card">
                    <div class="card-head">
                        <h2>107,200</h2>
                        <span class="fa-solid fa-user-group"></span>
                    </div>
    
                    <div class="card-progress">
                        <small> User Activity this Month</small>
                        <div class="card-indicator">
                            <div class="indicator one" style="width: 60%"></div>
                        </div>
                    </div>
                </div>
    
                <div class="card">
                    <div class="card-head">
                        <h2>340,230</h2>
                        <span class="fa-solid fa-eye"></span>
                    </div>
    
                    <div class="card-progress">
                        <small> Page views</small>
                        <div class="card-indicator">
                            <div class="indicator two" style="width: 80%"></div>
                        </div>
                    </div>
                </div>
    
                <div class="card">
                    <div class="card-head">
                        <h2>40,500</h2>
                        <span class="fa-solid fa-cart-shopping"></span>
                    </div>
    
                    <div class="card-progress">
                        <small> Monthly Orders</small>
                        <div class="card-indicator">
                            <div class="indicator three" style="width: 65%"></div>
                        </div>
                    </div>
                </div>
    
                <div class="card">
                    <div class="card-head">
                        <h2>Rp500.000</h2>
                        <span class="fa-solid fa-wallet"></span>
                    </div>
    
                    <div class="card-progress">
                        <small> Monthly revenue growth</small>
                        <div class="card-indicator">
                            <div class="indicator four" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="records table-responsive">
                <div class="record-header">
                    <div class="add">
                        <span>Entries</span>
                        <select name="" id="">
                            <option value="">ID</option>
                        </select>
                        <button>Add Record</button>
                    </div>
        
                    
                    <div class="browse">
                        <input type="search" placeholder="search" class="record-search">
                        <select name="" id="">
                            <option value="">Status</option>
                        </select>
                    </div>
                </div>
                
                <div>
                    <table width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><span class="fa-sharp fa-solid fa-sort"></span> CLIENT</th>
                                <th><span class="fa-sharp fa-solid fa-sort"></span> TOTAL</th>
                                <th><span class="fa-sharp fa-solid fa-sort"></span> ISSUE DATE</th>
                                <th><span class="fa-sharp fa-solid fa-sort"></span> BALANCE</th>
                                <th><span class="fa-sharp fa-solid fa-sort"></span> ACTIONS</th>
                            </tr>
                        </thead>
            
                        <tbody>
                            <tr>
                                <td>#001</td>
            
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img" style="background-image: url(../image/admin/1.jpeg)"></div>
                                        <div class="client-info">
                                            <h4>Ester Hutabarat</h4>
                                            <small>ester@crossover.org</small>
                                        </div>
                                    </div>
                                </td>
            
                                <td>
                                    Rp47.000
                                </td>
            
                                <td>
                                    17 November, 2022
                                </td>
            
                                <td>
                                    -Rp3.000
                                </td>
            
                                <td>
                                    <div class="actions">
                                        <span class="fa-brands fa-telegram"></span>
                                        <span class="fa-solid fa-eye"></span>
                                        <span class="fa-solid fa-ellipsis-vertical"></span>
                                    </div>
                                </td>
                            </tr>
            
                            <tr>
                                <td>#002</td>
            
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img" style="background-image: url(../image/admin/6.jpeg)"></div>
                                        <div class="client-info">
                                            <h4>Wulan Hutapea</h4>
                                            <small>wulan@crossover.org</small>
                                        </div>
                                    </div>
                                </td>
            
                                <td>
                                    Rp23.000
                                </td>
            
                                <td>
                                    4 Oktober, 2022
                                </td>
            
                                <td>
                                    -Rp7.000
                                </td>
            
                                <td>
                                    <div class="actions">
                                        <span class="fa-brands fa-telegram"></span>
                                        <span class="fa-solid fa-eye"></span>
                                        <span class="fa-solid fa-ellipsis-vertical"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>#003</td>
            
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img" style="background-image: url(../image/admin/7.jpeg)"></div>
                                        <div class="client-info">
                                            <h4>Salsabilla Rahida Batami </h4>
                                            <small>salsacrossover.org</small>
                                        </div>
                                    </div>
                                </td>
            
                                <td>
                                    Rp89.000
                                </td>
            
                                <td>
                                    1 April, 2022
                                </td>
            
                                <td>
                                    -Rp1.000
                                </td>
            
                                <td>
                                    <div class="actions">
                                        <span class="fa-brands fa-telegram"></span>
                                        <span class="fa-solid fa-eye"></span>
                                        <span class="fa-solid fa-ellipsis-vertical"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>#004</td>
            
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img" style="background-image: url(../image/admin/8.jpeg)"></div>
                                        <div class="client-info">
                                            <h4>Roslinda Helma Dewi </h4>
                                            <small>linda@crossover.org</small>
                                        </div>
                                    </div>
                                </td>
            
                                <td>
                                    Rp24.000
                                </td>
            
                                <td>
                                    9 Mei, 2022
                                </td>
            
                                <td>
                                    -Rp6.000
                                </td>
            
                                <td>
                                    <div class="actions">
                                        <span class="fa-brands fa-telegram"></span>
                                        <span class="fa-solid fa-eye"></span>
                                        <span class="fa-solid fa-ellipsis-vertical"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>#005</td>
            
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img" style="background-image: url(../image/admin/9.jpeg)"></div>
                                        <div class="client-info">
                                            <h4>Greneto Justitia Mahadi</h4>
                                            <small>neto@crossover.org</small>
                                        </div>
                                    </div>
                                </td>
            
                                <td>
                                    Rp42.500
                                </td>
            
                                <td>
                                    8 Juli, 2022
                                </td>
            
                                <td>
                                    -Rp7.500
                                </td>
            
                                <td>
                                    <div class="actions">
                                        <span class="fa-brands fa-telegram"></span>
                                        <span class="fa-solid fa-eye"></span>
                                        <span class="fa-solid fa-ellipsis-vertical"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>#006</td>
            
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img" style="background-image: url(../image/admin/11.jpeg)"></div>
                                        <div class="client-info">
                                            <h4>Aisyah Beningsari Mahadi</h4>
                                            <small>aisyah@crossover.org</small>
                                        </div>
                                    </div>
                                </td>
            
                                <td>
                                    Rp50.000
                                </td>
            
                                <td>
                                    8 Maret, 2022
                                </td>
            
                                <td>
                                    <span class="paid">Paid</span>
                                </td>
                                
            
                                <td>
                                    <div class="actions">
                                        <span class="fa-brands fa-telegram"></span>
                                        <span class="fa-solid fa-eye"></span>
                                        <span class="fa-solid fa-ellipsis-vertical"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>#007</td>
            
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img" style="background-image: url(../image/admin/12.jpeg)"></div>
                                        <div class="client-info">
                                            <h4>Parikesit Iman Mahadi</h4>
                                            <small>iman@crossover.org</small>
                                        </div>
                                    </div>
                                </td>
            
                                <td>
                                    Rp33.000
                                </td>
            
                                <td>
                                    11 Juni, 2022
                                </td>
            
                                <td>
                                    -Rp7.000
                                </td>
            
                                <td>
                                    <div class="actions">
                                        <span class="fa-brands fa-telegram"></span>
                                        <span class="fa-solid fa-eye"></span>
                                        <span class="fa-solid fa-ellipsis-vertical"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>#008</td>
            
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img" style="background-image: url(../image/admin/10.jpeg)"></div>
                                        <div class="client-info">
                                            <h4>Fadli Hadi Arfarrel</h4>
                                            <small>parel@crossover.org</small>
                                        </div>
                                    </div>
                                </td>
            
                                <td>
                                    Rp47.000
                                </td>
            
                                <td>
                                    17 November, 2022
                                </td>
            
                                <td>
                                    -Rp3.000
                                </td>
            
                                <td>
                                    <div class="actions">
                                        <span class="fa-brands fa-telegram"></span>
                                        <span class="fa-solid fa-eye"></span>
                                        <span class="fa-solid fa-ellipsis-vertical"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>#009</td>
            
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img" style="background-image: url(../image/admin/13.jpeg)"></div>
                                        <div class="client-info">
                                            <h4>Respati Hadi Nata</h4>
                                            <small>nata@crossover.org</small>
                                        </div>
                                    </div>
                                </td>
            
                                <td>
                                    Rp47.000
                                </td>
            
                                <td>
                                    17 November, 2022
                                </td>
            
                                <td>
                                    -Rp3.000
                                </td>
            
                                <td>
                                    <div class="actions">
                                        <span class="fa-brands fa-telegram"></span>
                                        <span class="fa-solid fa-eye"></span>
                                        <span class="fa-solid fa-ellipsis-vertical"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>#010</td>
            
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img" style="background-image: url(../image/admin/14.jpeg)"></div>
                                        <div class="client-info">
                                            <h4>Raditya Hadi Mukti</h4>
                                            <small>aditr@crossover.org</small>
                                        </div>
                                    </div>
                                </td>
            
                                <td>
                                    Rp47.000
                                </td>
            
                                <td>
                                    17 November, 2022
                                </td>
            
                                <td>
                                    -Rp3.000
                                </td>
            
                                <td>
                                    <div class="actions">
                                        <span class="fa-brands fa-telegram"></span>
                                        <span class="fa-solid fa-eye"></span>
                                        <span class="fa-solid fa-ellipsis-vertical"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>#011</td>
            
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img" style="background-image: url(../image/admin/15.jpeg)"></div>
                                        <div class="client-info">
                                            <h4>Rizky Vicky Avicii</h4>
                                            <small>viki@crossover.org</small>
                                        </div>
                                    </div>
                                </td>
            
                                <td>
                                    Rp32.000
                                </td>
            
                                <td>
                                    17 Januari, 2022
                                </td>
            
                                <td>
                                    -Rp8.000
                                </td>
            
                                <td>
                                    <div class="actions">
                                        <span class="fa-brands fa-telegram"></span>
                                        <span class="fa-solid fa-eye"></span>
                                        <span class="fa-solid fa-ellipsis-vertical"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>#012</td>
            
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img" style="background-image: url(../image/admin/16.jpeg)"></div>
                                        <div class="client-info">
                                            <h4>Fatih Yuliantika</h4>
                                            <small>ester@crossover.org</small>
                                        </div>
                                    </div>
                                </td>
            
                                <td>
                                    Rp45.000
                                </td>
            
                                <td>
                                    5 juli, 2022
                                </td>
            
                                <td>
                                    -Rp5.000
                                </td>
            
                                <td>
                                    <div class="actions">
                                        <span class="fa-brands fa-telegram"></span>
                                        <span class="fa-solid fa-eye"></span>
                                        <span class="fa-solid fa-ellipsis-vertical"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>#013</td>
            
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img" style="background-image: url(../image/admin/17.jpeg)"></div>
                                        <div class="client-info">
                                            <h4>Mark Tuan</h4>
                                            <small>mark@crossover.org</small>
                                        </div>
                                    </div>
                                </td>
            
                                <td>
                                    Rp41.000
                                </td>
            
                                <td>
                                    3 September, 2022
                                </td>
            
                                <td>
                                    -Rp9.000
                                </td>
            
                                <td>
                                    <div class="actions">
                                        <span class="fa-brands fa-telegram"></span>
                                        <span class="fa-solid fa-eye"></span>
                                        <span class="fa-solid fa-ellipsis-vertical"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>#014</td>
            
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img" style="background-image: url(../image/admin/18.jpeg)"></div>
                                        <div class="client-info">
                                            <h4>Wira</h4>
                                            <small>wira@crossover.org</small>
                                        </div>
                                    </div>
                                </td>
            
                                <td>
                                    Rp47.000
                                </td>
            
                                <td>
                                    11 Januari, 2022
                                </td>
            
                                <td>
                                    <span class="paid">Paid</span>
                                </td>
            
                                <td>
                                    <div class="actions">
                                        <span class="fa-brands fa-telegram"></span>
                                        <span class="fa-solid fa-eye"></span>
                                        <span class="fa-solid fa-ellipsis-vertical"></span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
                
            </div>
        </div>
    </main>

   
</div>
    <?php 
        include 'Services/script.php';
    ?>
</body>
</html>