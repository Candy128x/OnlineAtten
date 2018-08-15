<?php
//  add new user name & password in atttab db
include "conn2.php";

$id2 = $_POST["idNo2b"];
$pass2 = $_POST["pass2b"];
$pass23 = $_POST["pass2b3"];
$dob3 = $_POST["dateDOB2"];
$email3 = $_POST["email2"];
$mob3 = $_POST["mob2"];

if(strcmp($pass2, $pass23) == 0)
{
	
	$sql = "INSERT INTO atttab2 (idNo2, pass2, DOB, email, mob)
	VALUES ('$id2', '$pass2', '$dob3', '$email3', '$mob3')";
		
	if (mysqli_multi_query($conn, $sql)) 
	{
		//print "<br> New records Added in DataBase Successfully :) ";
	} 
	else 
	{
		//print "<br> Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
 //print "<br> correct";
 echo '<script type="text/javascript">alert(" New Recored Added in DB ;) ");</script>';
 //header("refresh:0; url=../index.html");
 exit;

}
else
{
 //print "<br> not correct";
 echo '<script type="text/javascript">
		alert(" Retry... You Added Invalid ID No & Password !");
		</script>';
 //header("refresh:0; url=../index.html");
 exit;
}

mysqli_close($conn);
//header("refresh:0; url=../index.html");
?>