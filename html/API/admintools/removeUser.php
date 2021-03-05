<?php
    include('../../../phplibraries/database.php');
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $con = mysqli_connect(DBHOST, DBUSR, DBPASSWD, DBNAME) or die('Unable To connect');
        $sql = "DELETE FROM login_data WHERE ID='" . (int)$_GET['userID'] . "' AND username='" . $_GET['username'] . "';";
        $sql .= "INSERT INTO `log_actions` (`action`, `user`, `date`) VALUES ('Se ha eliminado el usuario " . $_GET['username'] . ".', ' " . $_SESSION['username'] . " ', '" . date('Y/m/d H/i/s') . "');";
        if(mysqli_multi_query($con, $sql)) {
            echo "User deleted";
        } else {
            echo "Delete failed". mysqli_error($con);
        }
    } else {
        echo "fail";
    }
?>