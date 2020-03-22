<html>
<head>
<title>Index</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<!--include javascript externals here-->
</head>
<body>
<?php include 'header.php';?>
<nav>  <!--possibly use css flex for layouts, but for now here is nav, aside, and article-->
	<ul>
		<li><a href="www.somelink.com">Link 1</a></li>
		<li><a href="www.somelink.com">Link 2</a></li>
		<li><a href="www.somelink.com">Link 3</a></li>
	</ul>
</nav>
<aside>
	<form action="handle_search.php" method="get">
	<ul>
		<li><p>Option 1 (Dropdown or check box)</p></li>
		<li><p>Option 2 (Dropdown or check box)</p></li>
		<li><label for="priceslider">Max.Price</label><input type="range" name="priceslider" id="priceslider" min="0" max="500" value="50">
		<br><p>$<span id="price"></span></p></li>
	</ul>
	<input type="submit" value="Search">
	<form>
</aside>
<article>
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
</article>
</body>
<footer>
<?php include 'footer.php';?>
</footer>
</html>