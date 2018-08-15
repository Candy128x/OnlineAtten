<?php
include "conn2.php";

$sql = "UPDATE atttab SET pass='$_POST[pass]' WHERE idNo=$_POST[idNo]";

if (mysqli_query($conn, $sql)) {
    print "Record updated successfully";
} else {
    print "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

header("refresh:0; url=../index.html");

?>