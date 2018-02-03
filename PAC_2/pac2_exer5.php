<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//ES"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="ES" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>PAC2 Exercici 5</title>
		<style type="text/css">
		  body {background-color: #0D0E06; color: #80D680;}
		</style>
</head>
<body>
<h3>Calcular nomina</h3>
<h3>David Marín</h3>
<div>
<?php
// Per si no funciona el meta per a l'escriptura de caràcters especials:
header("Content-Type: text/html; charset=ISO-8859-1");
	// DECLARACIÓ DE LES CONSTANTS GENERALS.
	
	define ( "IRPF", 15.0);
	define ( "LIMIT_SALARIAL", 1000.0);

	/* PRIMER ELS MòDULS */
	function calcRetencio($salariBrut){
		return ($salariBrut*IRPF)/100;
	}
	
	function calcSalariNet($salariBrut,$retencio){
		return $salariBrut - $retencio;
	}

	/* ALGORISME PRINCIPAL */
	$preuHora = $_GET["pH"];
	$horesLaborals = $_GET["hL"];

	$salariBrut = $preuHora * $horesLaborals;
	$retencio = calcRetencio($salariBrut);
	$salariNet = calcSalariNet($salariBrut,$retencio);

	if ($salariNet <= LIMIT_SALARIAL){
		print ("Salari brut: ".$salariBrut."<br />");
		print ("Retencio: ".$retencio."<br />");
		print ("Salari net: ".$salariNet."<br />");
	}else{
		print ("Salari net: ".$salariNet."<br />");
	}
?>
</div>
</body>
</html>	
	