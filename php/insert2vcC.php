<?php

// Verification with user name & password

include "conn2.php";

$id = $_POST["idNo"];
$pass = $_POST["pass"];
$attP3 = ($_POST["attP2c"]);

$date = date_default_timezone_set('Asia/Kolkata');
$day3 = date("l"); 
$date3b = date('Y-m-d');
//print "<br>".$date3b;
$time3 = date('H:i:s');
//print "<br>".$time3;

//$hostname = ($_SERVER['REMOTE_ADDR']);
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    //print '<br> Your Ip Address is '.$ip;
$hostname = $ip ;
//print "<br> 2b ".$hostname ;

$branch4 = "Xie";
$fb4 = "Good";
//print "<br> $fb4 <br>";


//verify id & pass

$var2 = "SELECT pass2 FROM atttab2 WHERE idNo2=$id;";
$var3 = "SELECT idNo2 FROM atttab2 WHERE pass2='$pass';";


$result2 = mysqli_query($conn, $var2);

if (mysqli_num_rows($result2) > 0) 
{
    // output data of each row
    while($row2 =mysqli_fetch_assoc($result2)) 
	{
        $pass2c = $row2['pass2'];
    }
} 
else 
{
    //print " 0 results 1 <br> Enter Valid Query... :( ";
	echo '<script type="text/javascript"> alert(" Retry... You Enter Invalid ID No & Password ! 03a"); </script>';
	//header("refresh:0; url=../index.html");
	exit;
}


$result3 = mysqli_query($conn, $var3);

if (mysqli_num_rows($result3) > 0) 
{
    // output data of each row
    while($row3 = mysqli_fetch_assoc($result3)) 
	{
        $id2c = (int) $row3['idNo2'];
    }
} 
else 
{
    //print " 0 results 2 <br> Enter Valid Query... :( ";
	echo '<script type="text/javascript"> alert(" Retry... You Enter Invalid ID No & Password ! 03b"); </script>';
	//header("refresh:0; url=../index.html");
	exit;
}


if(!(( strcmp($id, $id2c)==0 ) && ( strcmp($pass, $pass2c )==0 )))
{
	//print "<br> not correct 02b";
	echo '<script type="text/javascript"> alert(" Retry... You Enter Invalid ID No & Password ! 02b"); </script>';
	//header("refresh:0; url=../index.html");
	exit;
}



// cmp sat or sun

if((strcmp($day3, 'Saturday')==0) || (strcmp($day3,'Sunday')==0))
{
//print "Today Holiday :)";	
echo '<script type="text/javascript"> alert(" Today Holiday ;)  "); </script>';
//header("refresh:0; url=../index.html");
exit;
}


// time limit 

$tme3c = date('H');
if(!( (($tme3c)>=8) && (($tme3c)<=17) ))
{
	//print "not eli";
	//print "time limit expired !";
	echo '<script type="text/javascript"> alert(" You Dont be able to mark Presenty, \n Becoz Time limit Expired :( "); </script>';
	//header("refresh:0; url=../index.html");
	exit;
}
else
{
	//print "eli";
}



//verify date
//vadharanu
$var4 = "SELECT date FROM atttab WHERE idNo=$id;";

$result4 = mysqli_query($conn, $var4);

if (mysqli_num_rows($result4) > 0) 
{
    // output data of each row
    while($row2 = mysqli_fetch_assoc($result4)) 
	{
        $date2c = $row2['date'];
		//print "<br>".$date2c."<br>";
    }
} 
else 
{
    //print " 0 results 3 <br> Enter Valid Query... :( ";
}


if(strcmp($date3b,$date2c)==0)
{
	//print "etad err0";
}	
else
{
	//print "etad err1";
}	



// inspecct ipAdd

$var7 = "SELECT idNo, COUNT(*) AS iacc FROM atttab WHERE date='$date3b' AND ipAdd='$hostname'";

$result7 = mysqli_query($conn, $var7);

if (mysqli_num_rows($result7) > 0) 
{
    // output data of each row
    while($row7 = mysqli_fetch_assoc($result7)) 
	{
		//print "<br> ipget ".$hostname." <br>";
        $iacc2 = $row7['iacc'];
		//print "<br> ipAdd cc ".$iacc2."<br>";
    }

} 
else 
{
    //print " 0 results 7 <br> Enter Valid Query... :( ";
}


$var7d = "SELECT idNo FROM atttab WHERE date='$date3b' AND ipAdd='$hostname'";

$result7d = mysqli_query($conn, $var7d);

if (mysqli_num_rows($result7d) > 0) 
{
    // output data of each row
    while($row7d = mysqli_fetch_assoc($result7d)) 
	{
        $iacc2d = $row7d['idNo'];
		//print "<br> row7d cc ".$iacc2d."<br>";
    }

	
} 
else 
{
    //print " 0 results 7d <br> Enter Valid Query... :( ";
}


$var7de = "SELECT attP FROM atttab WHERE date='$date3b' AND idNo=$id";

$result7de = mysqli_query($conn, $var7de);

