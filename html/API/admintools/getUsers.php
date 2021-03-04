<?php
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
            $permBooks = $row["permission_books"] ? "Si" : "No";
            $permCategories = $row["permission_categories"] ? "Si" : "No";
            $permUsers = $row["permission_users"] ? "Si" : "No";
            echo "<tr>";
            echo "<td> " . $row["ID"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $permBooks . "</td>";
            echo "<td>" . $permCategories . "</td>";
            echo "<td>" . $permUsers . "</td>";
            echo "<td> ". $_GET['btn'] ." </td>";
            echo "</tr>";
            $lastid++;
        }
        $_SESSION['UserLastId'.$_GET['table']] = $lastid;
    } else {
        echo "<tr>";
        echo "<td colspan=7> No users </td>";
        echo "</tr>";
    }
?>