<?php
    include('../../../phplibraries/database.php');
    $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWD,$DB_DB) or die('Unable To connect');
    $result = mysqli_query($con,"SELECT * FROM log_actions");
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<td> " . $row["ID"]. "</td> <td>" . $row["action"]. "</td> <td>" . $row["user"]. "</td> <td>" . $row["date"] . "</td>";
        }
    } else {
       echo "No logs";
    }
?>