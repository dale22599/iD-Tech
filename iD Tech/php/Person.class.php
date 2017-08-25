<?php
	class Person
	{
		private $fName, $lName;
	
		function __construct($name1, $name2)
		{
			$this->fName = $name1;
			$this->lName = $name2;
		}
	
		function getFirstName()
		{
			return $this->fName;
		}
		
		function getLastName()
		{
			return $this->lName;
		}
	}
?>