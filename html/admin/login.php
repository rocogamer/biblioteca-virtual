<!-- Sistema de contraseña olvidada -->
<?php
    include('../../phplibraries/database.php');
    session_start();
    if(count($_POST)>0) {
        $con = mysqli_connect(DBHOST, DBUSR, DBPASSWD, DBNAME) or die('Unable To connect');
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
<html>
    <head>
    </head>
    <body>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="username"><i class="bi bi-person-fill"></i></span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-asterisk"></i></span>
                    <input type="password" class="form-control" placeholder="Contraseña" aria-label="Amount (to the nearest dollar)">
            </div>
            <!--<label for="password">Contrase&ntildea</label><br>
            <input type="password" id="password"><br>-->
        </form>
    </body>
</html>