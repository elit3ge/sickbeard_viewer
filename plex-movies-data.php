<?php

// Settings
include 'config.php';
include 'header.php';
include 'plex-header.php';

$movieid = $_GET['movieid'];

$url = "http://".$plex_ip."/library/metadata/".$movieid;
$achxml = simplexml_load_file($url);
foreach($achxml->Video AS $child) {
	echo "<h1>".$child['title']."</h1>";
    echo "<b>Year:</b> ".$child['year']." - <b>Views:</b> ".$child['viewCount']."<br>";
    echo "<b>Summary:</b> ".$child['summary']."<br>";
    echo "<b>Studio:</b> ".$child['studio']."<br>";
    echo "<b>File Location:</b> ".$child->Media->Part['file']."<br><br>";
   	printf("<img src=http://".$plex_ip.$child['thumb'].">");

}

include 'footer.php';

?>