<?php
if (!isset($_SESSION)) session_start();

echo "<div id=\"header\">";
echo "<img id=\"logo\" src=\"img/Logo_GroupOne.png\"/>";
echo "<a href=\"index.php\">Main</a>";
if (isset($_SESSION['LoggedInUsername'])) {
	echo "<a href=\"create_item.php\">Create Item</a>";
}
echo "<a href=\"blank.php\">Blank</a>";
include 'includeLogin.php';
echo "</div>"
?>