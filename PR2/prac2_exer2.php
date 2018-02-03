<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//ES"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="ES" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pr�ctica2 Pescaminas</title>
		<style type="text/css">
		  body {background-color: #0D0E06; color: #80D680;}
		</style>
</head>
<body>
<h3>Pr�ctica2 Pescaminas</h3>
<h3>David Marín</h3>
<div>
<?php
// Per si no funciona el meta per a l'escriptura de car�cteres especials:
header("Content-Type: text/html; charset=ISO-8859-1");

	/************* FUNCTION *************/
	//Aqu� va el codi de les funcions
	function LF(){ 	//line feed
		print "<br />";
	}
	
	function createTable($height, $width){ 	//creates a table heigth X width inizialized to 0
		for ($i=0; $i < $height; $i++)
			for ($j=0; $j < $width; $j++)
				$table[$i][$j]=0;
		return $table;
	}//de createTable
	
	function loadMinefieldData(&$minefield, $data){
		$height = count($minefield);
		$width = count($minefield[0]);
		$longData = (int)count($data)/2;
		for ($i=0; $i < $longData; $i++){
			$x = array_shift($data);
			$y = array_shift($data);
			for($j=-1; $j<2; $j++)
				for($k=-1; $k<2; $k++)
					if (($x+$j>-1)&&($x+$j<$height)&&($y+$k>-1)&&($y+$k<$width)&&$minefield[$x+$j][$y+$k]!=9) 
						$minefield[$x+$j][$y+$k]++;
			$minefield[$x][$y] = 9;
		}
	}//de loadMinefieldData
	
	function putCell($n){
		print "<img src='$n.png'>";
	}
	
	function drawLine($in){
		$long = count($in);
		for ($i=0; $i < $long; $i++) putCell($in[$i]);
		LF();
	}//de drawLine
	
	function drawMinefield($in){
		$long = count($in);
		for ($i=0; $i < $long; $i++) drawLine($in[$i]);
	}//de drawMinefield
	
	
	/************* MAIN *************/	
	//Codi del programa principal	
	
	$filename = $_GET["filename"];
	include($filename);
	$data = explode(" ",$cadena);
	
	$height = array_shift($data);
	$width = array_shift($data);
	
	$table = createTable($height, $width);
	
	loadMinefieldData($table, $data);
	drawMinefield($table);
?>

</div>
</body>
</html>