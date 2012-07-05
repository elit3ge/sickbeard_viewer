<?php

// Settings
include 'config.php';
include 'header.php';
include 'plex-header.php';

$url = 'http://10.38.138.250:32400/library/sections/2/all';
$achxml = simplexml_load_file($url);
foreach($achxml->Video AS $child) {
    echo $child['title']."<br>";
}

include 'footer.php';

?>