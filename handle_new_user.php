<?php

$username = filter_var($_REQUEST['username'],FILTER_SANITIZE_STRING);
$password = filter_var($_REQUEST['password'],FILTER_SANITIZE_STRING);
$msg = "";



function connect_to_database(){

	$host = "localhost";
	$user = "devgroup";
	$database_password = "granfalloon";
	$database_name = "csc350project";


	$dbc  = @mysqli_connect($host,$user,$database_password,$database_name) OR //function to connect 
		die("Unable to connect to MYSQL server:".mysqli_connect_error());
		return $dbc;
}


function select_user($dbc,$username,$password,$msg){
	$query = "SELECT * from users WHERE username='".$username."'";
		$result = mysqli_query($dbc,$query);
	
		
		if($result->num_rows < 1){
			$msg = create_user($dbc,$username,$password);
			return $msg;
		}else{
			 $msg = "User Name Unavailable";
			 return $msg;
		}
}

function create_user($dbc,$username,$password){
	$query = "INSERT INTO users VALUES(NULL,'".$username."','".sha1($password)."','none',now())";
	
	if(mysqli_query($dbc,$query)){
		$msg = "New User $username created!";
	}else{
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
include ('login.php'); //likely not the best way to do this
?>