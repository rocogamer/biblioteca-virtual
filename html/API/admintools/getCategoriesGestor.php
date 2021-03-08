<?php
    session_start();
    include('../../../phplibraries/database.php');
    if (isset($_SESSION['ID']) && isset($_SESSION['username']) && isset($_SESSION['categoriespermission']) && $_SESSION['categoriespermission']) {
        $con = mysqli_connect(DBHOST, DBUSR, DBPASSWD, DBNAME) or die('Unable To connect');
        if (isset($_POST['i'])) {
            $result = mysqli_query($con,"SELECT * FROM categorias WHERE ID>".$_POST['i']);
        } else {
            $result = mysqli_query($con,"SELECT * FROM categorias");    
        }
        
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr id=row_".$row["Nombre"]."_".$_POST['table'].">";
                echo "<td id=id_".$row["Nombre"]."_".$_POST['table']."> " . $row["ID"] . "</td>";
                echo "<td id=nombre_".$row["Nombre"]."_".$_POST['table'].">" . $row["Nombre"] . "</td>";
                echo "<td class=\"align\" id=btn_".$row["Nombre"]."_".$_POST['table']."> ". $_POST['btn'] ." </td>";
                echo "</tr>";
                $lastid++;
            }
            $_SESSION['CategoriesLastId'.$_POST['table']] = $lastid;
        } else {
            echo "<tr>";
            echo "<td colspan=3> No categories </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td colspan=3> Access denied </td>";
        echo "</tr>"; 
    }
?>