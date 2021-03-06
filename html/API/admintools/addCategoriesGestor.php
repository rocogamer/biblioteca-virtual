<?php
    include('../../../phplibraries/database.php');
    session_start();
    if (isset($_SESSION['ID']) && isset($_SESSION['username']) && isset($_SESSION['userspermission']) && $_SESSION['userspermission']) {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $con = mysqli_connect(DBHOST, DBUSR, DBPASSWD, DBNAME) or die('Unable To connect');
            $sql = "INSERT INTO `categorias`(`Nombre`) VALUES ('".htmlspecialchars($_POST['categoriesname'])."');";
            $sql .= "INSERT INTO `log_actions` (`action`, `user`, `date`) VALUES ('Se ha agregado la categoria " . htmlspecialchars($_POST['categoriesname']) . ".', ' " . htmlspecialchars($_SESSION['username']) . " ', '" . date('Y/m/d H/i/s') . "');";
            if(mysqli_multi_query($con, $sql)) {
                echo "Category added";
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