<?php

// Settings
include 'config.php';
echo "<title>Recently Snatched | ".$site_name."</title>";

// Set URL
$feed = $ip."/api/".$api."?cmd=history&type=snatched&limit=".$sick_grab_limit;
    
$sbJSON = json_decode(file_get_contents($feed));

// What are you!?
echo "<center>";
include 'header.php';
echo "<h1>Recently Snatched</h1>";
echo "<br>";
echo "<table style='width:705'>";

// Run through each feed item
foreach($sbJSON->{data} as $show) {

	// Reformat date
    $newDate = date("l, j F Y g:ia", strtotime($show->{date}));

    // Show Details
    echo "<tr><td><a href='epdata.php?showid=".$show->{tvdbid}."&seasonid=".$show->{season}."&ep=".$show->{episode}."'>" . $show->{show_name} . ", S" . $show->{season} . " E" . $show->{episode} . "</a></td><td>" .$newDate . "</td></tr>";
}
echo '</table>';
include 'footer.php';
echo "</center>";
?>