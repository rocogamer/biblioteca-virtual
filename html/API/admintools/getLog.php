<?php
    session_start();
    include('../../../phplibraries/database.php');
    if (isset($_SESSION['ID']) && isset($_SESSION['username'])) {
        $con = mysqli_connect(DBHOST, DBUSR, DBPASSWD, DBNAME) or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM log_actions ORDER BY ID DESC LIMIT 50");
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td> " . $row["ID"] . "</td>";
                echo "<td>" . $row["action"] . "</td>";
                echo "<td>" . $row["user"] . "</td>";
                echo "<td>" . $row["date"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<td colspan=4> No logs </td>";
            echo "</tr>";
        }
    }
    else {
        echo "<tr>";
        echo "<td colspan=4> Acces deneied </td>";
        echo "</tr>";
    }
?>