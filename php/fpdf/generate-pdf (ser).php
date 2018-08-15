<?php
require('mysql_table.php');
class PDF extends PDF_MySQL_Table
{
function Header()
{
	$this->Image('logo.jpg',56,7,18);
	$this->SetFont('Arial','',24);
	$this->Cell(0,7,'Xie Attendence',0,1,'C');
	$this->Ln(10);
	//Ensure table header is output
	parent::Header();
}

function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','I',10);
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'R');
}
}
//Connect to database
mysql_connect('fdb6.biz.nf','2221790_att','XieAshish007');
mysql_select_db('2221790_att');
$pdf=new PDF();
$pdf->AddPage();
//First table: put all columns automatically
//public $idNoP;
//$pdf->MultiCell(0,10,'$idNoP2',0,'J');
$idNoP2 = $_POST['idNo'];
//$idNoP2 = '1672';
//echo "<br> $idNoP2 <br>";

$query ="SELECT idNo, date, day, time, attP from atttab WHERE idNo=$_POST[idNo] order by date";

$pdf->Table($query);
//Second table: specify 3 columns
$pdf->AddCol('idNo',40,'','C');
$pdf->AddCol('date',40,'atttab','C');
$pdf->AddCol('day',40,'','C');
$pdf->AddCol('time',40,'','C');
$pdf->AddCol('attP',40,'','C');
//$pdf->AddCol('info',40,'','C');
//$pdf->Output("C:\Users\John\Desktop/somename.pdf",'F'); 
header('Content-type: projekter/pdf');
$pdf->Output('XieAttendence'.".pdf", 'D'); 
//header('Location: '.projekter.".pdf");
?>