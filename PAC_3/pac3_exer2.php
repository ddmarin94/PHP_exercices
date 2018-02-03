<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//ES"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="ES" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<title>PAC3 Figures escurabutxaques</title>
		<style type="text/css">
		  body {background-color: #e9c299;}
		</style>
</head>
<body>
<h3>Figures escurabutxaques</h3>
<h3>David Marín</h3>
<div>

<?php
// Per si no funciona el meta per a l'escriptura de car�cters especials:
header("Content-Type: text/html; charset=ISO-8859-1");
   	
	/************* FUNCTION *************/
	//Aqu� va el codi de les funcions

	function LF()
	{ //line feed
		print "<br />";
	}
	
	function escullFigura(){
		$figura = rand(1,6);
		return $figura;
	}

	
	function mostraFigura($figura){
		print "<img src='$figura.jpg'>";
	}

		
	function juga($tiradas){
		$resultats = array ();			// Cont� les figures obtingudes.
		
		// Escollim les figures del jugador.
		for($i = 0; $i < $tiradas; $i++)
			$resultats[$i] = escullFigura();

		return $resultats;
	}

	function mostraJugada($jugada, $jugador, $torns, $resultat){
		print "Jugador ".($jugador+1).": ";
		// Fem un recorregut per la taula de taules en la posici�
		// del jugador $jugador i llegim els seus torns.
		for($i = 0; $i < $torns; $i++)
			mostraFigura($jugada[$jugador][$i]);
		print " Resultat = $resultat.";
		LF();
	}
	
	function avaluaJugada($jugada, $jugador, $torns){
		$resultat = 0;		// Resultat dels torns d'un jugador.
		for($i = 0; $i < $torns; $i++){
			$resultat += $jugada[$jugador][$i];
		}
		return $resultat;
	}
	
/* ALGORISME PRINCIPAL */

	// La declaraci� de les constants.
	define("N_TORNS", 4);
	define("N_JUGADORS", 3);
	
	// Declaraci� de les variables.
	$tornsJugadors = array();
	$resultatsJugadors = array();
	$guanyadors= "";

	// Cada jugador escull les figures en els seus torns...
	for($i = 0; $i < N_JUGADORS; $i++)
		$tornsJugadors[$i] = juga(N_TORNS);
		
	// Avaluem els resultats de cada jugador.
	for($i = 0; $i < N_JUGADORS; $i++)
		$resultatsJugadors[$i] = avaluaJugada($tornsJugadors, $i, N_TORNS);
	
	// Mostrem les jugades de cada jugador
	// i els seus resultats.
	for($i = 0; $i < N_JUGADORS; $i++)
		mostraJugada($tornsJugadors, $i, N_TORNS, $resultatsJugadors[$i]);
		
	// Mirem qui �s el o els guanyadors i els mostrem
	$millorResultat= 0;
	for($i = 0; $i < N_JUGADORS; $i++)
		if($resultatsJugadors[$i] > $millorResultat){
			$millorResultat= $resultatsJugadors[$i];
			$guanyadors= ($i+1);
		}
		elseif ($resultatsJugadors[$i] == $millorResultat)
			$guanyadors= $guanyadors." i ".($i+1);
	
	LF();
	print "<h3>Millor o millors jugadors/ers: ".$guanyadors;

?>

</div>
</body>
</html>