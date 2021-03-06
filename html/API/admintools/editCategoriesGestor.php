<?php
    include('../../../phplibraries/database.php');
    session_start();
    if (isset($_SESSION['ID']) && isset($_SESSION['username']) && isset($_SESSION['categoriespermission']) && $_SESSION['categoriespermission']) {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $con = mysqli_connect(DBHOST, DBUSR, DBPASSWD, DBNAME) or die('Unable To connect');
            $sql = "UPDATE categorias SET `Nombre`='".htmlspecialchars($_POST['nombre'])."'WHERE `ID`=".$_POST['ID'].";";
            $sql .= "INSERT INTO `log_actions` (`action`, `user`, `date`) VALUES ('Se ha editado la categoria " . $_POST['ID'] ." ". htmlspecialchars($_POST['nombre']) . ".', ' " . htmlspecialchars($_SESSION['username']) . " ', '" . date('Y/m/d H/i/s') . "');";
            if(mysqli_multi_query($con, $sql)) {
                echo "Category edited";
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