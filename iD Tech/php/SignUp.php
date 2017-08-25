<html>
	<head>
		<title>
			Sign Up
		</title>
		<link rel="stylesheet" type="text/css" href="Style.css"/>
	</head>
	<body>
		<h1>
			Create an account
		</h1>
		<form action = "SignUp.php" method = "post">
			Username: <input type = "text" name = "username" id = "un"/><br/>
			Create password: <input type = "password" name = "password" id = "p1"/><br/>
			Reenter password: <input type = "password" name = "password2" id = "p2"/><br/><br/>
			<input type = "submit" value = "Create account" name = "agree" id = "sub"/>
			Already have an account?
			<a href="Login.php">
				Sign in
			</a>
		</form>
		<?php
			$user;
			$pass = "";
			$passFinal;
			$exist = false;
			if(isset($_POST["agree"]))
			{
				if(isset($_POST["username"]))
				{
					if(preg_match("/^[a-zA-Z0-9_\.\-]*$/", $_POST["username"]))
					{
						if(strlen($_POST["username"]) > 20)
							echo "<p style=\"color:red\" class = \"e1\">Username must be 20 characters or less.</p>";
						else if($_POST["username"] == "")
							echo "<p style=\"color:red\" class = \"e1\">Enter a username.</p>";
						else
							$user = $_POST["username"];
					}
					else
						echo "<p style=\"color:red\" class = \"e1\">Username can contain only letters, numbers, periods (.), hyphens (-), and underscores (_).</p>";
				}
				if(isset($_POST["password"]))
				{
					if((strlen($_POST["password"]) < 8) || (strlen($_POST["password"]) > 16))
					{
						echo "<p style=\"color:red\" class = \"e2\">Password must be between 8 and 16 characters.</p>";
					}
					else
						$pass = $_POST["password"];
				}
				if(isset($_POST["password2"]))
				{
					if($pass != "")
					{
						if($_POST["password2"] != $pass)
							echo "<p style=\"color:red\" class = \"e3\">Passwords don't match.</p>";
						else
							$passFinal = $pass;
					}
				}
				if((isset($user) && (isset($passFinal))))
				{
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
								if(strcasecmp($row["username"], $user) == 0)
								{
									echo "<p style=\"color:red\" class = \"e1\">The username ".$user." is already taken.</p>";
									$exist = true;
								}
							}							
						}
						if($exist == false)
						{
							echo "Account created.";
							$queryString = "insert into accounts (`username`, `password`) values ('$user', '$passFinal')";
							$connection -> query($queryString);
						}
					}
				}
			}
		?>
	</body>
</html>