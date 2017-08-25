<html>
	<head>
		<title>
			Sign In
		</title>
		<link rel="stylesheet" type="text/css" href="Style.css" />
	</head>
	<body>
		<h1>
			Sign in
		</h1>
		<form action = "Login.php" method = "post">
			Username: <input type = "text" name = "username" id = "un1"/><br/>
			Password: <input type = "password" name = "password" id = "ps1"/><br/>
			<input type = "checkbox" name = "keep"/> Keep me signed in<br/><br/>
			<input type = "submit" value = "Sign in" name = "agree"/>
			Don't have an account? 
			<a href="SignUp.php">
				Sign up now
			</a>
		</form><br/>
		<?php
			session_start();
			if(isset($_SESSION["username"]) || isset($_COOKIE["stay"]))
			{	
				header("location: SecondPage.php");
				exit();
			}
			$user;
			$pass;
			$login = false;
			$username = false;
			if(isset($_POST["agree"]))
			{
				session_destroy();
				if(isset($_POST["username"]))
					$user = $_POST["username"];
				if(isset($_POST["password"]))
					$pass = $_POST["password"];
				$connection = new mysqli("localhost", "root", "", "dale");
				if($connection -> connect_error)
					echo "Connection failed.";
				else
				{
					$queryString = "select * from accounts";
					$resultSet = $connection -> query($queryString);
				    $numRows = $resultSet -> num_rows;
					if($numRows > 0)
					{
						while($row = $resultSet -> fetch_assoc())
						{
							if((strcasecmp($row["username"], $user) == 0) && ($row["password"] == $pass))
							{
								if(isset($_POST["keep"]))
									setcookie("stay", $user, time()+3600);
								session_start();
								$_SESSION["username"] = $row["username"];
								header("location: SecondPage.php");
								exit();
							}
							else if(strcasecmp($row["username"], $user) == 0)
							{
								echo "<p style=\"color:red\">That password is incorrect.</p>";
								$username = true;
								break;
							}
						}
						if(!$login && !$username)
							echo "<p style=\"color:red\">This account doesn't exist. Please try again.</p>";
					}
				}
			}
		?>
	</body>
</html>