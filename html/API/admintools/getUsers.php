<?php
    include('../../../phplibraries/database.php');
    $con = mysqli_connect(DBHOST, DBUSR, DBPASSWD, DBNAME) or die('Unable To connect');
    $result = mysqli_query($con,"SELECT * FROM login_data");
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td> " . $row["ID"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["permission_books"] . "</td>";
            echo "<td>" . $row["permission_categories"] . "</td>";
            echo "<td>" . $row["permission_users"] . "</td>";
            echo "<td> <button type=\"button\" onclick=\"alert('WIP')\"><i class=\"bi bi-pencil-square\"></i>Editar</button> </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td colspan=7> No users </td>";
        echo "</tr>";
    }
?>