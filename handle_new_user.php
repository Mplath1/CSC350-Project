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
	$query = "SELECT * from users WHERE username=?";
	$stmt = mysqli_prepare($dbc, $query);
	mysqli_stmt_bind_param($stmt, 's', $username);
	mysqli_stmt_execute($stmt);
		
	if(mysqli_stmt_affected_rows($stmt) < 1){
		mysqli_stmt_close($stmt);
		$msg = create_user($dbc,$username,$password);
		return $msg;
	}else{
		mysqli_stmt_close($stmt);
		$msg = "User Name Unavailable";
		return $msg;
	}
}

function create_user($dbc,$username,$password){
	$query = "INSERT INTO users VALUES(NULL,?,sha1(?),'none',now())";
	$stmt = mysqli_prepare($dbc, $query);
	mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
	mysqli_stmt_execute($stmt);

	if(mysqli_stmt_affected_rows($stmt)){
		mysqli_stmt_close($stmt);
		$msg = "New User $username created!";
	}else{
		mysqli_stmt_close($stmt);
		$msg = "There was a problem creating $username!";
	}
	
	return $msg;
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
include ('new_user.php'); //likely not the best way to do this
?>