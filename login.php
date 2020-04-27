<?php
if (!isset($_SESSION)) session_start();

if(!isset($msg)){$msg="";}
?>
<html>
<head>
<title>Login</title>
</head>
<body>
<!--add css external file here. possibly add class divisions to style-->
<script type="text/javascript">
  function submitForm(action) {
    var form = document.getElementById('test');
    form.action = action;
    form.submit();
  }
</script>
<form id="test" action="handle_login.php" method="post">
	<label for="username">Username:</label>
	<input type="text" name="username"><br>
	<label for="password">Password:</label>
	<input type="password" name="password"><br>
	<button type="submit" onclick="submitForm('handle_login.php')">Enter</button>
	<button type="submit" onclick="submitForm('handle_new_user.php')">New User</button>
	<?php echo $msg;?>
</form>
</body>
</html>