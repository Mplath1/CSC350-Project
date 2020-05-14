<?php
include('create_item.php');

require_once 'database_connection.php';
$dbc  = connect_to_database();
create_item($dbc);


/*function item_exists($dbc) {

	$query = "SELECT * from items WHERE name='" . $_REQUEST['itemname'];
	$result = mysqli_query($dbc,$query);
	return (mysql_affected_rows($result) > 0);
}*/

function create_item($dbc) {
	$name = $_REQUEST['itemname'];
	$description = $_REQUEST['itemdescription'];
	$price = $_REQUEST['priceslider'];
	$system = $_REQUEST['systemselecter'];

	if ($name === '') {
		echo "<script type='text/javascript'>alert('Item must have a name!');</script>";
	}
	else if ($description === '') {
		echo "<script type='text/javascript'>alert('Item must have a description!');</script>";
	}
	else
	{

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
					$result = mysqli_query($dbc,$query);
					if($result) {
						echo "<script type='text/javascript'>alert('New item created!');</script>";
					} else {
						echo "<script type='text/javascript'>alert('There was an issue creating the item!');</script>";
					}
				} else {
					echo "<script type='text/javascript'>alert('Image to big to upload!');</script>";
				}
			} else {
				echo "<script type='text/javascript'>alert('Ran into an issue uploading the image!');</script>";
			}
		} else {
			echo "<script type='text/javascript'>alert('This file type is not supported!');</script>";
		}
	}
}
?>

