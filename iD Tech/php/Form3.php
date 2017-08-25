<?php
	if(isset($_COOKIE["username"]))
		echo $_COOKIE["username"]."<br/>";
	else
		echo "No data found"."<br/>";
	
	if(isset($_COOKIE["password"]))
		echo $_COOKIE["password"]."<br/>";
	else
		echo "No data found"."<br/>";
	
	if(isset($_COOKIE["age"]))
		echo $_COOKIE["age"]."<br/>";
	else
		echo "No data found"."<br/>";
	
	if(isset($_COOKIE["sex"]))
		echo $_COOKIE["sex"]."<br/>";
	else
		echo "No data found"."<br/>";
	
	for($i = 0; $i < 3; $i++)
		if(isset($_COOKIE["hobby".$i]))
			echo $_COOKIE["hobby".$i]."<br/>";
	
	if(isset($_COOKIE["textArea"]))
		echo $_COOKIE["textArea"]."<br/>";
	else
		echo "No data found"."<br/>";
?>