<?php

function viewEntries() {
    
    $con = con2SQL();

    $result = mysqli_query($con, "SELECT * FROM Entry");
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {

        echo " <tr> ";
        echo " <td> </td>";
        echo " <td>" . htmlentities($row["id"]) . "</td> ";
        echo " <td>" . htmlentities($row["address"]) . "</td> ";
        echo " <td>" . htmlentities($row["propertyType"]) . "</td> ";
        echo " <td>" . htmlentities($row["price"]) . "</td> ";
        echo " </tr> ";

        $count = $count + 1;
    }
    mysqli_free_result($result);
    endCon2SQL($con);
}
?>