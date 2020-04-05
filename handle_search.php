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

function query_items($dbc){
		$price = $_REQUEST['priceslider'];
		$query = "SELECT * from items WHERE price<=".$price."";
		//echo $query;
		$result = mysqli_query($dbc,$query);
		echo "<br>Results:".$result->num_rows."<br>";
		//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		while($row = $result->fetch_assoc()){
			echo $row['name'].' '.$row['price'].'<br>'.$row['description'].'<br>';
		}
}

		$dbc  = connect_to_database();
		query_items($dbc);

?>