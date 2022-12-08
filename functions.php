<?php 
include 'db.php';
session_start();

function login($request) { // function login, di gunakan untuk melakukan proses login, dan parameter request isi nya adalah $_POST
    global $conn; // agar bisa mengakses variable $conn di file db.php maka di buat global 

    // ini merupakan array yang akan di kembalikan ke file login.php isi nya ada status, message, dan path
    $response = [
        'status' => false, // status default nya false, jika berhasil login maka akan di ubah menjadi true
        'message' => '', // tempat untuk menaruk pesan error jika ada
        'path' => '' // tempat untuk menaruk path jika berhasil login maka org yg login akan di arahkan sesuai dengan path nya
    ];

    // melakukan validasi apakah ada request post yang kosong atau tidak
    if(!isset($request['user']) || $request['user'] == ''){
        $response['message'] = 'Username tidak boleh kosong';
        return $response;
    }

    if(!isset($request['pass']) || $request['pass'] == '') {
        $response['message'] = 'Password tidak boleh kosong';
        return $response;
    }

    if(!isset($request['type']) || $request['type'] == '') {
        $response['message'] = 'Type tidak boleh kosong';
        return $response;
    }
    
    // setelah itu kita lakukan query ke database 
    // untuk mengecek apakah username dan password yang di inputkan ada di database atau tidak

    // masukan request post user dan pass ke dalam variable
    $user = mysqli_real_escape_string($conn, $request['user']); // untuk menghindari sql injection menggunakan mysqli_real_escape_string
    $pass = mysqli_real_escape_string($conn, $request['pass']); // untuk menghindari sql injection menggunakan mysqli_real_escape_string

    $type = $request['type']; // masukan request post type ke variable type

    if($type == 'user') { // jika type nya user maka lakukan query berikut
        $query = 'SELECT * FROM pembeli WHERE username = "'.$user.'" AND password = "'.MD5($pass).'"';
    }else if($type == 'admin') { // jika type nya admin maka lakukan query berikut
        $query = 'SELECT * FROM penjual WHERE username = "'.$user.'" AND password = "'.MD5($pass).'"';
    }else { // jika type nya tidak ada maka tampilkan pesan error dan logic selesai di proses karena ada return
        $response['message'] = 'Type tidak ditemukan';
        return $response;
    }
    
    // jika tidak ada error maka lakukan query ke database
    $cek = mysqli_query($conn, $query);

    if(mysqli_num_rows($cek) > 0){ // jika query di atas menghasilkan data maka lakukan logic berikut
        $data = mysqli_fetch_object($cek); // ambil data dari query di atas dan masukan ke variable data
        $_SESSION['status_login'] = true; // set session status_login menjadi true
        $response['status'] = true; // set variable response bagian status menjadi true
        $_SESSION['data'] = $data; // set masukan data org yg login tersebut ke dalam session data

        // lakukan pengecekan type nya data nya
        if($data->type == 'admin'){  // jika type nya admin maka lakukan logic berikut
            $_SESSION['type'] = 'admin'; // set session type menjadi admin
            $response['path'] = 'Admin/index.php'; // set variable response bagian path menjadi Admin/index.php
        }

        if($data->type == 'user') { // jika type nya user maka lakukan logic berikut
            $_SESSION['type'] = 'user'; // set session type menjadi user
            $response['path'] = 'index.php'; // set variable response bagian path menjadi index.php
        }

    }else { // jika query di atas tidak menghasilkan data maka lakukan logic berikut
        $response['message'] = 'Username atau Password Salah!';
    }

    return $response; // kembalikan variable response yg isi nya seperti di atas ke file login.php
}

