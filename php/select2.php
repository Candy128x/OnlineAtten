<?php

include "conn2.php";
include'../css/sty3.css';

echo "<table border=1 width=100% class='sortable font1'>
	<tr>
		<th> ID No. </th>
		<th> Date </th>
		<th> Day </th>
		<th> Time </th>
		<th> Event </th>
	</tr>";

$sql = "SELECT idNo, DATE(date) as datc, day, time, attP FROM atttab WHERE idNo=$_POST[idNo] ORDER BY date ASC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
		echo "<td>".$row['idNo']."</td>";
		echo "<td>".$row['datc']."</td>";
		echo "<td>".$row['day']."</td>";
		echo "<td>".$row['time']."</td>";
		echo "<td>".$row['attP']."</td>";
		echo "</tr>";
	}
	echo "</table><br>";
} else {
    print " 0 results <br> Enter Valid Query... :( ";
		echo '<script type="text/javascript">alert(" Enter Valid ID No... :( ");</script>';
		//header("refresh:0; url=../index.html");
		exit;
}


mysqli_close($conn);

//header("refresh:20; url=../index.html");
?>