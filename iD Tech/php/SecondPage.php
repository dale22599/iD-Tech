<html>
	<head>
	</head>
	<body>
		<form action = "SecondPage.php" method = "post">
			<input type = "submit" value = "Sign out" name = "out"/><br/>
		</form>
		<?php
			session_start();
			if(isset($_COOKIE["stay"]))
			{
				$connection = new mysqli("localhost", "root", "", "dale");
				$queryString = "select * from accounts";
				$resultSet = $connection -> query($queryString);
				while($row = $resultSet -> fetch_assoc())
				{
					if(strcasecmp($row["username"], $_COOKIE["stay"]) == 0)
						$_SESSION["username"] = $row["username"];
				}
			}
			if(isset($_SESSION["username"]))
				echo "Login successful. Welcome ".$_SESSION["username"].".";
			else
				echo "You're not logged in.";
			if(isset($_POST["out"]))
			{
				if(isset($_COOKIE["stay"])) 
				{
					unset($_COOKIE["stay"]);
					setcookie("stay", "", time() - 3600);
				}
				session_destroy();
				header("location: Login.php");
			}
		?>
	</body>
</html>