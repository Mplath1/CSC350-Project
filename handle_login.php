<?php

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
	$query = "SELECT * from users WHERE username='".$username."'";
		$result = mysqli_query($dbc,$query);

		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		//if( $r rows_affected < 1){$msg = "Username not found!";};
		if($row['password'] == sha1($password)){
			$msg = 'Successful login of user:'.$username.'';
			header("Location: index.php"); //transfers page to index. need to store username for unique privledges here
			exit;
		}else{
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
