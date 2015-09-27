<?php

//start css
echo "<link rel='stylesheet' type='text/css' href='style.css' />";
echo "<div id='site_content'>";

//Set Trakt to 0 as they have moved to API2
$trakt_enabled = "0";

//start center
echo "<center>";
// display title
echo "<h1>".$site_name."'s Collection</h1>";

if ($sickbeard_enabled == "1") { echo "<a href='index.php'>Airing Soon</a> | <a href='shows.php'>Shows</a> | <a href='season.php'>New Seasons</a> | <a href='downloaded.php'>Recently Snatched</a>"; } else {}
if ($sab_enabled == "1") { echo " | <a href='sabnzbd.php'>Download Queue</a>"; } else {}
if ($plex_enabled == "1") { echo " | <a href='plex-ondeck.php'>Plex</a>"; } else {}
if ($headphones_enabled == "1") { echo " | <a href='headphones.php'>Headphones</a>"; } else {}

?>