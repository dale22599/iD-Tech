<html>
	<head>
	</head>
	<body>
		<form action = "Data.php" method = "post">
			Color <input type = "text" name = "color"/><br/>
			Brand <input type = "text" name = "brand"/><br/>
			Year <input type = "text" name = "year"/><br/>
			<input type = "submit" name = "agree"/>
		</form>
		<?php
			$connection = new mysqli("localhost", "root", "", "dale");
			if($connection -> connect_error)
				echo "Connection failed";
			else
			{
				$queryString = "select * from car";
				$resultSet = $connection -> query($queryString);
				$numRows = $resultSet -> num_rows;
				if($numRows > 0)
				{
					while($row = $resultSet -> fetch_assoc())
					{
						echo $row["Color"]."<br/>";
						echo $row["Brand"]."<br/>";
						echo $row["Year"]."<br/>"."<br/>";
					}
				}
				if(isset($_POST["agree"]))
				{
					$color = $_POST["color"];
					$brand = $_POST["brand"];
					$year = $_POST["year"];
					$queryString = "insert into car (`Color`, `Brand`, `Year`) values ('$color', '$brand', '$year')";
					$connection -> query($queryString);
					echo "Data updated";
				}
			}
		?>
	</body>
</html>