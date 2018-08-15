<?php

// Verification with user name & password

include "conn2.php";

$id = $_POST["idNo"];
$pass = $_POST["pass"];

$var2 = "SELECT pass2 FROM atttab2 WHERE idNo2=$id;";
$var3 = "SELECT idNo2 FROM atttab2 WHERE pass2='$pass';";

$result2 = mysqli_query($conn, $var2);

if (mysqli_num_rows($result2) > 0) 
{
    // output data of each row
    while($row2 = mysqli_fetch_assoc($result2)) 
	{
        $pass2c = $row2['pass2'];
    }
} 
else 
{
    //print " 0 results 1 <br> Enter Valid Query... :( ";
}
		


$result3 = mysqli_query($conn, $var3);

if (mysqli_num_rows($result3) > 0) 
{
    // output data of each row
    while($row3 = mysqli_fetch_array($result3)) 
	{
        $id2c = $row3['idNo2'];
    }
} 
else 
{
    //print " 0 results 2 <br> Enter Valid Query... :( ";
}

	//print "<br> $id";
	//print "<br> from db $pass2c";
	//print "<br> $pass";
	//print "<br> from db $id2c";

if(( strcmp($id, $id2c)==0 )&&( strcmp($pass, $pass2c)==0 ))
{
	//print "<br> Enter in if condition loop";
	//print "$id";
	//print "$var3";
	//print "$pass";
	//print "$var2";
	
	
	// sql to delete a record
	$sql = "DELETE FROM atttab WHERE idNo=$id";
	if (mysqli_query($conn, $sql)) 
	{
		//print "Record deleted successfully";
	} 
	else 
	{
		//print "Error deleting record: " . mysqli_error($conn);
	}

	
	//print "<br> correct";
	echo '<script type="text/javascript"> alert(" Recored Deleted from DB :) "); </script>';
		//header("refresh:0; url=../index.html");
		exit;
}
else
{
 //print "<br> not correct";
 echo '<script type="text/javascript">
		alert(" Retry... You type Invalid ID No & Password !");
		</script>';
	//header("refresh:0; url=../index.html");
	exit;

}


mysqli_close($conn);

//header("refresh:0; url=../index.html");
?>