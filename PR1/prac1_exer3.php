<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//ES"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="ES" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>PR 1 - Exer. 3</title>
	<style type="text/css">
		body {background-color: #0D0E06; color: #80D680;}
	</style>
</head>
<body>
<h3>M�quina Escurabutxaques</h3>
<h3>David Marín</h3>
<div>

<?php
   	
	/************ FUNCI� *************/ 
	function putImg($imatge_file){ 	// pintar la imatge 
	 	print "<img src=".$imatge_file.".jpg>";
	}

	/************ FUNCI� *************/ 
	function NL(){ 			// nova l�nia
		print "<br />";
	}

	/************ FUNCI� *************/ 
	function detectFruit($string, $pos){
		$fruit = "0";
		switch ($string[$pos])	{
			case 'c': if (substr_compare($string, "cherry", $pos, 6)==0) $fruit="cherry";
				break;	
			case 'g': if (substr_compare($string, "grapes", $pos, 6)==0) $fruit="grapes";
				break;
			case 'l': if (substr_compare($string, "lemon", $pos, 5)==0) $fruit="lemon";
				break;			 
			case 'o': if (substr_compare($string, "orange", $pos, 6)==0) $fruit="orange";
				break;
			case 'p': if (substr_compare($string, "plum", $pos, 4)==0) $fruit="plum";
				break;						 
			case 's': if (substr_compare($string, "seven", $pos, 5)==0) $fruit="seven";						 		
		}
		return ($fruit);
	}		
	
	/*********** PROGRAMA PRINCIPAL ************/
  	if (isset($_GET["filename"])){
		// carregar el fitxer de text extern
   		$filename=$_GET["filename"];
		include($filename);
			
		// el fitxer de text cont� la assignaci� de la variable $cadena
		$long=strlen($cadena);  //$long cont� la mida de $cadena
		$long -=3; 			// en les �ltimes 3 posicions no pot haver-hi cap coincid�ncia
		for ($i=0; $i<$long; $i++){
			$fruit = detectFruit($cadena, $i);		
			if ($fruit!="0") putImg($fruit);
		}
	}else{
		print "Falta el nom de l'arxiu de dades";
		NL();
		print "La crida �s del tipus <b>prac1_exer3.php?filename=<i>nom_arxiu</i></b>";
	}		
?>


</div>
</body>
</html>