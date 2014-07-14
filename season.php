<?php

// Settings

include 'config.php';
echo "<title>New Seasons | ".$site_name."</title>";

$feed = $ip."/api/".$api."/?cmd=future&sort=date&type=later";
    
$sbJSON = json_decode(file_get_contents($feed));

// What are you!?
echo "<center>";
include 'header.php';
echo "<h1>New Season Start Dates</h1>";
echo "<table style='width:auto'>";

// Run through each feed item
foreach($sbJSON->{data}->{later} as $show) {
    // Only grab shows of episode 1
    if($show->{episode} == "1") {

        // Reformat date
        $newDate = date("l, j F Y", strtotime($show->{airdate}));

        // Show Details
        echo "<tr><td><a href='episode.php?showid=".$show->{tvdbid}."&seasonid=".$show->{season}."'>".$show->{show_name} . ", Season " . $show->{season} . "</a></td><td>" .$newDate . "</td></tr>";
    }
}
echo "</table>";
include 'footer.php';
echo "</center>";
?>