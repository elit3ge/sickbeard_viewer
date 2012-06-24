<?php

// Settings
include 'config.php';

// Feed URL
    $feed = "http://".$ip."/api/".$api."/?cmd=future&sort=date&type=soon";
    $feed2 = "http://".$ip."/api/".$api."/?cmd=future&sort=date&type=today";
    
$sbJSON = json_decode(file_get_contents($feed));
$sbJSON2 = json_decode(file_get_contents($feed2));

// What are you!?
echo "<h1>Airing Soon</h1>";

// Run through each feed item
foreach($sbJSON2->{data}->{today} as $show2) {
    // Only grab shows of episode 1

        // Reformat date
        $newDate2 = date("l, j F Y", strtotime($show2->{airdate}));

        // Show Details
        echo "<font color='#306EFF'><a href='seasonlist.php?showid=".$show2->{tvdbid}."'>" . $show2->{show_name} . "</a>, S" . $show2->{season} . " E" . $show2->{episode} . " | " .$newDate2 . "</font><br />";
}

foreach($sbJSON->{data}->{soon} as $show) {
    // Only grab shows of episode 1

        // Reformat date
        $newDate = date("l, j F Y", strtotime($show->{airdate}));

        // Show Details
        echo "<a href='seasonlist.php?showid=".$show->{tvdbid}."'>".$show->{show_name} . "</a>, S" . $show->{season} . " E" . $show->{episode} . " | " .$newDate . "<br />";
}

?>