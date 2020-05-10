<?php
require_once 'database_connection.php';
$items = get_items();
$result_count = mysqli_num_rows($items);
include('index.php');


function query_items($dbc,$system,$price){

		//$query = "SELECT * from items WHERE system = '".$system."' AND price<=".$price."";
		$query = "SELECT * from items WHERE ";
		if($system != "any"){
			$query = $query."system = '".$system."' AND ";
		}
		 $query = $query."price<=".$price." ORDER BY name";
		//echo $query;
		$result = mysqli_query($dbc,$query);
		return $result;
}

function get_items(){
		$system = $_REQUEST['systemselecter'];
		//need to request all genres and put into an array passed to funnction
		$price = $_REQUEST['priceslider'];
		$dbc  = connect_to_database();
		$result = query_items($dbc,$system,$price);
		mysqli_close($dbc);
		return $result;
}



?>
