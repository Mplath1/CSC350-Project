<?php
if (!isset($_SESSION)) session_start();

require_once 'database_connection.php';

if (!isset($_SESSION['LoggedInUsername']))
{
	header("Location: index.php");
}

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
	<div style="width:100%; text-align:center;">
	<article class="genericPanelRed" style="width: auto; margin: 64px auto; text-align:left;">
		<h1>Create Item</h1>
		<div>
			<form action="handle_create_item.php" method="post" enctype="multipart/form-data">
			<div class="">
				<ul>
					<li>Name: <input type="text" id="itemname" name="itemname" value="<?php if (isset($_REQUEST['itemname'])) { echo $_REQUEST['itemname']; } ?>"></li>
					<li>Image: <input type='file' name='imageFile'>
					<!--<li>Description: <input type="text" id="itemdescription" name="itemdescription"></li>-->
					<li>Description:<br/><textarea id ="itemdescription" name="itemdescription" rows=4 cols="40" ><?php if (isset($_REQUEST['itemdescription'])) { echo $_REQUEST['itemdescription']; } ?></textarea></li>
					<li><label for="systemselecter">System</label>
					<select  name="systemselecter" id="systemselecter">
						<?php foreach($systems as $systems):?>
							<option value="<?= $systems['system_intials']?>" <?php if (isset($_REQUEST['systemselecter'])) { if ($systems['system_intials'] == $_REQUEST['systemselecter']) { echo 'selected="selected"'; }} ?> ><?= $systems['system_name']?></option>
						<?php endforeach;?>
					</select>
					</li>
					<li><label for="genreselecter">Genre</label>
					<select  name="genreselecter" id="genreselecter">
						<?php foreach($genres as $genres):?>
							<option value="<?= $genres['genre_name']?>" <?php if (isset($_REQUEST['genreselecter'])) { if ($genres['genre_name'] == $_REQUEST['genreselecter']) { echo 'selected="selected"'; }} ?> ><?= $genres['genre_name']?></option>
						<?php endforeach;?>
					</select>
					</li>
					<li><label for="priceslider">Set Price</label>
					<input type="range" name="priceslider" id="priceslider" min="0" max="500" value="<?php if (isset($_REQUEST['priceslider'])) { echo $_REQUEST['priceslider']; } else { echo 50; } ?>">
					<br><p>$<span id="currentprice"></span></p></li>
					<script src="scripts.js"></script>
				</ul>
				<div style="width:100%; text-align:center;">
					<div style="display: inline-block; margin: 0 auto; text-align:left;">
						<input type="submit" value="Upload">
					</div>
				</div>

			</div>
			</form>
		</div>
	</article>
	</div>
</body>
<footer>
	<?php include 'footer.php';?>
</footer>
</html>
