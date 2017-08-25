<html>
	<head>
	</head>
	<body>
		<form action = "Form.php" method = "post">
			First Name: <input type = "text" name = "fname"/><br/>
			<textarea type = "text" name = "textArea"></textarea><br/>
			<input type = "button" value = "BUTTON" name = "test"/>
			<input type = "submit" name = "agree"/>
			<input type = "reset"/><br/>
			<input type = "radio" name = "group1" value = "happy"/> happy <br/>
			<input type = "radio" name = "group1" value = "sad"/> sad <br/>
		</form>
	</body>
</html>
<?php
	if(isset($_POST["agree"]))
	{
		echo "submit button was hit<br/>";
		if(isset($_POST["fname"]))
			echo "name entered was ".$_POST["fname"]."<br/>";
		if(isset($_POST["group1"]))
			echo "you selected ".$_POST["group1"];
	}
?>