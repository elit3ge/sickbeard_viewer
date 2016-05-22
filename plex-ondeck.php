<?php

// Settings

include 'config.php';
include 'header.php';
echo "<center>";
include 'plex-header.php';
echo "</center>";

echo "<title>PlexShows | ".$site_name."</title>";

$url = $plex_ip."/library/onDeck?X-Plex-Token=".$plex_token;
$achxml = simplexml_load_file($url);
echo "<h1>PlexOnDeck</h1>";

echo '<table>';
foreach($achxml->Video AS $child) {
    //echo "<a href='plex-shows-season.php?key=".$child['ratingKey']."'>".$child['title']."</a><br>";
    echo '<tr>';
    echo '<td align="center">';
    echo printf("<img height='350' src=".$plex_ip.$child['art'].'?X-Plex-Token='.$plex_token.">");
    echo '</td>';
    echo '<td align="center" style="vertical-align:middle">';
    echo $child['grandparentTitle'];
    echo ' - ';
    echo $child['title'];
    echo '</td>';
    echo '</tr>';
}
echo '</table>';

include 'footer.php';

?>