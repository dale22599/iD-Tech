<?php
	function addFunction($num1, $num2)
	{
		return $num1 + $num2;
	}

	function subtractFunction($num1, $num2)
	{
		return $num1 - $num2;
	}
	
	function multiplyFunction($num1, $num2)
	{
		return $num1 * $num2;
	}
	
	function divideFunction($num1, $num2)
	{
		if($num2 == 0)
			return 0;
		else
			return floor($num1 / $num2)." R ".$num1%$num2;
	}
	
	function exponentFunction($num1, $num2)
	{
		return pow($num1, $num2);
	}
	
	$i = 'c';
	switch($i)
	{
		case 'a':
			echo "0<br/>";
			break;
		case 'b':
			echo "1<br/>";
			break;
		case 'c':
			echo "2<br/>";
			break;
		default:
			echo "Other<br/>";
			break;
	}	
	
	echo addFunction(1, 2);
	echo "<br/>";
	echo subtractFunction(0, 3);
	echo "<br/>";
	echo multiplyFunction(2, 6);
	echo "<br/>";
	echo divideFunction(10, 0);
	echo "<br/>";
	echo divideFunction(5, 6);
	echo "<br/>";
	echo exponentFunction(2, 0);
	echo "<br/>";
	echo exponentFunction(2, 2);
	echo "<br/>"
?>