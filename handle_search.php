<?php

$price = $_REQUEST['priceslider'];

$host = "localhost";
$user = "devgroup";
$database_password = "granfalloon";
$database_name = "csc350project";

$dbc  = @mysqli_connect($host,$user,$database_password,$database_name) OR //function to connect 
		die("Unable to connect to MYSQL server:".mysqli_connect_error());

		$query = "SELECT * from items WHERE price<=".$price."";
		echo $query;
		$result = mysqli_query($dbc,$query);
		echo "<br>Results:".$result->num_rows."<br>";
		//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		while($row = $result->fetch_assoc()){
			echo $row['name'].' '.$row['price'].'<br>'.$row['description'].'<br>';
			
		}




?>