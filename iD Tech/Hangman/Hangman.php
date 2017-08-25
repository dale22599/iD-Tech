<html>
	<head>
		<link rel="stylesheet" type="text/css" href="HangmanStyleFinal.css"/>
		<?php session_start(); ?>
	</head>
	<body>
		<form action = "Hangman.php" method = "post">
			<input type = "submit" name = "startGame" value = "Start game" id = "start"/>
			
				<input type = "submit" name = "letters[]" value = "A" id = "a" <?php  
				if(isset($_SESSION["A"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "B" id = "b" <?php  
				if(isset($_SESSION["B"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "C" id = "c" <?php  
				if(isset($_SESSION["C"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "D" id = "d" <?php  
				if(isset($_SESSION["D"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "E" id = "e" <?php  
				if(isset($_SESSION["E"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "F" id = "f" <?php  
				if(isset($_SESSION["F"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "G" id = "g" <?php  
				if(isset($_SESSION["G"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "H" id = "h" <?php  
				if(isset($_SESSION["H"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "I" id = "i" <?php  
				if(isset($_SESSION["I"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "J" id = "j" <?php  
				if(isset($_SESSION["J"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "K" id = "k" <?php  
				if(isset($_SESSION["K"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "L" id = "l" <?php  
				if(isset($_SESSION["L"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "M" id = "m" <?php  
				if(isset($_SESSION["M"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "N" id = "n" <?php  
				if(isset($_SESSION["N"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "O" id = "o" <?php  
				if(isset($_SESSION["O"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "P" id = "p" <?php  
				if(isset($_SESSION["P"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "Q" id = "q" <?php  
				if(isset($_SESSION["Q"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "R" id = "r" <?php  
				if(isset($_SESSION["R"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "S" id = "s" <?php  
				if(isset($_SESSION["S"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "T" id = "t" <?php  
				if(isset($_SESSION["T"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "U" id = "u" <?php  
				if(isset($_SESSION["U"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "V" id = "v" <?php  
				if(isset($_SESSION["V"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "W" id = "w" <?php  
				if(isset($_SESSION["W"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "X" id = "x" <?php  
				if(isset($_SESSION["X"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "Y" id = "y" <?php  
				if(isset($_SESSION["Y"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
				<input type = "submit" name = "letters[]" value = "Z" id = "z" <?php  
				if(isset($_SESSION["Z"]))
				    echo "style=\"display:none\"";
				?>>
				</input>
				
			<input type = "submit" name = "kill" value = "Reset" id = "reset"/><br/>
		</form>
		<?php
			if(isset($_POST["kill"]))
			{				
				session_destroy();
				die();
			}
			if(isset($_POST["startGame"]) && !isset($_SESSION["wordArray"]))
			{
				$wordList = fopen("WordList.txt", "r");
				$word;
				$num = rand(1, 3001);
				for($i = 1; $i <= $num; $i++)
				{
					$word = trim(strtoupper(fgets($wordList)));
					if($i == $num)
						break;
				}
				$length = strlen($word);
				$wordArray = str_split($word);
				$empty = "";
				for($l = 0; $l < $length; $l++)
				{
					$empty .= "_ ";
				}
				$spaces = "";
				for($j = 0; $j < $length; $j++)
				{
					$spaces .= "_ ";
				}
				echo "<p class = \"space\">$spaces</p>";
				$_SESSION["won"] = false;
				$_SESSION["attempts"] = 0;
				$_SESSION["lettersCorrect"] = 0;
				$_SESSION["wordArray"] = $wordArray;
				$_SESSION["length"] = $length;
				$_SESSION["word"] = $word;
				$_SESSION["empty"] = $empty;
				$_SESSION["won"] = false;
			}
			else if(isset($_SESSION["wordArray"]))
			{
				$length = $_SESSION["length"];
				$word = $_SESSION["word"];
				$wordArray = $_SESSION["wordArray"];
				$letter;	
				$temp = "";
				if((!$_SESSION["won"]) && ($_SESSION["attempts"] < 10))
				{
					if(isset($_POST["letters"]))
					{
						for($i = 0; $i < 26; $i++)
						{
							if(isset($_POST["letters"][$i]))
							{
								$letter = $_POST["letters"][$i];
								$_SESSION[$letter]="clicked";
								$tempAttempts = 0;
								$emptyArray = str_split($_SESSION["empty"]);
								for($j = 0; $j < $length; $j++)
								{
									if($wordArray[$j] == $letter)
									{
										$temp .= $_SESSION["wordArray"][$j];
										$temp .= " ";
										$_SESSION["lettersCorrect"]++;
									}
									else									
									{
										$temp .= $emptyArray[$j * 2];
										$temp .= " ";
										$tempAttempts++;
									}
									$_SESSION["empty"] = $temp;
									if($tempAttempts == $length)
										$_SESSION["attempts"]++;
								}

							}
						}
						echo "<p class = \"space\">".$_SESSION["empty"]."</p>";
						if($_SESSION["attempts"] == 1)
							echo "<img src=\"1.png\" align=\"middle\" height=\"300px\" width=\"300px\" class = \"man\">";
						if($_SESSION["attempts"] == 2)
							echo "<img src=\"2.png\" align=\"middle\" height=\"300px\" width=\"300px\" class = \"man\">";
						if($_SESSION["attempts"] == 3)
							echo "<img src=\"3.png\" align=\"middle\" height=\"300px\" width=\"300px\" class = \"man\">";
						if($_SESSION["attempts"] == 4)
							echo "<img src=\"4.png\" align=\"middle\" height=\"300px\" width=\"300px\" class = \"man\">";
						if($_SESSION["attempts"] == 5)
							echo "<img src=\"5.png\" align=\"middle\" height=\"300px\" width=\"300px\" class = \"man\">";
						if($_SESSION["attempts"] == 6)
							echo "<img src=\"6.png\" align=\"middle\" height=\"300px\" width=\"300px\" class = \"man\">";
						if($_SESSION["attempts"] == 7)
							echo "<img src=\"7.png\" align=\"middle\" height=\"300px\" width=\"300px\" class = \"man\">";
						if($_SESSION["attempts"] == 8)
							echo "<img src=\"8.png\" align=\"middle\" height=\"300px\" width=\"300px\" class = \"man\">";
						if($_SESSION["attempts"] == 9)
							echo "<img src=\"9.png\" align=\"middle\" height=\"300px\" width=\"300px\" class = \"man\">";
						if($_SESSION["attempts"] == 10)
							echo "<img src=\"10.png\" align=\"middle\" height=\"300px\" width=\"300px\" class = \"man\">";
						if($_SESSION["lettersCorrect"] == $length)
							$_SESSION["won"] = true;
					}
				}
				if($_SESSION["won"])
				{
					echo "<p class = \"text\">You win!</p>";
					session_destroy();
					die();
				}
				else if($_SESSION["attempts"] == 10)
				{
					echo "<p class = \"text\">You suck!</p>";
					$temp = "";
					for($i = 0; $i < $length; $i++)
					{
						$temp .= $_SESSION["wordArray"][$i];
						$temp .= " ";
					}
					$_SESSION["empty"] = $temp;
					echo "<p id = \"space2\">".$_SESSION["empty"]."</p>";
					session_destroy();
					die();
				}
			}
		?>
	</body>
</html>