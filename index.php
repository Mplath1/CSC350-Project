<?php
if(!isset($items)){$items=NULL;}
if(!isset($result_count)){$result_count=NULL;}

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
	<aside>
		<form action="handle_search.php" method="get">
			<div class="selection-window">
				<ul>
					<li><label for="systemselecter">System</label>
					<select  name="systemselecter" id="systemselecter">
						<option value="any">ANY</option>
						<option value="dc">DC</option>
						<option value="genesis">Genesis</option>
						<option value="saturn">Saturn</option>
						<option value="snes">SNES</option>
					</select><!--this should be autofilled from enum data in db-->
					</li>
					<li><label for="genreselecter">Genre</label>
						<!--GARBAGE should be autofilled from enum data in db-->
						<!--not yet implemented in search but it will be-->
						<div class="genreoption">
							<input type="checkbox" id="action" name="action" value="action">
							<label for "action">Action</label>
						</div>
						<div class="genreoption">
							<input type="checkbox" id="adventure" name="adventure" value="adventure">
							<label for "Adventure">Adventure</label>
						</div>
						<div class="genreoption">
							<input type="checkbox" id="fighting" name="fighting" value="fighting">
							<label for "fighting">Fighting</label>
						</div>
						<div class="genreoption">
							<input type="checkbox" id="roleplaying" name="roleplaying" value="roleplaying">
							<label for "roleplaying">Role-Playing</label>
						</div>
						<div class="genreoption">
							<input type="checkbox" id="sports" name="sports" value="sports">
							<label for "sports">Sports</label>
						</div>
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
							<!--changed image to invader_B.png for testing purposes-->
							<img src="img\<?=$item['system'];?>\<?=$item['imagelink'];?>.jpg"
							alt="<?=$item['name'].' Image';?>"/>
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
