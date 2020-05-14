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
	<nav>
		<ul>
			<li><a href="www.somelink.com">Link 1</a></li>
			<li><a href="www.somelink.com">Link 2</a></li>
			<li><a href="www.somelink.com">Link 3</a></li>
		</ul>
	</nav>
	<aside class="genericPanelRed">
		<form action="handle_search.php" method="get">
			<div class="selection-window">
				<ul>
					<li><label for="systemselecter">System</label>
					<select  name="systemselecter" id="systemselecter">
						<option value="any">Any</option>
						<?php foreach($systems as $systems):?>
							<option value="<?= $systems['system_intials']?>"><?= $systems['system_name']?></option>
						<?php endforeach;?>
					</select>
					</li>
					<li><label for="genreselecter">Genre</label>
						<?php foreach($genres as $genres):?>
						<div class="genreoption">
							<input type="checkbox" id="<?= $genres['genre_name']?>" name="<?= $genres['genre_name']?>" value="<?= $genres['genre_name']?>">
							<label for "<?= $genres['genre_name']?>"><?= $genres['genre_name']?></label>
						</div>
						<?php endforeach;?>
							</li>
					<li><label for="priceslider">Max.Price</label>
					<input type="range" name="priceslider" id="priceslider" min="0" max="500" value="50">
					<br><p>$<span id="currentprice"></span></p></li>
					<script src="scripts.js"></script>
				</ul>
					<input type="submit" value="Search">
				</div>
			</form>
	</aside>
	<article>
		<?php if (empty($items)):?>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
			labore et dolore magna aliqua. Integer quis auctor elit sed vulputate mi sit. Porta non pulvinar
			neque laoreet suspendisse interdum. Nunc id cursus metus aliquam eleifend mi in nulla posuere.
			Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis aliquam. Interdum velit
			laoreet id donec ultrices. Parturient montes nascetur ridiculus mus mauris. Ornare aenean euismod
			elementum nisi quis eleifend. Sit amet cursus sit amet dictum sit. Purus ut faucibus pulvinar
			elementum integer enim neque volutpat ac. Sit amet est placerat in egestas. Arcu felis bibendum
			ut tristique et egestas quis. Ut diam quam nulla porttitor massa id.<br>Sed libero enim sed faucibus
			turpis in eu. Quis auctor elit sed vulputate mi sit. Quam vulputate dignissim suspendisse in est
			ante in. Nam at lectus urna duis. Ut porttitor leo a diam sollicitudin tempor. Adipiscing diam
			donec adipiscing tristique risus nec feugiat. Urna nec tincidunt praesent semper feugiat. Quisque
			egestas diam in arcu cursus euismod quis viverra nibh. Nisl pretium fusce id velit ut tortor.
			Porttitor rhoncus dolor purus non enim praesent elementum. Malesuada pellentesque elit eget gravida
			cum sociis natoque.<br>Ornare aenean euismod elementum nisi quis eleifend quam adipiscing. Purus in
			mollis nunc sed id semper. Egestas quis ipsum suspendisse ultrices gravida dictum fusce ut
			placerat. Tempor orci eu lobortis elementum nibh tellus molestie nunc. Sed vulputate mi sit amet
			mauris commodo. Nec ullamcorper sit amet risus nullam. Aenean euismod elementum nisi quis eleifend
			quam. Morbi non arcu risus quis varius quam quisque. Est velit egestas dui id ornare arcu odio ut
			sem. Pellentesque eu tincidunt tortor aliquam nulla facilisi cras fermentum odio. Nibh tortor id
			aliquet lectus proin nibh nisl condimentum id. In hendrerit gravida rutrum quisque non tellus orci.
			Vehicula ipsum a arcu cursus. Amet risus nullam eget felis eget nunc lobortis. Enim nunc faucibus
			a pellentesque. Dignissim convallis aenean et tortor. Imperdiet proin fermentum leo vel orci porta
			non pulvinar neque.</p>
		<?php else: ?>
			<p>Items Found:<?=$result_count;?></p>
			<!--consider adding button to order results by name/price/system here-->
			<section class="items">
				<?php foreach($items as $item):?>
					<div class="item-card">
						<div class="item-image">
							<img src="img\<?=$item['system'];?>\<?=$item['imagelink'];?>" alt="<?=$item['name'].' Image';?>"/>
						</div>
						<div class="item-info">
							<h1><?=$item['name'];?></h1>
							<h2>$<?=$item['price'];?></h2>
							<p><?=$item['description'];?><br></p>
						</div>
					</div>
				<?php endforeach;?>
			</section>
		<?php endif;?>
		</article>
</body>
<footer>
	<?php include 'footer.php';?>
</footer>
</html>
