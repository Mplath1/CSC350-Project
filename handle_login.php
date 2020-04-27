<?php
if (!isset($_SESSION)) session_start();

require 'database_connection.php';

$username = filter_var($_REQUEST['username'],FILTER_SANITIZE_STRING);
$password = filter_var($_REQUEST['password'],FILTER_SANITIZE_STRING);

$msg = "";



/*function connect_to_database(){

	$host = "localhost";
	$user = "devgroup";
	$database_password = "granfalloon";
	$database_name = "csc350project";


	$dbc  = @mysqli_connect($host,$user,$database_password,$database_name) OR //function to connect
		die("Unable to connect to MYSQL server:".mysqli_connect_error());
		return $dbc;
}*/


function select_user($dbc,$username,$password,$msg){
	$query = "SELECT username, password from users WHERE username=?";
	$stmt = mysqli_prepare($dbc, $query);
	mysqli_stmt_bind_param($stmt, 's', $username);
	mysqli_stmt_execute($stmt);

	mysqli_stmt_bind_result($stmt, $stmtUsername, $stmtPassword);

	$row = mysqli_stmt_fetch($stmt);
	if($stmtPassword == sha1($password)){
		mysqli_stmt_close($stmt);
		$_SESSION['LoggedInUsername'] = $username;
		$msg = 'Successful login of user:'.$username.'';
		header("Location: index.php"); //transfers page to index. need to store username for unique privledges here
		exit;
	}else{
		mysqli_stmt_close($stmt);
		$msg = "Incorrect Password! ";
		return $msg;
	}
}

if(!empty($username)){
	if(!empty($password)){
		$dbc = connect_to_database();
		$msg=select_user($dbc,$username,$password,$msg);
	}else{
		$msg = "You must enter a Password!";
	}
}else{
	$msg = "You must enter a Username!";
}
include ('login.php'); //likely not the best way to do this
?>
