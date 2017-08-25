<?php
	class Car
	{
		private $speed, $weight, $topSpeed = 150, $minWeight = 1000, $maxWeight = 3000;
	
		function __construct($s, $w)
		{
			$this -> setWeight($w);
			$this -> setSpeed($s);
		}
	
		function getSpeed()
		{
			return $this->speed;
		}
		
		function setSpeed($s)
		{
			if($s > $this->topSpeed)
				$this->speed = $this->topSpeed;
			else
				$this->speed = $s;
		}
		
		function getWeight()
		{
			
			return $this->weight;
		}
		
		function setWeight($w)
		{
			if($w < $this->minWeight)
				$this->weight = $this->minWeight;
			else if($w > $this->maxWeight)
				$this->weight = $this->maxWeight;
			else
				$this->weight = $w;
		}
	}
?>