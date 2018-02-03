<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//ES"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="ES" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PAC 1 Exercici 5</title>
		<style type="text/css">
		  body {background-color: #0D0E06; color: #80D680;}
		</style>
</head>
<body>
<h3>PAC 1: Exercici 5</h3>
<h3>David Marín</h3>

<?php

	// // Declaració de les constants.
	define("MAX", 100);

	$c = 0;
	// Llegim el número.
	$valor = $_GET["v"];

	for ($i = 1; $i < MAX; $i++){

		$num = $i;
		$q = 0;

		while ($num > 0){
			if ($num % 10 == $valor){
				$q = $q + 1;
			}
			// L’expressión (int) davant d’un valor o del 
			// resultat d’altra expressió, converteix el resultat 
			// en un enter. És una forma de fer la divisió entera en PHP
			$num = (int)($num / 10);
		}
		if ($q > 1){
			$c = $c + 1;
		}
	}		
	print "N'hi Ha ".$c." números que contenen dos o més ".$valor;

?>