function register($request){ // function register, di gunakan untuk melakukan proses register, dan parameter data isi nya adalah $_POST
    global $conn; // agar bisa mengakses variable $conn di file db.php maka di buat global

    // ini merupakan array yang akan di kembalikan ke file register.php isi nya ada status, dan message
    $response = [
        'status' => false, // status default nya false, jika berhasil register maka akan di ubah menjadi true
        'message' => '' // tempat untuk menaruk pesan error jika ada
    ];

    // taruk semua request post ke dalam variable sesuai dengan masing2 post nya
    $nama_pembeli =  $request['nama_pembeli'];
    $telp_pembeli =  $request['telp_pembeli'];
    $alamat_pembeli =  $request['alamat_pembeli'];
    $email_pembeli =  $request['email_pembeli'];
    $username = $request['username'];
    $password = mysqli_real_escape_string($conn, $request['password']);
    $confirm_password = mysqli_real_escape_string($conn, $request['cpassword']);


    // lakukan validasi apakah ada request post yang kosong atau tidak
    if($nama_pembeli == '') {
        $response['message'] = 'Nama tidak boleh kosong';
    }

    if($telp_pembeli == '') {
        $response['message'] = 'No Telp tidak boleh kosong';
    }

    if($alamat_pembeli == '') {
        $response['message'] = 'Alamat tidak boleh kosong';
    }

    if($email_pembeli == '') {
        $response['message'] = 'Email tidak boleh kosong';
    }

    if($username == '') {
        $response['message'] = 'Username tidak boleh kosong';
    }

    if($password == '') {
        $response['message'] = 'Password tidak boleh kosong';
    } else {
        if($password != $confirm_password){
            $response['message'] = 'Password tidak sama';
        }
    }

    if($response['message'] == '') { // jika isi array response bagian message kosong alias tidak ada error maka lakukan logic berikut

        // lakukan query untuk mengecek apakah username sudah ada di database atau belum
        $cek = mysqli_query($conn, "SELECT * FROM pembeli WHERE nama_pembeli = '".$username."'");

        if(mysqli_num_rows($cek) > 0){ // jika query di atas menghasilkan data maka lakukan logic berikut
            $response['message'] = 'Username sudah terdaftar!'; // set variable response bagian message menjadi Username sudah terdaftar!
        }else { // jika query di atas tidak menghasilkan data maka lakukan logic berikut
            $password = md5($password); // enkripsi password menggunakan md5

            // menggunakan try catch untuk mengatasi tampilan pesan error (jika terjadi error)
            try {
                // lakukan query insert ke database
                $insert = mysqli_query($conn, 
                    "INSERT INTO `pembeli` (`nama_pembeli`,`alamat_pembeli`,`email_pembeli`,`username`,`password`,`no_hp`,`type`) 
                    VALUES('$nama_pembeli','$alamat_pembeli','$email_pembeli','$username','$password','$telp_pembeli','user')"
                );

                if($insert){ // jika query di atas berhasil maka lakukan logic berikut
                    $response['status'] = true; // set variable response bagian status menjadi true
                }
            }catch (Exception $e){ // jika terjadi error maka lakukan logic berikut
                logging('Register', $e->getMessage()); // masukan pesan error ke dalam file log agar bisa kita lihat error nya ada apa
                $response['message'] = 'Gagal Mendaftar!'; // set variable response bagian message menjadi Gagal Mendaftar!
            }
        }
    }
    
    //  note* : function register ini membuat yg register masuk ke kategori pembeli !!
    return $response; // kembalikan variable response ke file register.php
}


function logout (){ // function logout, di gunakan untuk melakukan proses logout
    session_destroy(); // hapus semua session
    header("Refresh:0"); // refresh halaman
}

function get_product(){ // function dapatin semua list product
    global $conn;

    $reponse = [
        'status' => false,
        'data' => [],
        'message' => ''
    ];
    $produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY kode_produk DESC");
    if(mysqli_num_rows($produk) > 0){
        $reponse['status'] = true;
        while($data = mysqli_fetch_assoc($produk)){
            $reponse['data'][] = $data;
        }
    }else {
        $reponse['message'] = 'Data tidak ditemukan!';
    }

    return $reponse;
}

function get_single_product($id){ // function dapatin 1 product
    global $conn;
    $response = [
        'status' => false,
        'data' => null,
        'message' => ''
    ];
    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = '".$id."' ");
    if($produk){
        $response['status'] = true;
        $response['data'] = mysqli_fetch_object($produk);
    }else {
        $response['message'] = 'Data tidak ditemukan!';
    }

    return $response;
}

