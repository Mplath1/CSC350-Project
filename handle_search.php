<?php
require_once 'database_connection.php';
$items = get_items();
$search = build_search_string();
$result_count = mysqli_num_rows($items);
include('index.php');


function query_items($dbc,$system,$genres,$price){

		//$query = "SELECT * from items WHERE system = '".$system."' AND price<=".$price."";
		$query = "SELECT * from items WHERE ";
		if($system != "any"){
			$query = $query."system = '".$system."' AND ";
		}
		if(sizeof($genres)>0){
			$size = sizeof($genres);
			$query = $query."(";
			for($i=0;$i<$size;$i++){
				$query = $query."genre = '".$genres[$i]."'";
					if(($i+1)>=$size){
						$query = $query.") AND ";
					}else{
				$query = $query." OR ";
			}
		}
	}
		$query = $query."price<=".$price." ORDER BY name";
		$result = mysqli_query($dbc,$query);
		return $result;
}

function get_items(){
		$system = $_REQUEST['systemselecter'];
		$genres = $_REQUEST['genre'];
		$price = $_REQUEST['priceslider'];
		$dbc  = connect_to_database();
		$result = query_items($dbc,$system,$genres,$price);
		mysqli_close($dbc);
		return $result;
}

function build_search_string(){
	$system = $_REQUEST['systemselecter'];
	$genres = $_REQUEST['genre'];
	$price = $_REQUEST['priceslider'];
	$search = "Results for all ";
	if(sizeof($genres)>0){
		$size = sizeof($genres);
		for($i=0;$i<$size;$i++){
			$search = $search." $genres[$i]";
				if (($i+2)==$size){
					if($size>3){
						//$search = $search.", ";
					}
					$search = $search." and ";
				}


	}

	$search = $search." games ";
	if($system!='any'){
		$search = $search." for ".$system." ";
	}
	$search = $search."under $".$price;
	var_dump($search);
	return $search;
	}
}



?>
