<?php
function connect_to_database(){

	$host = "localhost";
	$user = "devgroup";
	$database_password = "granfalloon";
	$database_name = "csc350project";

	$dbc  = @mysqli_connect($host,$user,$database_password,$database_name) OR //function to connect
		die("Unable to connect to MYSQL server:".mysqli_connect_error());
		return $dbc;
}
?>
