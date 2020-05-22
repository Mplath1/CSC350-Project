<?php
if (!isset($_SESSION)) session_start();

require 'database_connection.php';

$username = filter_var($_REQUEST['username'],FILTER_SANITIZE_STRING);
$msg = "";

function check_user($dbc,$username){
	$query = "SELECT reset_prompt from users WHERE username=?";
	$stmt = mysqli_prepare($dbc, $query);
	mysqli_stmt_bind_param($stmt, 's', $username);
	mysqli_stmt_execute($stmt);
	
	mysqli_stmt_bind_result($stmt, $prompt);
	$row = mysqli_stmt_fetch($stmt);
	echo mysqli_stmt_error($stmt);

	return $prompt;
}



if(!empty($username)){
	$dbc = connect_to_database();
	$prompt = check_user($dbc,$username);

	if(isset($prompt)){
		include ('change_password_prompt.php');
	}else{
		$msg = "You must enter an Existing Username!";
		include ('change_password.php');
	}
}else{
	$msg = "You must enter a Username!";
	include ('change_password.php');
}

?>
