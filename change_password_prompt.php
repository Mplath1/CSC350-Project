<?php
if (!isset($_SESSION)) session_start();

if(!isset($msg)){$msg="";}
if(!isset($username)){$username="";}
if(!isset($prompt)){$prompt="";}
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
	<h1 style="text-align: center;">Reset Password, <br/><?php echo $username ?></h1>
	<form id="test" action="handle_change_password_prompt.php" method="post">
		<input type="hidden" name="username" value="<?php echo $username ?>">
		<input type="hidden" name="prompt" value="<?php echo $prompt ?>">
		<div style="padding: 6px; display:flex;justify-content:center;font-weight: bold;">
			<?php echo $msg;?>
		</div>
		<div style="padding: 0 6px 6px; text-align:left;">
			<p><label for="prompt">Prompt:</label><br/>
			<center><?php echo $prompt; ?></center></p><br>
		</div>
		<div style="padding: 6px; text-align:right;">
			<label for="answer">Answer:</label>
			<input type="text" name="answer"><br>
		</div>
    		<div style="padding: 6px; text-align:right;">
			<label for="new_password">New Password:</label>
			<input type="password" name="new_password"><br>
		</div>
		<div style="padding: 6px;display: flex;justify-content:space-evenly;margin:16px 0;">
			<input type="submit" value="Change">
		</div>
		<div style="padding: 6px; display: flex;justify-content:space-evenly;">
			<button type="button" onclick="location.href=('login.php')">Login</button>
		</div>
		<div style="padding: 6px; display: flex;justify-content:space-evenly;">
			<button type="button" onclick="location.href=('new_user.php')">New User</button>
		</div>
	</form>
</div>
</body>
</html>