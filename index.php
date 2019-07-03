<?php

/*include 'src/Cricket.php';
include 'src/Football.php'; 
*/

include 'vendor/autoload.php';

// include 'vendor/mpdf/mpdf/src/Mpdf.php';

use App\Cricket;
use App\Football;
use App\Connection;


/*
echo Cricket::getName();

echo "<br>";
echo Football::getFoot();
*/

/*
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();
*/

$u=new Connection;
$res=$u->getAll("select * from avenger",null);
//print_r($res);

$data="";
foreach($res as $r){
	
$data .="<tr>";
$data .="<td>".$r['name']."</td><td>".$r['power']."</td>";
$data .="</tr>";


}




$htmlTemplate = 
<<<CTPDF
	<!DOCTYPE html>
		<html>
		<head>
			<title></title>
		</head>
		<body>
			<table style='width:100%;' border='1'>
				
				$data;
			</table>
		</body>
		</html>	
CTPDF;




$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($htmlTemplate);
$mpdf->Output();


?>