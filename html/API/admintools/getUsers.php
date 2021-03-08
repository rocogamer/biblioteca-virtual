<?php
    session_start();
    include('../../../phplibraries/database.php');
    if (isset($_SESSION['ID']) && isset($_SESSION['username']) && isset($_SESSION['userspermission']) && $_SESSION['userspermission']) {
        $con = mysqli_connect(DBHOST, DBUSR, DBPASSWD, DBNAME) or die('Unable To connect');
        if (isset($_POST['i'])) {
            $result = mysqli_query($con,"SELECT * FROM login_data WHERE ID>".$_POST['i']);
        } else {
            $result = mysqli_query($con,"SELECT * FROM login_data");
            $lastid = 0;
        }
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                if($row["ID"] != $_SESSION["ID"]){
                    if ($row["ID"] != 1) {
                        $permBooks = $row["permission_books"] ? "Si" : "No";
                        $permCategories = $row["permission_categories"] ? "Si" : "No";
                        $permUsers = $row["permission_users"] ? "Si" : "No";
                        echo "<tr id=row_".$row["username"]."_".$_POST['table'].">";
                        echo "<td id=id_".$row["username"]."_".$_POST['table']."> " . $row["ID"] . "</td>";
                        echo "<td id=name_".$row["username"]."_".$_POST['table'].">" . $row["name"] . "</td>";
                        echo "<td id=username_".$row["username"]."_".$_POST['table'].">" . $row["username"] . "</td>";
                        echo "<td id=permbook_".$row["username"]."_".$_POST['table'].">" . $permBooks . "</td>";
                        echo "<td id=permcat_".$row["username"]."_".$_POST['table'].">" . $permCategories . "</td>";
                        echo "<td id=permusr_".$row["username"]."_".$_POST['table'].">" . $permUsers . "</td>";
                        echo "<td class=\"align\" id=btn_".$row["username"]."_".$_POST['table']."> ". $_POST['btn'] ." </td>";
                        echo "</tr>";
                    }
                }
                $lastid++;
         }
            $_SESSION['UserLastId'.$_POST['table']] = $lastid;
        } else {
            echo "<tr>";
            echo "<td colspan=7> No users </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td colspan=7> Access denied </td>";
        echo "</tr>"; 
    }
?>