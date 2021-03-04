<?php
    include('../../../phplibraries/database.php');
    $con = mysqli_connect(DBHOST, DBUSR, DBPASSWD, DBNAME) or die('Unable To connect');
    if (count($_GET)>0) {
        $result = mysqli_query($con,"SELECT * FROM login_data WHERE ID>".$_GET['i']);
    } else {
        $result = mysqli_query($con,"SELECT * FROM login_data");
        $lastid = 0;
    }
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td> " . $row["ID"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["permission_books"] ? "Si" : "No" . "</td>";
            echo "<td>" . $row["permission_categories"] ? "Si" : "No" . "</td>";
            echo "<td>" . $row["permission_users"] ? "Si" : "No" . "</td>";
            echo "<td> <button class=\"btn btn-success\" type=\"button\" onclick=\"alert('WIP')\"><i class=\"bi bi-pencil-square\"></i>Editar</button> </td>";
            echo "</tr>";
            $lastid++;
        }
        $_SESSION['UserLastId'] = $lastid;
    } else {
        echo "<tr>";
        echo "<td colspan=7> No users </td>";
        echo "</tr>";
    }
?>