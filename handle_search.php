<?php

$price = $_REQUEST['priceslider'];

$dbc  = @mysqli_connect('localhost','devgroup','granfalloon','csc350project') OR //function to connect 
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