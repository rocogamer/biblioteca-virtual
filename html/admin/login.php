<!-- Sistema de contraseña olvidada -->
<?php
    include '../../phplibraries/database.php';
    /* 
    session_start();
    if(count($_POST)>0) {
        $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWD,$DB_DB) or die('Unable To connect');
        $result = mysqli_query($con,"");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
            $_SESSION["ID"] = $row['id'];
            $_SESSION["name"] = $row['name'];
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if (isset($_SESSION['ID'])) {
        Header('Location:admin.php');
    } */
?>