function add_product($data)  // function add product
{
    global $conn;

    $response = [
        'status' => false,
        'message' => ''
    ];

    //Menampung inputan dari form
    $nama      = $data['nama'];
    $harga     = $data['harga'];
    $stok      = $data['stok'];
    $deskripsi = $data['deskripsi'];

    try {
        $res_upload = upload($_FILES);

        if(!$res_upload['status']){
            $response['message'] = $res_upload['message'];
        }else {
            $image = $res_upload['image'];
            $insert = mysqli_query($conn, "INSERT INTO produk(`nama_produk`, `harga_produk`,`stok_produk`,`deskripsi_produk`,`gambar_produk`)
            VALUES(
                    '$nama',
                    '$harga',
                    '$stok',
                    '$deskripsi',
                    '$image'
                )
            ");

            if($insert){
                $response['status'] = true;
                $response['message'] = 'Berhasil menambahkan produk!';
            }
        }
    } catch (Exception $e) {
        logging('Add-Product', $e->getMessage());
        $response['message'] = 'Gagal Menambahkan Produk!';
    }
    
    return $response;
   
}

function edit_product($id,$data,$files) { // function edit product
    global $conn;
   
    $response =[
        'status' => false,
        'message' => '',
    ];

    //Data inputan dari form
    $nama      = $data['nama'];
    $harga     = $data['harga'];
    $stok      = $data['stok'];
    $deskripsi = $data['deskripsi'];
    $foto      = $data['foto'];

    //Data gambar yang baru
    $filename = $files['gambar']['name'];
    try {
        //Jika admin mengganti gambar
        if($filename != ''){
            $res_upload = upload($files);
            if(!$res_upload['status']){
                $response['message'] = $res_upload['message'];
            }else {
                $namagambar = $res_upload['image'];
                unlink('../../../image/upload/'.$foto);
            }
        }else{
            $namagambar = $foto;
        }

        //Query update data produk
        $update = mysqli_query($conn, "UPDATE produk SET
                            nama_produk = '".$nama."', 
                            harga_produk = '".$harga."',
                            stok_produk = '".$stok."',
                            deskripsi_produk = '".$deskripsi."',
                            gambar_produk = '".$namagambar."' 
                            WHERE kode_produk = '".$id."' 
                        ");

        if($update){
            $response['status'] = true;
            $response['message'] = 'Berhasil mengubah data produk!';
        }else {
            $response['message'] = 'Gagal mengubah data produk!';
        }

    }catch (Exception $e){
        logging('Edit-Product', $e->getMessage());
        $response['message'] = 'Gagal Mengubah Produk!';
    }
  
    return $response;
}


function delete_product($id) { // function delete product
    global $conn;
    
    $response =[
        'status' => false,
        'message' => '',
    ];

    $produk = mysqli_query($conn, "SELECT gambar_produk FROM produk WHERE kode_produk = '".$id."' ");
    $p = mysqli_fetch_object($produk);

    unlink('../image/upload/'.$p->gambar_produk);

    $delete = mysqli_query($conn, "DELETE FROM produk WHERE kode_produk = '".$id."' ");
    if($delete){
        $response['status'] = true;
        $response['message'] = 'Berhasil menghapus produk!';
    }else {
        $response['message'] = 'Gagal menghapus produk!';
    }
    
    return $response;
    
}

function edit_profile_admin($data) // function edit profile admin
{
    global $conn;

    $response =[
        'status' => false,
        'message' => '',
    ];

    $nama = ucwords($data['nama']); 
    $user = $data['user'];
    $email = $data['email'];
    $hp = $data['hp'];
    $alamat = $data['alamat'];

    try {
        $update = mysqli_query($conn, "UPDATE penjual SET
                                nama_penjual = '".$nama."',
                                username = '".$user."',
                                email_penjual = '".$email."',
                                telp_penjual = '".$hp."',
                                alamat_penjual = '".$alamat."'
                                WHERE id_penjual = '".$_SESSION['data']->id_penjual."' 
                            ");
        if($update){
            $response['status'] = true;
            $response['message'] = 'Berhasil mengubah data profil!';
            update_session_data();
        }else{
            $response['message'] = 'Gagal mengubah data profil!';
        }
    } catch (Exception $e) {
        logging('Edit-Profile-Admin', $e->getMessage());
        $response['message'] = 'Gagal mengubah data admin!';
    }
   

    return $response;
}

function ubah_password_admin($data) // functino ubah password admin
{
    global $conn;
    $response =[
        'status' => false,
        'message' => '',
    ];

    $pass1 = $data['pass1'];
    $pass2 = $data['pass2'];
    try {
        if($pass2 != $pass1){
            echo '<script>alert("Konfirmasi Password Baru Tidak Sesuai!")</script>';
        }else{
            $u_pass = mysqli_query($conn, "UPDATE penjual SET
                        password = '".MD5($pass1)."'
                        WHERE id_penjual = '".$_SESSION['data']->id_penjual."' ");
            if($u_pass){
                $response['status'] = true;
                $response['message'] = 'Berhasil mengubah password!';
                update_session_data();
            }else{
                $response['message'] = 'Gagal mengubah password!';
            }
        }
    }catch (Exception $e) {
        logging('Ubah-Password-Admin', $e->getMessage());
        $response['message'] = 'Gagal mengubah password!';
    }
   

    return $response;
}

function update_session_data() // function update session data
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM penjual WHERE id_penjual = '".$_SESSION['data']->id_penjual."' ");
    $d = mysqli_fetch_object($data);
    $_SESSION['data'] = $d;
}

function getCurrentUrl() { // functio untuk dapatin url yang sedang diakses
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
        $url = "https://";   
    else  
        $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   

    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];   

    return $url;
}

function getQueryString($url) { // function untuk dapatin query string
    $url_components = parse_url($url);
 
    if(isset($url_components['query'])){
        parse_str($url_components['query'], $params);
        return $params;
    }

    return [];
}

function upload($files) // function untuk upload file 
{
    $response =[
        'status' => false,
        'message' => '',
        'image' => null
    ];

     //Menampung data file yang diupload
     $name = $files['gambar']['name'];
     $tmp_name = $files['gambar']['tmp_name'];
     $extension = explode('.', $name);
     $extension = strtolower(end($extension));

     $filename = md5(time().rand(1,30)).$name;
 
     //Menampung data format file yang diizinkan
     $valid_extension = array('jpg', 'jpeg', 'png', 'gif');
 
     //validasi format file
     if(!in_array($extension, $valid_extension)){
        $response['message'] = 'Format file tidak diizinkan!';
     }else {
        //Jika format file sesuai (diizinkan)
        move_uploaded_file($tmp_name, '../../../image/upload/'.$filename); 

        $response['status'] = true;
        $response['image'] = $filename;
    }

    return $response;
}

function logging($functions,$log_msg) // function untuk melakukan logging pada error
{
    $log_filename = "logs";
    $message ='['. date('Y-m-d H:i:s').']'." ".$functions.'-Error : '.$log_msg;
    if (!file_exists($log_filename)) 
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';

    file_put_contents($log_file_data, $message . "\n", FILE_APPEND);
} 

?>