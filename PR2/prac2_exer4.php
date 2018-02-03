<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//ES"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="ES" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pràctica 2 Bet Cards Game</title>
		<style type="text/css">
		  body {background-color: #0D0E06; color: #80D680;}
		</style>
</head>
<body bgcolor="white">
<h3>Bet Cards Game</h3>
<h3>David Marín</h3>
<div>
<?php
// Per si no funciona el meta per a l'escriptura de caràcteres especials:
header("Content-Type: text/html; charset=ISO-8859-1");

/*************FUNCTION PLANTILLA ****************/
	function getData(&$totalBet, &$p)
	{	//get data File & returns a number & a associative data Array

		$filename = $_GET["filename"];

		include($filename);
		$data = explode(" ", $cadena);
		$nGamers= array_shift($data);
		$bet= array_shift($data);
		$nCards= array_shift($data);
		
		$totalBet= $bet * $nGamers;
		for ($i=0; $i < $nGamers; $i++)
		{
			$p[$i]["name"] = array_shift($data);
			for ($j=0; $j < $nCards; $j++)
			{
				$p[$i]["card"][$j]= array_shift($data);
			}	
			//to check the data entered uncomment the next line 
			//LF();	print $p[$i]["name"]. "  ";print_r($p[$i]["card"]);
		}
	}// de getData
	
	function LF()
	{ //line feed
		print "<br />";
	}

	
	/******************FUNCTIONS*********************/
	function putCard($pref, $num)
	{
		print "<img src='".$pref.$num.".png'>";
	}// de putCard
	
	function cardValue($card)
	{
		$value=$card % 10 + 1;
		if ($value>7) $value+=2;			//figures (8, 9, 10) have 10, 11 or 12 points
		return ($value);
	}// de cardValue
	
	function showTable($table)
	{
		$long = count ($table);
		for ($i=0; $i<$long; $i++) 
				putCard('e',$table[$i]);
	}//de showTable
	
	function computeScore($in)
	{
		$long = count($in);
		$score = 0;
		for ($i=0; $i<$long ;$i++) $score += cardValue($in[$i]);
		return $score;
	}//de computeScore
	
	function showGame($bet, $game)
	{
		$longGame = count($game);
		$longCards= count($game[0]["card"]);
		//computes each player score
		for ($i=0; $i<$longGame; $i++)
		{
			$score[$i] = computeScore($game[$i]["card"]);
		}
		
		//computes how many winners & maxScore
		$winners = 0;
		$maxScore = 0;
		for ($i=0; $i<$longGame; $i++) 
		{
			
			if ($score[$i] > $maxScore)
			{
				$maxScore = $score[$i];
				$winners = 1;
			}
			else if ($score[$i] == $maxScore) $winners++;
		}
		$gain = $bet/$winners; 
		
		//shows each gamer cards, score & gain
		for ($i=0; $i<$longGame; $i++)
		{
			LF();
			print "<b>Gamer ".$game[$i]["name"]."</b>";
			LF();
			showTable($game[$i]["card"]); 
			print "Score: ".$score[$i].". Gain: ";
			if ($score[$i]==$maxScore) print $gain;
			else print 0;
		}
	}//de showGame
	
	function extractGame($howManyCards, $in)
	{
		$longGame = count ($in);
		$longCards= count($in[0]["card"]);
		$long = min ($howManyCards, $longCards); 
		
		for($i=0; $i<$longGame; $i++)
		{
			$out[$i]["name"] =  $in[$i]["name"];
			for ($j=0; $j<$long; $j++) $out[$i]["card"][$j] = $in[$i]["card"][$j];
		}
		
		if ($long < $howManyCards) 
		{
			LF();
			print "There are less than $howManyCards cards in hand, assumed $long cards";
		}
		return $out;
	}
	
	
	
/******************MAIN*********************/
	 
	getData($bet, $game);  //$game is records array
	LF();
	print "<h3>Original Data</h3>";
	showGame($bet, $game);
	LF();LF();LF();LF();
	
	print "<h3>Extract first two cards</h3>";
	$game2 = extractGame(2, $game);
	showGame($bet, $game2);
	LF();LF();LF();LF();
	
	print "<h3>Extract first six cards</h3>";
	$game6 = extractGame(6, $game);
	showGame($bet, $game6);
	
	
	
?>
</div>
</body>
</html>