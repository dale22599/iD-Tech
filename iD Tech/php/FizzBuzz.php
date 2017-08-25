<?php
	for($i = 1; $i <= 100; $i++)
	{
		echo "($i) ";
		if($i % 5 == 0)
		{
			if($i % 3 == 0)
				echo "fizzbuzz";
			else
				echo "buzz";
		}
		elseif($i % 3 == 0)
			echo "fizz";
		echo "<br/>";
	}
?>