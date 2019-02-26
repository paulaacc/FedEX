<?php
	
	echo password_hash($_POST['password'], PASSWORD_BCRYPT);
	
?>

	<!DOCTYPE html>
		<html>
			<head></head>
			<body>
				<form action = "<?php echo $_SERVER["PHP_SELF"];?>" method = "post">
					<label>Password</label>
					<input type = "text" name = "password">
					<input type = "submit" value="submit">
				</form>
			</body>
		</html>