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
							<option value="<?= $systems['system_intials']?>">
								<?= $systems['system_name']?></option>
						<?php endforeach;?>
					</select>
					</li>
					<li><label for="genreselecter">Genre</label>
						<?php foreach($genres as $genres):?>
						<div class="genreoption">
							<input type="checkbox" id="<?= $genres['genre_name']?>"
							 name="genre[]"
							 value="<?= $genres['genre_name']?>">
							<label for "<?= $genres['genre_name']?>">
								<?= $genres['genre_name']?></label>
						</div>
						<?php endforeach;?>
							</li>
					<li><label for="priceslider">Max.Price</label>
					<input type="range" name="priceslider" id="priceslider" min="0"
					max="500" value="50">
					<br><p>$<span id="currentprice"></span></p></li>
					<script src="scripts.js"></script>
				</ul>
					<input type="submit" value="Search">
				</div>
			</form>
	</aside>
	<article>
		<?php if (empty($items)):?>
			<h1>Welcome to Group One!</h1>
			<h4>Group One is a retro gaming site dedicated to the obscure, innovative,
				 and cult. Our inventory is carefully curated by a team of knowledgeble
				 experts to bring you classics you may have missed the first time around
				  so that you can experience them again in their original cartridge
					(or disc) form.</h4>
		<?php else: ?>
			<h4><?=$search;?></h4>
			<p>Items Found:<?=$result_count;?></p>
			<!--consider adding button to order results by name/price/system here-->
			<section class="items">
				<?php foreach($items as $item):?>
					<div class="item-card">
						<div class="item-image">
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
