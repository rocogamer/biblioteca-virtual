<?php
    session_start();
    include('../../../phplibraries/database.php');
    $con = mysqli_connect(DBHOST, DBUSR, DBPASSWD, DBNAME) or die('Unable To connect');
    if (isset($_GET['i'])) {
        $result = mysqli_query($con,"SELECT * FROM login_data WHERE ID>".$_GET['i']);
    } else {
        $result = mysqli_query($con,"SELECT * FROM login_data");
        $lastid = 0;
    }
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if($row["ID"] != $_SESSION["ID"]){
                $permBooks = $row["permission_books"] ? "Si" : "No";
                $permCategories = $row["permission_categories"] ? "Si" : "No";
                $permUsers = $row["permission_users"] ? "Si" : "No";
                echo "<tr id=row".$row["username"].">";
                echo "<td id=id".$row["username"]."> " . $row["ID"] . "</td>";
                echo "<td id=name".$row["username"].">" . $row["name"] . "</td>";
                echo "<td id=username".$row["username"].">" . $row["username"] . "</td>";
                echo "<td id=permbook".$row["username"].">" . $permBooks . "</td>";
                echo "<td id=permcat".$row["username"].">" . $permCategories . "</td>";
                echo "<td id=permusr".$row["username"].">" . $permUsers . "</td>";
                echo "<td id=btn".$row["username"]."> ". $_GET['btn'] ." </td>";
                echo "</tr>";
            }
            $lastid++;
            
        }
        $_SESSION['UserLastId'.$_GET['table']] = $lastid;
    } else {
        echo "<tr>";
        echo "<td colspan=7> No users </td>";
        echo "</tr>";
    }
?>