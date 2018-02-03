<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//ES"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="ES" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>PR 1 - Exer. 4</title>
	<style type="text/css">
		body {background-color: #0D0E06; color: #80D680;}
	</style>
</head>
<body>
<h3>Passejador de gossos</h3>
<h3>David Marín</h3>
<div>

<?php

	// Constants.
	define('FINAL_SEC', '#');
	
	// Acci� SALT de L�NIA.
	function LF(){ 
		print "<br />";
	}
	
	/* ALGORISME PRINCIPAL */
	$filename = $_GET["filename"];
	$gos = $_GET["gos"];
	include($filename);

	// Passem tots els car�cters a maj�scula.
	$text = strtoupper($cadena);
	$gos = strtoupper($gos);
	
	// Tractament inicial
	// ------------------
	// Mostrem la cadena i el nom del gos
	print ("Cadena: ".$text);LF();
	print ("Nom: ".$gos);LF();LF();

	$trobat=0;
	$posicioText=0;
	
	// Recorregut de la seq��ncia fins la marca final o fins que no trobem el gos.
	while(!($text[$posicioText] == FINAL_SEC) && !$trobat){
		$gosaux=" ";	
		$j=0;
		// Llegim el nom del gos de la cadena, car�cter a car�cter, fins arribar al car�cter �-�.
		// El guardem en la variable gosaux
		while(!($text[$posicioText] == '/')){
			$gosaux[$j]=$text[$posicioText];
			$j++;
			$posicioText++;
		}
		// Comprovem si el nom del gos ($gos) �s igual al nom del gos de la cadena que acabem de llegir (gosaux)
		if(strcmp($gos,$gosaux)==0){	
			if ($text[$posicioText+1]=='P'){
				printf($gos." ja ha sortit a passejar"); LF();
			}else{
				printf($gos." encara NO ha sortit a passejar"); LF();
			}
			$trobat=1;
		}
		// Desplacem el punter ($posicioText) dues posicions fins l'inicio del nom del seg�ent gos en la cadena.
		$posicioText=$posicioText+2;
		if(!($text[$posicioText]=='#')){
			$posicioText++;
		}
	}
	// Si el gos no es troba a la cadena, s'indica per pantalla.
	if(!$trobat) print "El gos no existeix.";

?>

</div>
</body>
</html>