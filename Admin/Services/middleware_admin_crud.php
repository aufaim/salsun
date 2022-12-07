<?php 
    if(isset($_SESSION['status_login'])){
        if($_SESSION['status_login'] != true){
            echo '<script>window.location="../../../login.php"</script>';
        }

        if($_SESSION['status_login'] == true && $_SESSION['type'] == 'user'){
            echo '<script>window.location="../../../index.php"</script>';
        }
    }else {
        echo '<script>window.location="../../../login.php"</script>';
    }

    if(isset($_POST['logout'])){
        logout();
    }
?>