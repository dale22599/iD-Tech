<?php
	require_once("Person.class.php");
	
	$person1 = new Person("Billy", "Bob");
	
	echo $person1 -> getFirstName();
	echo "<br/>";
	echo $person1 -> getLastName();
?>