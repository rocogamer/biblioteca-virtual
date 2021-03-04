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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    </head>
    <body>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" ><i class="bi bi-person-fill"></i></span>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-asterisk"></i></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" aria-label="Amount (to the nearest dollar)">
            </div>
            <div style="text-align: centre; display: flex; justify-content: center;">
                <button type="button" class="btn btn-primary">Primary</button>
            </div>
            <!--<label for="password">Contrase&ntildea</label><br>
            <input type="password" id="password"><br>-->
        </form>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</html>