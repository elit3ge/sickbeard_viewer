<?php

// Settings

include 'config.php';
include 'header.php';
echo "<center>";
include 'plex-header.php';
echo "</center>";

echo "<title>PlexShows | ".$site_name."</title>";

$url = $plex_ip."/library/onDeck";
$achxml = simplexml_load_file($url);
echo "<h1>PlexOnDeck</h1>";

echo '<table>';
foreach($achxml->Video AS $child) {
    //echo "<a href='plex-shows-season.php?key=".$child['ratingKey']."'>".$child['title']."</a><br>";
    echo '<tr>';
    echo '<td align="center">';
    echo printf("<img height='350' src=".$plex_ip.$child['art']."");
    echo '</td>';
    echo '<td align="center">';
    echo $child['grandparentTitle'];
    echo ' - ';
    echo $child['title'];
    echo '</td>';
    echo '</tr>';
}
echo '</table>';

include 'footer.php';

?>