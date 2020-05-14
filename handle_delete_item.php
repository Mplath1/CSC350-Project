<?php
if (!isset($_SESSION)) session_start();

require_once 'database_connection.php';

if (!isset($_SESSION['LoggedInUsername']))
{
	header("Location: index.php");
}

function delete_item() {

	if (isset($_REQUEST['item_id'])) {
		$item_id = $_REQUEST['item_id'];
		$dbc  = connect_to_database();
		$query = " DELETE from items WHERE item_id=$item_id";
		$result = mysqli_query($dbc,$query);
		if (mysqli_affected_rows($dbc) > 0) {
			echo "<script type='text/javascript'>alert('Item Deleted.');</script>";
		} else {
			echo "<script type='text/javascript'>alert('Failed To Delete Item.');</script>";
		}
		mysqli_close($dbc);
	} else {
		echo "<script type='text/javascript'>alert('Failed To Delete Item.');</script>";
	}
}


include('index.php');

if (!empty($_GET)) {
	delete_item();
}


?>