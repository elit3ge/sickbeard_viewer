<?php

// Settings

include 'config.php';
include 'header.php';
echo "<center>";
include 'plex-header.php';

echo "<title>PlexMovies | ".$site_name."</title>";

$url = $plex_ip."/library/sections/".$plex_mov."/all?X-Plex-Token=".$plex_token;
$achxml = simplexml_load_file($url);
echo "<h1>PlexMovies</h1><br>";
foreach($achxml->Video AS $child) {
    echo "<a href='plex-movies-data.php?movieid=".$child['ratingKey']."'>".$child['title']."</a><br>";
}

include 'footer.php';
echo "</center>";
?>