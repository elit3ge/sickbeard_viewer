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
echo "<br>";
echo "<table style='width:705'>";

// Run through each feed item
foreach($sbJSON->{data}->{later} as $show) {
    // Only grab shows of episode 1
    if($show->{episode} == "1") {

        // Reformat date
        $newDate = date("l, j F Y", strtotime($show->{airdate}));
		
		// Work out days until
		$now = time(); // or your date as well
		$your_date = strtotime($newDate);
		$datediff = $your_date - $now;

        // Show Details
        echo "<tr><td width='380'><a href='episode.php?showid=".$show->{tvdbid}."&seasonid=".$show->{season}."'>".$show->{show_name} . ", Season " . $show->{season} . "</a></td><td width='245'>" .$newDate . "</td><td width='80'>".floor($datediff/(60*60*24))." days</tr>";
    }
}
echo "</table>";
include 'footer.php';
echo "</center>";
?>