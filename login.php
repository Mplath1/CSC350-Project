<?php if(!isset($msg)){$msg="";}?>
<html>
<head>
<title>Login</title>
</head>
<body>
<form action="handle_login.php" method="post">
	<label for="username">Username:</label>
	<input type="text" name="username"><br>
	<label for="password">Password:</label>
	<input type="text" name="password"><br>
	<input type="submit" value="Enter"><br>
	<?php echo $msg;?>
</form>
</body>
</html>