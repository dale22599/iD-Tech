<html>
	<head>
		<title>
			Registration
		</title>
	</head>
	<body>
		<h1>
			Registration
		</h1>
		<form action = "Form2.php" method = "post">
			Username: <input type = "text" name = "username"/><br/>
			Password: <input type = "password" name = "password"/><br/><br/>
			Age: <select name = "age">
				<option value = "13">13</option>
				<option value = "14">14</option>
				<option value = "15">15</option>
				<option value = "16">16</option>
				<option value = "17">17</option>
				<option value = "18">18</option>
			</select><br/><br/>
			Gender:
			<input type = "radio" name = "sex" value = "Male"/>Male 
			<input type = "radio" name = "sex" value = "Female"/>Female 
			<input type = "radio" name = "sex" value = "Other"/>Other<br/><br/>
			Hobbies:<br/>
			<input type = "checkbox" name = "hobby[]" value = "Sports"/>Sports<br/>
			<input type = "checkbox" name = "hobby[]" value = "Games"/>Games<br/>
			<input type = "checkbox" name = "hobby[]" value = "Reading"/>Reading<br/><br/>
			Other info:<br/><textarea type = "text" name = "textArea"></textarea><br/><br/><br/>
			<input type = "submit" name = "agree"/>
			<input type = "reset"/><br/>
		</form>
	</body>
</html>
<?php
	if(isset($_POST["agree"]))
	{
		if(isset($_POST["username"]))
		{
			if(preg_match("/^[a-zA-Z0-9_\.\-]*$/", $_POST["username"]))
			{
				$_POST["username"] = clean($_POST["username"]);
				setcookie("username", "Username: ".$_POST["username"], time() + 120);
			}
			else
				echo "<p style=\"color:red\">ERROR<br/>INVALID USERNAME</p>";
		}
		if(isset($_POST["password"]))
			if(preg_match("/^[a-zA-Z0-9]*$/", $_POST["password"]))
			{
				$_POST["password"] = clean($_POST["password"]);
				setcookie("password", "Password: ".$_POST["password"], time() + 120);
			}
			else
				echo "<p style=\"color:red\">ERROR<br/>INVALID PASSWORD</p>";
		setcookie("age", "Age: ".$_POST["age"], time() + 120);
		if(isset($_POST["sex"]))
			setcookie("sex", "Gender: ".$_POST["sex"], time() + 120);
		for($i = 0; $i < 3; $i++)
		{
			if(isset($_POST["hobby"][$i]))
			{
				setcookie("hobby".$i, "Hobby: ".$_POST["hobby"][$i], time() + 120);
			}
		}
		if(isset($_POST["textArea"]))
			$_POST["textArea"] = clean($_POST["textArea"]);
			setcookie("textArea", "Other info: ".$_POST["textArea"], time() + 120);
	}
	
	function clean($input)
	{
		$input = strip_tags($input);
		$input = stripSlashes($input);
		return $input;
	}
?>