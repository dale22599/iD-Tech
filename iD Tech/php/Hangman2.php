<html>
	<head>
		<link rel="stylesheet" type="text/css" href="HangmanStyleFinal.css"/>
		<?php session_start(); ?>
	</head>
	<body>
		<form action = "Hangman2.php" method = "post">
			<input type = "submit" name = "startGame" value = "Start game" id = "start"/><br/>
				<input type = "submit" name = "letters[]" value = "A" onclick="this.disabled=true/>
				
			<input type = "submit" name = "letters[]" value = "B"  <?php  
				if(isset($_SESSION["B"])){
				    echo "style=\"display:none\"";
				}
				else
				echo "here";

				?>>
				</input>
				
			<!--if(!isset($_POST["letters"][5]) || (!isset($_SESSION["F"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"F\"/>";
				$_SESSION["F"] = 1;
			}
			if(!isset($_POST["letters"][6]) || (!isset($_SESSION["G"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"G\"/>";
				$_SESSION["G"] = 1;
			}
			if(!isset($_POST["letters"][7]) || (!isset($_SESSION["H"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"H\"/><br/>";
				$_SESSION["H"] = 1;
			}
			if(!isset($_POST["letters"][8]) || (!isset($_SESSION["I"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"I\"/>";
				$_SESSION["I"] = 1;
			}
			if(!isset($_POST["letters"][9]) || (!isset($_SESSION["J"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"J\"/>";
				$_SESSION["J"] = 1;
			}
			if(!isset($_POST["letters"][10]) || (!isset($_SESSION["K"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"K\"/>";
				$_SESSION["K"] = 1;
			}
			if(!isset($_POST["letters"][11]) || (!isset($_SESSION["L"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"L\"/><br/>";
				$_SESSION["L"] = 1;
			}
			if(!isset($_POST["letters"][12]) || (!isset($_SESSION["M"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"M\"/>";
				$_SESSION["M"] = 1;
			}
			if(!isset($_POST["letters"][13]) || (!isset($_SESSION["N"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"N\"/>";
				$_SESSION["N"] = 1;
			}
			if(!isset($_POST["letters"][14]) || (!isset($_SESSION["O"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"O\"/>";
				$_SESSION["O"] = 1;
			}
			if(!isset($_POST["letters"][15]) || (!isset($_SESSION["P"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"P\"/><br/>";
				$_SESSION["P"] = 1;
			}
			if(!isset($_POST["letters"][16]) || (!isset($_SESSION["Q"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"Q\"/>";
				$_SESSION["Q"] = 1;
			}
			if(!isset($_POST["letters"][17]) || (!isset($_SESSION["R"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"R\"/>";
				$_SESSION["R"] = 1;
			}
			if(!isset($_POST["letters"][18]) || (!isset($_SESSION["S"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"S\"/>";
				$_SESSION["S"] = 1;
			}
			if(!isset($_POST["letters"][19]) || (!isset($_SESSION["T"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"T\"/><br/>";
				$_SESSION["T"] = 1;
			}
			if(!isset($_POST["letters"][20]) || (!isset($_SESSION["U"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"U\"/>";
				$_SESSION["U"] = 1;
			}
			if(!isset($_POST["letters"][21]) || (!isset($_SESSION["V"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"V\"/>";
				$_SESSION["V"] = 1;
			}
			if(!isset($_POST["letters"][22]) || (!isset($_SESSION["W"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"W\"/>";
				$_SESSION["W"] = 1;
			}
			if(!isset($_POST["letters"][23]) || (!isset($_SESSION["X"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"X\"/><br/>";
				$_SESSION["X"] = 1;
			}
			if(!isset($_POST["letters"][24]) || (!isset($_SESSION["Y"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"Y\" class = \"special\"/>";
				$_SESSION["Y"] = 1;
			}
			if(!isset($_POST["letters"][25]) || (!isset($_SESSION["Z"])))
			{
				echo "<input type = \"submit\" name = \"letters[]\" value = \"Z\" class = \"special\"/>";
				$_SESSION["Z"] = 1;
			}
		?>-->
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
				echo "<p id = \"space\">$spaces</p>";
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
				if((!$_SESSION["won"]) && ($_SESSION["attempts"] < 15))
				{
					if(isset($_POST["letters"]))
					{
						for($i = 0; $i < 26; $i++)
						{
							if(isset($_POST["letters"][$i]))
							{
								$letter = $_POST["letters"][$i];
								//echo "letter selected is $letter";
								//$_SESSION[$letter]="clicked";
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
						echo "<p id = \"space\">".$_SESSION["empty"]."</p>";
						echo "<p class = \"text2\">Attempts: ".$_SESSION["attempts"]."</p>";
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
				else if($_SESSION["attempts"] == 15)
				{
					echo "<p class = \"text\">You suck!</p>";
					session_destroy();
					die();
				}
			}
		?>
	</body>
</html>