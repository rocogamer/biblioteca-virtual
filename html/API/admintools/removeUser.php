<?php
    include('../../../phplibraries/database.php');
    session_start();
    if(count($_POST)>0) {
        $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWD,$DB_DB) or die('Unable To connect');
        if(mysqli_query($con, "DELETE FROM login_data WHERE ID='" . (int)$_POST["UserID"] ."'")) {
            $resultlog = mysqli_query($con, "INSERT INTO `log_actions` (`action`, `user`, `date`) VALUES ('Se ha eliminado el usuario " . $_POST["UserName"] . ".', ' " . $_SESSION["username"] . " ', '" . date("Y/m/d H/i/s") . "'");
            echo "User deleted";
        } else {
            echo "Delete failed";
        }
    }
?>