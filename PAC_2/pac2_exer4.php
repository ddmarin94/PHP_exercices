<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//ES"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="ES" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>PAC2 Exercici 4</title>
		<style type="text/css">
		  body {background-color: #0D0E06; color: #80D680;}
		</style>
</head>
<body>
<h3>Comptar vocals</h3>
<h3>David Marín</h3>
<div>
<?php
// Per si no funciona el meta per a l'escriptura de car�cters especials:
header("Content-Type: text/html; charset=ISO-8859-1");
   	
/* PRIMER EL M�DUL */
/* --------------- */
function comptarVocals($text, &$nA, &$nE, &$nI, &$nO, &$nU){
	// Declarem com a constant el car�cter que marca el final del text.
	define("FI_TEXT", '%');

	// En PHP no es declaren les variables. Simplement s'inicialitzen
	// si es convenient. La posici� del primer car�cter del text �s 1.
	$posicioCaracter = 0;
	
	// Inicialment no hem comptabilitzat cap vocal.
	$nA = 0;
	$nE = 0;
	$nI = 0;
	$nO = 0;
	$nU = 0;
	
	// Llegim el text car�cter a car�cter fins arribar al final (�%�).
	while( !($text[$posicioCaracter] == FI_TEXT) ){
		// Examinamem si el car�cter que hi ha a la posici� actual 
		// �s una vocal.
		if($text[$posicioCaracter] == 'a')
			$nA = $nA + 1;
		elseif($text[$posicioCaracter] == 'e')
			$nE = $nE + 1;
		elseif($text[$posicioCaracter] == 'i')
			$nI = $nI + 1;	
		elseif($text[$posicioCaracter] == 'o')
			$nO = $nO + 1;
		elseif($text[$posicioCaracter] == 'u')
			$nU = $nU + 1;
		// Pasem al car�cter seg�ent.
		$posicioCaracter = $posicioCaracter + 1;
	}
}

function mostrarVocals($nA, $nE, $nI, $nO, $nU){
	
	// Mostrem els resultats.
	print("A: $nA <br />E: $nE <br />I: $nI <br />O: $nO <br />U: $nU <br />");
	print("La vocal m�s repetida ha estat la: ");
	// Calcular la vocal m�s repetida
	switch (max($nA, $nE, $nI, $nO, $nU)) {
		case $nA:
			echo "A";
			break;
		case $nE:
			echo "E";
			break;
		case $nI:
			echo "I";
			break;
		case $nO:
			echo "O";
			break;
		case $nU:
			echo "U";
			break;
	}
	
	
}


/* ALGORISME PRINCIPAL */
/* ------------------- */	
// Llegim el texto de l'entrada est�ndard.
$filename = $_GET["filename"];
include ($filename);
print("El text �s: ".$text."<br /><br />");

// Cridem els m�duls.
comptarVocals($text, $nA, $nE, $nI, $nO, $nU);
mostrarVocals($nA, $nE, $nI, $nO, $nU);

?>
</div>
</body>
</html>