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
<div class="genericPanelRed" style="position:absolute;top:30%;left:45%;">
<form id="test" action="handle_login.php" method="post">
  <div style="padding: 6px">
	<label for="username">Username:</label>
	<input type="text" name="username"><br>
</div>
<div style="padding: 6px">
	<label for="password">Password:</label>
	<input type="password" name="password"><br>
</div>
<div style="padding: 6px;display: flex;justify-content:space-evenly;">
  <!--possibly add image on button. mushroom for login, 1-up shroom for new user-->
	<button type="submit" onclick="submitForm('handle_login.php')">Enter</button>
	<button type="submit" onclick="submitForm('handle_new_user.php')">New User</button>
</div>
<div style="padding: 6px; display:flex;justify-content:center;">
<?php echo $msg;?>
</div>
</div>
</form>
</body>
</html>
