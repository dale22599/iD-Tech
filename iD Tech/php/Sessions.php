<html>
	<head>
	</head>
	<body>
		<form action = "Sessions.php" method = "post">
			<input type = "submit" value = "Destroy session" name = "destroy"/>
		</form>
		<?php
			session_start();
			if(isset($_POST["destroy"]))
				session_destroy();
			else{
				if(isset($_SESSION["views"]))
				{
					$_SESSION["views"] = $_SESSION["views"] + 1;
					echo "Views = ".$_SESSION["views"];
				}
				else
				{
					$_SESSION["views"] = 1;
					echo "Views = 1";
				}
			}
		?>
	</body>
</html>