<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//ES"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="ES" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>PAC3 Card Set TesT</title>
		<style type="text/css">
		  body {background-color: #034926; color: #ffffff;}
		</style>
</head>
<body>
<h3>Card Set TesT</h3>
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
	
	function getData()
	{//load variable $cadena from file 
		$filename=$_GET["filename"];
		include($filename); 					//load file
		$cards=explode(" ",$cadena);  			//create array
		return $cards;							//returns array
	}
	
	function putCard($num)
	{
		print "<img src='carta".$num.".png'>";  //only spanish cards
	}// de putCard
		
	function cardValue($card)
	{
		$value=$card % 10 + 1;
		if ($value>7) $value+=2;			//figures (8, 9, 10) have 10, 11 or 12 points
		return ($value);
	}// de cardValue
	
	function showTable($table, $message)
	{
	  print "<h3>$message</h3>";
		$long = count ($table);				//obtains table length 
		for ($i=0; $i<$long; $i++) 
			putCard($table[$i]);  			//put $long cards
	}//de showTable
		
	function valueTable($table)
	{	//calculates the value of all cards
		$long = count ($table);				//obtains table length
		$total = 0;										//init counter
		for ($i=0; $i<$long; $i++) 
			$total += cardValue($table[$i]);	//ads a new element value
		return $total;
	}//de valueTable
	
	function nextCard($in)
	{//creates a new array with next card in each position
		$long = count($in);						//obtains table length
		for ($i=0; $i<$long; $i++)
		{
				$out[$i]=($in[$i]+1)%40;  //converts 40 to 0
		}
		return $out;
	}//de nextCard
	
	function groupCards($in)
	{//groups cards by suits order(gold, coup, spade, stick)
		$long = count($in);					//obtains table length
		$index=0;
		for ($i=0; $i<4; $i++) //each iteration copy one suit in $out table
			for ($j=0; $j<$long; $j++)
			{
				if (($in[$j]>=$i*10)&&($in[$j]<($i+1)*10))
				{
					$out[$index] = $in[$j];
					$index++; //$out index update
				}
			}
		return $out;
	}//de groupCards
	
	function reverseCards($in)
	{
		$long = count ($in);					//obtains table length 
		$outIndex = $long -1;					//$outIndex is complementary index of $i
		for ($i=0; $i<$long; $i++) 
		{
			$out[$outIndex] = $in[$i];
			$outIndex--;  //index i increase, outIndex decrease
		}
		return $out;
	}//de reverseCards
			
	
	
	/************* MAIN *************/
	
	$baseCards = getData();
	showTable($baseCards, "Original Cards");
	LF();
	print "Value: ".valueTable($baseCards);
	LF();
	//reverseCards test
	$actualCards = reverseCards($baseCards);
	showTable($actualCards, "Reversed Cards");
	LF();
	print "Value: ".valueTable($actualCards);
	LF();
	//nextCards test
	$actualCards=nextCard($baseCards);
	showTable($actualCards, "Next of each Card");
	LF();
	print "Value: ".valueTable($actualCards);
	LF();
	//groupCards test
	$actualCards = groupCards($baseCards);
	showTable($actualCards, "Grouped by suits Cards");
	LF();
	print "Value: ".valueTable($actualCards);
	LF();

?>
</div>
</body>
</html>