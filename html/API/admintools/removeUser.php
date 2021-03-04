<?php
    include('../../../phplibraries/database.php');
    session_start();
    if(count($_POST)>0) {
        $con = mysqli_connect(DBHOST, DBUSR, DBPASSWD, DBNAME) or die('Unable To connect');
        if(mysqli_query($con, "DELETE FROM login_data WHERE ID='" . (int)$_POST["userID"] . "' AND password='" . $_POST["pwd"] . "' AND username='" . $_POST["username"] . "'")) {
            $resultlog = mysqli_query($con, "INSERT INTO `log_actions` (`action`, `user`, `date`) VALUES ('Se ha eliminado el usuario " . $_POST["username"] . ".', ' " . $_SESSION["username"] . " ', '" . date("Y/m/d H/i/s") . "'");
            echo "User deleted";
        } else {
            echo "Delete failed";
        }
    }
?>