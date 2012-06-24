<?php

// Settings
include 'config.php';
echo "<title>Recently Snatched | ".$site_name."</title>";

// Check if username is available, set URL
// This probably isn't necessary
    $feed = "http://".$ip."/api/".$api."?cmd=history&type=snatched&limit=25";
    
$sbJSON = json_decode(file_get_contents($feed));

// What are you!?
echo "<center>";
include 'header.php';
echo "<h1>Recently Snatched</h1>";

// Run through each feed item
foreach($sbJSON->{data} as $show) {

        // Reformat date
        $newDate = date("l, j F Y g:ia", strtotime($show->{date}));

        // Show Details
        echo "<a href='seasonlist.php?showid=".$show->{tvdbid}."'>" . $show->{show_name} . "</a>, S" . $show->{season} . " E" . $show->{episode} . " | " .$newDate . "<br />";
}
include 'footer.php';
echo "</center>";
?>