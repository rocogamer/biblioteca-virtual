<?php
    include('../../../phplibraries/database.php');
    session_start();
    if (isset($_SESSION['ID']) && isset($_SESSION['username']) && isset($_SESSION['categoriespermission']) && $_SESSION['categoriespermission']) {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $con = mysqli_connect(DBHOST, DBUSR, DBPASSWD, DBNAME) or die('Unable To connect');
            $sql = "DELETE FROM categorias WHERE ID='" . (int)$_POST['ID'] . "' AND Nombre='".htmlspecialchars($_POST['Name'])."';";
            $sql .= "INSERT INTO `log_actions` (`action`, `user`, `date`) VALUES ('Se ha eliminado la categoria " . htmlspecialchars($_POST['Name']) . ".', ' " . htmlspecialchars($_SESSION['username']) . " ', '" . date('Y/m/d H/i/s') . "');";
            if(mysqli_multi_query($con, $sql)) {
                echo "Category deleted";
            } else {
                echo "Delete failed". mysqli_error($con);
            }
        } else {
            echo "Method failed";
        }
    } else {
        echo "Access deneied";
    }
?>