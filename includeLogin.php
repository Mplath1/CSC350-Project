<?php
if (!isset($_SESSION)) session_start();

echo "<div id=\"headerLogin\">";
if (isset($_SESSION['LoggedInUsername']))
{
  echo "<p>Welcome, " . $_SESSION['LoggedInUsername'] . "</p>";
  echo "<a href=\"logout.php\">Log Out</a>";
}
else
{
  echo "<a href=\"login.php\">Login</a>";
  //header("Location: login.php");
}
echo "</div>";
?>