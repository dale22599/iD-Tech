<html>
	<head>
		<title>
			COOKIES
		</title>
	</head>
	<body>
		
		<?php
			if(isset($_COOKIE["user"]))
				echo "WELCOME BACK ".$_COOKIE["user"];
			else
			{
				echo "<form action = \"Cookie.php\" method = \"post\">";
					echo "Enter your name: <input type = \"text\" name = \"name\"/><br/>";
				echo "<input type = \"submit\" name = \"agree\"/>";
				echo "<input type = \"reset\"/><br/>";
				echo "</form>";
				if(isset($_POST["agree"]))
				{
					if(isset($_POST["name"]))
					{
						setcookie("user", $_POST["name"], time()+60);
						echo "Welcome ".$_POST["name"].". Cookie has now been set for one minute.";
					}
				}
				
			}
		?>
	</body>
</html>