<?php
require_once 'database_connection.php';
$dbc  = connect_to_database();
//if (!item_exists($dbc))
//{
	create_item($dbc);
//}
include('create_item.php');

//function item_exists($dbc) {
//
//	$query = "SELECT * from items WHERE name='" . $_REQUEST['itemname'];
//	$result = mysqli_query($dbc,$query);
//	if (mysql_affected_rows($result) > 0)
//	{
//		echo "Item already exists!";
//	}
//	return (mysql_affected_rows($result) > 0);
//}

function create_item($dbc) {

	$query = "INSERT INTO items VALUES(NULL,'" . $_REQUEST['itemname'] . "','" . $_REQUEST['systemselecter'] . "_" . $_REQUEST['itemimage'] . "','" . $_REQUEST['itemdescription'] . "','" . $_REQUEST['priceslider'] . "','" . $_REQUEST['systemselecter'] . "','" . "action" . "',NOW());";
	echo $query . "<br/>";
	$result = mysqli_query($dbc,$query);
	if($result){
		echo "New item created!";
	}else{
		echo "There was an issue creating the item!";
	}
}
?>

