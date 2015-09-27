<?php


// Settings

include 'config.php';
include 'header.php';
//include 'plex-header.php';

echo "<title>SonarrShows | ".$site_name."</title>";

$url = $sonarr_ip."/system/status";
header(x-api-key:ebb65baff4dd4a0ca0634cc34925bdba);
$achxml = simplexml_load_file($url);
echo "<h1>SonarrShows</h1>";
foreach($achxml->Directory AS $child) {
    //echo "<a href='plex-shows-season.php?key=".$child['ratingKey']."'>".$child['title']."</a><br>";
    echo $child['version'];
}

include 'footer.php';

?>