<?php
if (!isset($_SESSION)) session_start();

require 'database_connection.php';

$username = filter_var($_REQUEST['username'],FILTER_SANITIZE_STRING);
$prompt = filter_var($_REQUEST['prompt'],FILTER_SANITIZE_STRING);
$answer = filter_var($_REQUEST['answer'],FILTER_SANITIZE_STRING);
$new_password = filter_var($_REQUEST['new_password'],FILTER_SANITIZE_STRING);

$msg = "";

function update_password($dbc,$username,$new_password){
	$query = "UPDATE users SET password=sha1(?) WHERE username=?";
	$stmt = mysqli_prepare($dbc, $query);
	mysqli_stmt_bind_param($stmt, 'ss',$new_password,$username);
	return mysqli_stmt_execute($stmt);
}


if(!empty($answer)){
	if(!empty($new_password)){
		$dbc = connect_to_database();
		if(update_password($dbc,$username,$new_password)){
			$msg = "Password Succefully changed!";
		}else{
			$msg = "Failed to change password!";
		}
	}else{
		$msg = "You must enter a New Password!";
	}
}else{
	$msg = "You must enter a Prompt Answer!";
}

include ('change_password_prompt.php');

?>
