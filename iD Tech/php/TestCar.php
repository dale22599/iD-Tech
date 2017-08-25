<?php
	require_once("Car.class.php");
	
	$car1 = new Car(100, 500);
	
	echo $car1 -> getSpeed();
	echo "<br/>";
	$car1 -> setSpeed(500);
	echo $car1 -> getSpeed();
	echo "<br/>";
	echo $car1 -> getWeight();
	echo "<br/>";
	$car1 -> setWeight(10000);
	echo $car1 -> getWeight();
?>