<!-- Sistema de contraseña olvidada -->
<?php
    include('../../phplibraries/database.php');
    session_start();
    if(count($_POST)>0) {
        $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWD,$DB_DB) or die('Unable To connect');
        $result = mysqli_query($con,"SELECT ID,name,username,permission_users,permission_books,permission_categories FROM login_data WHERE username='" . htmlspecialchars($_POST["username"]) . "' and password='" . md5(htmlspecialchars($_POST["password"])) . "'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
            $_SESSION["ID"] = $row['id'];
            $_SESSION["name"] = $row['name'];
            $_SESSION["username"] = $row['username'];
            $_SESSION["bookpermission"] = $row['permission_books'];
            $_SESSION["categoriespermission"] = $row['permission_categories'];
            $_SESSION["userspermission"] = $row['permission_users'];
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if (isset($_SESSION['ID'])) {
        Header('Location:admin.php');
    } 
?>