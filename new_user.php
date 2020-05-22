<?php
if (!isset($_SESSION)) session_start();

if(!isset($msg)){$msg="";}
?>
<html>
<head>
<title>Login</title>
</head>
<body>
  <link rel="stylesheet" type="text/css" href="index_style.css">
<script type="text/javascript">
  function submitForm(action) {
    var form = document.getElementById('test');
    form.action = action;
    form.submit();
  }
</script>
<center><a href="index.php"><img id="logo" src="img/Logo_GroupOne.png"/></a></center>
<div class="genericPanelRed" style="width:256px; position:absolute;top:45%;left:50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
	<h1 style="text-align: center;">Create Account!</h1>
	<form id="test" action="handle_new_user.php" method="post">
		<div style="padding: 6px; display:flex;justify-content:center;font-weight: bold;">
			<?php echo $msg;?>
		</div>
		<div style="padding: 6px; text-align:right;">
			<label for="username">Username:</label>
			<input type="text" name="username"><br>
		</div>
		<div style="padding: 6px; text-align:right;">
			<label for="password">Password:</label>
			<input type="password" name="password"><br>
		</div>
		<div style="padding: 6px;display: flex;justify-content:space-evenly;margin:16px 0;">
			<input type="submit" value="Submit">
		</div>
		<div style="padding: 6px; display: flex;justify-content:space-evenly;">
			<button type="button" onclick="location.href=('login.php')">Login</button>
		</div>
	</form>
</div>
</body>
</html>