if (mysqli_num_rows($result7de) > 0) 
{
    // output data of each row
    while($row7de = mysqli_fetch_assoc($result7de)) 
	{
        $iacc2de = $row7de['attP'];
		//print "<br> row7de cc ".$iacc2de."<br>";
    }

	
} 
else 
{
    //print " 0 results 7d <br> Enter Valid Query... :( ";
}

// verify

if( (($iacc2)>=1) )// count ipadd
{
	//print "<br> Don't Marks Other Presenty :( 02b ";
	echo '<script type="text/javascript"> a lert(" Dont Marks OtherPresenty :( "); </script>';
	//header("refresh:0; url=../index.html");
	exit;

if( (strcmp($iacc2d,$id)==0) ) // cmp idno
{
	//print "<br> one id two Entry :)";
	echo '<script type="text/javascript"> a lert(" one id two Entry 02b	 :) "); </script>';

if( (!(strcmp($iacc2de,$attP3)==0)) ) //Entry | Exit
{
	//print "<br> Entry | Exit cmp :)";
	echo '<script type="text/javascript"> a lert(" eli to Entry | Exit	 :) "); </script>';
	
}
else
{
	//print "<br> 0 results 7 3if c \n already you mark ".$attP3." presenty !";
}
}
else
{
	//print "<br> 0 results 7 3if b \n dont mark other presenty !";
}
}
else
{
	//print "<br> 0 results 7 3if a" ;
}



//verify attP(Event)
//vadharanu

$var5 = "SELECT attP FROM atttab WHERE idNo=$id";

$result5 = mysqli_query($conn, $var5);

if (mysqli_num_rows($result5) > 0) 
{
    // output data of each row
    while($row2 = mysqli_fetch_assoc($result5)) 
	{
        $event2c = $row2['attP'];
		//print "<br>".$event2c."<br>";
    }
} 
else 
{
    //print " 0 results 4 <br> Enter Valid Query... :( ";
}


// count event Enter / //exit

if(strcmp($attP3,'Enter')==0)
{

$var6 = "SELECT attP, COUNT(*) AS aaf FROM atttab WHERE idNo=$id AND date='$date3b' AND attP='Enter'";

$result6 = mysqli_query($conn, $var6);	

if (mysqli_num_rows($result6) > 0) 
{
    // output data of each row
    while($row6 = mysqli_fetch_assoc($result6)) 
	{
		//print "<br> 06 etad 02b";
		$event2ce = $row6['aaf'];
		//print "<br>".$event2ce."<br>";
    }
} 
else 
{
    //print " 0 results 6 <br> Enter Valid Query... :( ";
}


if(($event2ce)>=1)
{
	//print "<br> you already mark Enter event";
	echo '<script type="text/javascript"> alert(" You already Mark Enter Presenty :) "); </script>';
	//header("refresh:0; url=../index.html");
	exit;
}

}
else
{

$var6e2 = "SELECT attP, COUNT(*) AS aaf FROM atttab WHERE idNo=$id AND date='$date3b' AND attP='//exit'";

$result6e2 = mysqli_query($conn, $var6e2);	

if (mysqli_num_rows($result6e2) > 0) 
{
    // output data of each row
    while($row62 = mysqli_fetch_assoc($result6e2)) 
	{
		//print "<br> 06 etad 02b e2 ";
		$event2cee2 = $row62['aaf'];
		//print "<br>".$event2cee2."<br>";
    }
} 
else 
{
    //print " 0 results 6 e2 <br> Enter Valid Query... :( ";
}


if(($event2cee2)>=1)
{
	//print "<br> you already mark //exit event";
	echo '<script type="text/javascript"> alert(" You already Mark //exit Presenty :) "); </script>';
	//header("refresh:0; url=../index.html");
	exit;
}

}

// verify id & pass
// that code above


// insert data in db

	//print "<br> $id";
	//print "<br> from db $pass2c";
	//print "<br> $pass";
	//print "<br> from db $id2c";
	

if(( strcmp($id, $id2c)==0 )&&( strcmp($pass, $pass2c )==0 ))
{
	//print "<br> Enter in if condition loop";
	//print "$id";
	//print "$var3";
	//print "$pass";
	//print "$var2";
	
	$sql = "INSERT INTO atttab (idNo, pass, date, day, time, ipAdd, attP, branch)
	VALUES ('$id', '$pass', '$date3b', '$day3', '$time3', '$hostname', '$attP3', '$branch4')";
		
	if (mysqli_multi_query($conn, $sql)) 
	{
		//print " Your Current Recored Added in DB :) ";
		
	} 
	else 
	{
		//print " Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
 //print "<br> correct";
 //echo '<script type="text/javascript"> alert(" Your Current Recored Added in DB "); </script>';
 echo '<script type="text/javascript"> alert(" Yup ! Successfully Enter Your Data :) "); </script>';
 exit;
}
else
{
 //print "<br> not correct";
 echo '<script type="text/javascript"> alert(" Retry... You Enter Invalid ID No & Password !"); </script>';
 exit;
}

mysqli_close($conn);

//header("refresh:0; url=../index.html");

//header("Refresh:0; url=../index.html");

?>