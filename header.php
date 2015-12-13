<?php

//Set Trakt to 0 as they have moved to API2
$trakt_enabled = "0";

echo "<head>";
	echo "<meta charset='UTF-8'>";
	echo "<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>";
	echo "<meta name='description' content='Headphones 'default' interface - made by Elmar Kouwenhoven'>";
	echo "<meta name='author' content='Elmar Kouwenhoven'>";
	echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
	echo "<link rel='stylesheet' href='css/jquery-ui.min.css'>";
	echo "<link rel='stylesheet' href='css/style.css'>";
	echo "<link rel='stylesheet' href='css/font-awesome.min.css'>";
	echo "<script src='js/libs/modernizr-2.8.3.min.js'></script>";
echo "</head>";
echo "<body>";
	echo "<div id='container'>";
		echo "<header>";
			echo "<div class='wrapper'>";
			echo "<div id='logo'>";
				//echo "<a href='home'><img src='images/logo.png' alt='logo' width='64'></a>";
			echo "</div>";
			echo "<ul id='nav'>";
				if ($sickbeard_enabled == "1") {
					echo "<li><a href='index.php'>Airing Soon</a></li>"; 
					echo "<li><a href='shows.php'>Shows</a></li>";
					echo "<li><a href='season.php'>New Seasons</a></li>"; 
					echo "<li><a href='downloaded.php'>Recently Snatched</a></li>"; } else {}
				if ($sab_enabled == "1") {
					echo "<li><a href='sabnzbd.php'>SabNZBd Queue</a></li>"; } else {}
				if ($nzbget_enabled == "1") {
					echo "<li><a href='nzbget.php'>NzbGet Queue</a></li>"; } else {}
				if ($plex_enabled == "1") {
					echo "<li><a href='plex-ondeck.php'>Plex</a></li>"; } else {}
				if ($headphones_enabled == "1") {
					echo "<li><a href='headphones.php'>Headphones</a></li>"; } else {}
				//echo "<li><a href='config' class='config'><i class='fa fa-gear fa-lg'></i></a></li>";
			echo "</ul>";
			echo "</div>";
		echo "</header>";
echo "<div id='main' class='main'>";
?>