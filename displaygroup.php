<?php
include "expensemanagement/config.php";
session_start();
$sql = "SELECT gid, gname, gcdate, gadmin FROM groupt";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  $row["gid"]. " . " . $row["gname"]. "  " . $row["gcdate"]. "  " . $row["gadmin"]. "<br>";
    }
} else {
    echo "0 results";
}
$con->close();

?>