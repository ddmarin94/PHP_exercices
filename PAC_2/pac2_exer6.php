<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//ES"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="ES" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>PAC2 Exercici 6</title>
		<style type="text/css">
		  body {background-color: #0D0E06; color: #80D680;}
		</style>
</head>
<body>
<h3>Calcular canvi</h3>
<h3>David Marín</h3>

<?php
// Per si no funciona el meta per a l'escriptura de caràcters especials:
header("Content-Type: text/html; charset=ISO-8859-1");

	$compra = $_GET["c"];
	$pagat = $_GET["p"];

	$canvi;$canvi100;$canviRetornat;$q;
	$quinValor=0;
	$valors = array(50000,20000,10000,5000,2000,1000,500,200,100,50,20,10,5,2,1);
	
	print("La compra val: ".$compra."<br />");
	print("Import pagat: ".$pagat."<br />");

	if ($pagat<$compra) {
		print("Has d'aportar més diners! <br />");
	}else {
		$canvi=$pagat-$compra;
		print("canvi: ".$canvi);
		$canvi100=$canvi*100.0;
		$q=0;
		$quinValor=0;
		$canviRetornat=0;
		while(!$canviRetornat){
			if ($canvi100>=$valors[$quinValor]-0.1) {
				$q++;
				$canvi100=$canvi100-$valors[$quinValor];
			}else{
				if ($q>0) {
					if ($quinValor<7) {
						printf("<br />".$q." billet/s de ".($valors[$quinValor]/100)." euro/s");
					}
					if ($quinValor>=7 && $quinValor<=8) {
						printf("<br />".$q." moneda/es de ".($valors[$quinValor]/100)." euro/s");
					}
					if ($quinValor>8) {
						printf("<br />".$q." moneda/es de ".($valors[$quinValor])." centim/s");
					}
				}
				$q=0;
				$quinValor++;
				if ($canvi100<1) {
					$canviRetornat=1;
				}
			}
		}
	}

?>
</div>
</body>
</html>	
	