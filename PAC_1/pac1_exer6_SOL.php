<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//ES"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="ES" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PAC1 Exercici 6</title>
		<style type="text/css">
		  body {background-color: #0D0E06; color: #80D680;}
		</style>
</head>
<body>
<h3>Màquina escurabutxaques</h3>
<h3>David Marín</h3>

<?php

define ( "BET", 0.5);
$capitalInicial = (int)$_GET["capital"];
$actualCap = $capitalInicial;
 
$joc = 0;
print "<h3>Capital inicial: $capitalInicial </h3>";

while (($actualCap >= BET) && ($actualCap < $capitalInicial * 2)){
  		$uno = rand(1,9);
		$dos = rand(1,9);
		$tres = rand(1,9);
	
		$joc++;
	
		print "<h3> joc $joc </h3>";
	
		for ($i=0; $i<3; $i++){
	  			// seleccionar tirada
				if ($i == 0) $test = $uno;
					else if ($i == 1) $test = $dos;
		   			else $test = $tres;
	  			// seleccionar nom imatge
				switch ($test)	{
						case 1: $imatge = "campana"; break;
						case 2: $imatge = "cereza"; break;
						case 3: $imatge = "ciruela"; break;
						case 4: $imatge = "diamante"; break;
						case 5: $imatge = "limon"; break;
						case 6: $imatge = "naranja"; break;
						case 7: $imatge = "racimo"; break;
						case 8: $imatge = "trebol"; break;
						case 9: $imatge = "siete";			
				}// del switch
		
				print "<img src='$imatge.jpg'>";
		}// del for
	
		$guany = 0;
		if (($uno == $dos) && ($uno == $tres)){ 
	  			if ($uno == 9) $guany = BET * 100;
					else $guany = BET * 6;
		}else if (($uno == $dos) || ($uno == $tres) || ($dos == $tres)){
			   if (($uno + $dos == 18) || ($uno + $tres == 18) || ($dos + $tres == 18)) $guany = BET * 4;
				 		else $guany = BET * 2;
		}
	
		$actualCap += ($guany - 0.5);
		print "<br />guany: <b>$guany</b>. Capital actual: $actualCap";
}//del while
 
print "<h3>";
if ($actualCap >= $capitalInicial) print "Has guanyat!";
 	else print "Has perdut!";
print "</h3>";		

?>


