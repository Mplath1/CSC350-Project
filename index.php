<?php

if (!isset($_SESSION)) session_start();

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
<script src="jquery-3.5.1.min.js"></script>
<script src="scripts.js"></script>
</head>
<body>
<?php include 'header.php';?>
	<nav>
		<ul>
			<li><a href="www.somelink.com"></a></li>
			<li><a href="www.somelink.com"></a></li>
			<li><a href="www.somelink.com"></a></li>
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
							<option value="<?= $systems['system_intials']?>" <?php if (isset($_REQUEST['systemselecter'])) { if ($systems['system_intials'] == $_REQUEST['systemselecter']) { echo 'selected="selected"'; }} ?> >
								<?= $systems['system_name']?></option>
						<?php endforeach;?>
					</select>
					</li>
					<li><label for="genreselecter">Genre</label>
						<?php foreach($genres as $genres):?>
						<div class="genreoption">
							<input type="checkbox" id="<?= $genres['genre_name']?>"
							 name="genre[]"
							 value="<?= $genres['genre_name']?>" <?php if (isset($_REQUEST['genre'])) { if (in_array($genres['genre_name'], $_REQUEST['genre'])) { echo 'checked="checked"'; }} ?>">
							<label for "<?= $genres['genre_name']?>">
								<?= $genres['genre_name']?></label>
						</div>
						<?php endforeach;?>
					</li>
					<li><label for="priceslider">Max.Price: $<span id="currentpricemin"></span>-<span id="currentpricemax"></span></label> 
						<div id="pricesliderdiv">
							<div id="pricesliderrange"></div>
							<input type="text" readonly class="priceslider" name="priceslidermin" id="priceslidermin" value="<?php if (isset($_REQUEST['priceslidermin'])) { echo $_REQUEST['priceslidermin']; } else { echo 0; } ?>">
							<input type="text" readonly class="priceslider" name="priceslidermax" id="priceslidermax" value="<?php if (isset($_REQUEST['priceslidermax'])) { echo $_REQUEST['priceslidermax']; } else { echo 200; } ?>">
						</div>
					</li>
					<script src="scripts.js"></script>
				</ul>
			</div>
			<div style="width:100%; text-align:center;">
				<div style="display: inline-block; margin: 0 auto; text-align:left;">
					<input type="submit" value="Search">
				</div>
			</div>
		</form>
	</aside>
	<article>
		<?php if (empty($items)):?>
			<div class="genericPanelRed" style="margin-left: 24px; width: calc(100% - 400px);">
				<h1>Welcome to Group One!</h1>
				<h4>Group One is a retro gaming site dedicated to the obscure, innovative,
					 and cult. Our inventory is carefully curated by a team of knowledgeble
					 experts to bring you classics you may have missed the first time around
					  so that you can experience them again in their original cartridge
						(or disc) form.</h4>
			</div>
		<?php else: ?>
			<p class="genericPanelRed" style="margin-left: 24px;">Items Found:<?=$result_count;?><br/><b><?=$search;?></b></p>
			<!--consider adding button to order results by name/price/system here-->
			<section class="items">
				<?php foreach($items as $item):?>
					<div class="item-card">
						<div class="item-image">
							<img src="img\<?=$item['system'];?>\<?=$item['imagelink'];?>"
							 alt="<?=$item['name'].' Image';?>"/>
						</div>
						<div class="item-info">
							<?php if (isset($_SESSION['LoggedInUsername'])):?>
								<form action="handle_delete_item.php" method="get" class="item-delete-button">
									<input type="submit" name="select" value="X" onclick="return confirm('\tYou are about to permanently delete this item.\t\n\t\tAre you sure you wish to proceed?\t\t')"/>
									<input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>"/>
								</form>
							<?php endif;?>
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
