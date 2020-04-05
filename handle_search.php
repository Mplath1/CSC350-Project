<?php



$items = get_items();
$result_count = mysqli_num_rows($items);
include('index.php');


function connect_to_database(){

	$host = "localhost";
	$user = "devgroup";
	$database_password = "granfalloon";
	$database_name = "csc350project";

	$dbc  = @mysqli_connect($host,$user,$database_password,$database_name) OR //function to connect 
		die("Unable to connect to MYSQL server:".mysqli_connect_error());
		return $dbc;
}

function query_items($dbc,$price){
		
		$query = "SELECT * from items WHERE price<=".$price."";
		//echo $query;
		$result = mysqli_query($dbc,$query);
		//echo "<br>Results:".$result->num_rows."<br>";
		//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		//while($row = $result->fetch_assoc()){
		//	echo $row['name'].' '.$row['price'].'<br>'.$row['description'].'<br>';
		//}
		return $result;
}

function get_items(){
		$price = $_REQUEST['priceslider'];
		$dbc  = connect_to_database();
		$result = query_items($dbc,$price);
		return $result;
}

	

?>