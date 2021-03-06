<?php
    include('../../../phplibraries/database.php');
    session_start();
    if (isset($_SESSION['ID']) && isset($_SESSION['username']) && isset($_SESSION['userspermission']) && $_SESSION['userspermission']) {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            /*if (!isset($_POST['userspermission'])) {
                $_POST['userspermission'] = 0;
            }
            if (!isset($_POST['categoriespermission'])) {
                $_POST['categoriespermission'] = 0;
            }
            if (!isset($_POST['bookpermission'])) {
                $_POST['bookpermission'] = 0;
            }*/
            $con = mysqli_connect(DBHOST, DBUSR, DBPASSWD, DBNAME) or die('Unable To connect');
            $sql = "INSERT INTO `login_data`(`name`, `username`, `password`, `permission_users`, `permission_books`, `permission_categories`) VALUES ('". htmlspecialchars($_POST['name']). "' ,'". htmlspecialchars($_POST['username']). "' ,'". md5(htmlspecialchars($_POST['pwd'])). "' ,'". htmlspecialchars($_POST['userspermission']). "' , '". htmlspecialchars($_POST['bookpermission']). "' ,'". htmlspecialchars($_POST['categoriespermission'])."' );";
            $sql .= "INSERT INTO `log_actions` (`action`, `user`, `date`) VALUES ('Se ha agregado el usuario " . htmlspecialchars($_POST['username']) . ".', ' " . htmlspecialchars($_SESSION['username']) . " ', '" . date('Y/m/d H/i/s') . "');";
            if(mysqli_multi_query($con, $sql)) {
                echo "User added";
            } else {
                echo "Add failed". mysqli_error($con);
            }
        } else {
            echo "Method failed";
        }
    } else {
        echo "Access deneied";
    }
?>