<?php
require_once 'database_connection.php';

if(!isset($items)){$items=NULL;}
if(!isset($result_count)){$result_count=NULL;}

$dbc  = connect_to_database();
$query = " SELECT * from systems ORDER BY system_name";
$systems = mysqli_query($dbc,$query);
$query = " SELECT * from genres ORDER BY genre_name";
$genres = mysqli_query($dbc,$query);

mysqli_close($dbc);

?>

<html>
<head>
<title>Index</title>
<link rel="stylesheet" type="text/css" href="index_style.css">
<script src="scripts.js"></script>
</head>
<body>
<?php include 'header.php';?>
	<article>
		<h1>Create Item</h1>
		<div>
			<form action="handle_create_item.php" method="post" enctype="multipart/form-data">
			<div class="">
				<ul>
					<li>Name: <input type="text" id="itemname" name="itemname"></li>
					<li>Image: <input type='file' name='imageFile'>
					<li>Description: <input type="text" id="itemdescription" name="itemdescription"></li>
					<li><label for="systemselecter">System</label>
					<select  name="systemselecter" id="systemselecter">
						<?php foreach($systems as $systems):?>
							<option value="<?= $systems['system_intials']?>"><?= $systems['system_name']?></option>
						<?php endforeach;?>
					</select>
					</li>
					<li><label for="genreselecter">Genre</label>
					<select  name="genreselecter" id="genreselecter">
						<?php foreach($genres as $genres):?>
							<option value="<?= $genres['genre_name']?>"><?= $genres['genre_name']?></option>
						<?php endforeach;?>
					</select>
					</li>
					<li><label for="priceslider">Max.Price</label>
					<input type="range" name="priceslider" id="priceslider" min="0" max="500" value="50">
					<br><p>$<span id="currentprice"></span></p></li>
					<script src="scripts.js"></script>
				</ul>
				<input type="submit" value="Upload">

			</div>
			</form>
		</div>
	</article>
</body>
<footer>
	<?php include 'footer.php';?>
</footer>
</html>
