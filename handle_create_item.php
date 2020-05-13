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
	$name = $_REQUEST['itemname'];
	$description = $_REQUEST['itemdescription'];
	$price = $_REQUEST['priceslider'];
	$system = $_REQUEST['systemselecter'];

	$file = $_FILES['imageFile'];

	$fileName = $_FILES['imageFile']['name'];
	$fileTempName = $_FILES['imageFile']['tmp_name'];
	$fileSize = $_FILES['imageFile']['size'];
	$fileError = $_FILES['imageFile']['error'];
	$fileType = $_FILES['imageFile']['type'];

	$fileExtension = explode('.', $fileName);
	$fileActualExtension = strtolower(end($fileExtension));

	$allowedExtensions = array('jpg', 'jpeg', 'png');
	
	if (in_array($fileActualExtension, $allowedExtensions)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000) {
				$imageName = $system . "_" . $name . "." . $fileActualExtension;
				move_uploaded_file($fileTempName, 'img/' . $system . '/' . $imageName);

				$query = "INSERT INTO items VALUES(NULL,'" . $name . "','" . $imageName . "','" . $description . "','" . $price . "','" . $system . "','" . "action" . "',NOW());";
				echo $query . "<br/>";
				$result = mysqli_query($dbc,$query);
				if($result){
					echo "*New item created!" . 'img/' . $system . '/' . $imageName;
				}else{
					echo "*There was an issue creating the item!";
				}
			} else {
				echo "*Image to big to upload";
				return;
			}
		} else {
			echo "*Ran into an issue uploading the image";
			return;
		}
	} else {
		echo "*This file type is not supported.";
		return;
	}
}
?>

