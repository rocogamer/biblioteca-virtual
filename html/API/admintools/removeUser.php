<?php
    include('../../../phplibraries/database.php');
    session_start();
    if (isset($_SESSION['ID']) && isset($_SESSION['username']) && isset($_SESSION['userspermission']) && $_SESSION['userspermission']) {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $con = mysqli_connect(DBHOST, DBUSR, DBPASSWD, DBNAME) or die('Unable To connect');
            $sql = "DELETE FROM login_data WHERE ID='" . (int)$_POST['userID'] . "' AND username='" . $_POST['username'] . "';";
            $sql .= "INSERT INTO `log_actions` (`action`, `user`, `date`) VALUES ('Se ha eliminado el usuario " . $_POST['username'] . ".', ' " . $_SESSION['username'] . " ', '" . date('Y/m/d H/i/s') . "');";
            if(mysqli_multi_query($con, $sql)) {
                echo "User deleted";
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