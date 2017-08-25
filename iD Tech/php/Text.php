<?php
	$file1 = fopen("LINES.txt", "r");
	if(!$file1)
		echo "ERROR";
	else
	{
		while($line = fgets($file1))
		{
			echo $line."<br/>";
		}
	}
	fclose($file1);
	$file2 = fopen("Test.txt", "w+");
	for($i = 1; $i<1001; $i++)
	{
		fwrite($file2, "line $i\r\n");
		echo "Wrote to file line $i<br/>";
	}
	fclose($file2);
?>