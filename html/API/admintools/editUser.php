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
            $sql = "UPDATE `login_data` SET `name`='".$_POST['name']."',`username`='".$_POST['username']."',`password`='".md5(htmlspecialchars($_POST['pwd']))."',`permission_users`='".$_POST['userspermission']."',`permission_books`='".$_POST['bookpermission']."',`permission_categories`='".$_POST['categoriespermission']."' WHERE `ID`=".$_POST['ID'].";";
            $sql .= "INSERT INTO `log_actions` (`action`, `user`, `date`) VALUES ('Se ha editado el usuario " . htmlspecialchars($_POST['username']) . ".', ' " . htmlspecialchars($_SESSION['username']) . " ', '" . date('Y/m/d H/i/s') . "');";
            if(mysqli_multi_query($con, $sql)) {
                echo "User edited";
            } else {
                echo "Edit failed ". mysqli_error($con);
            }
        } else {
            echo "Method failed";
        }
    } else {
        echo "Access deneied";
    }
?>