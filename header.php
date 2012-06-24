<?php



echo "<center>";
echo "<h1>".$site_name."'s Collection</h1>";

// Check is sab is enabled
if ($sab_enabled == "1")
{
	echo "<a href='index.php'>Airing Soon</a> | <a href='shows.php'>Shows</a> | <a href='season.php'>New Seasons</a> | <a href='downloaded.php'>Recently Snatched</a> | <a href='sabnzbd.php'>Download Queue</a>";
}
else
{
	echo "<a href='index.php'>Airing Soon</a> | <a href='shows.php'>Shows</a> | <a href='season.php'>New Seasons</a> | <a href='downloaded.php'>Recently Snatched</a>";
}
echo "</center>";

?>