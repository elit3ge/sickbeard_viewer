<?php

// Settings
include 'config.php';
include 'header.php';

// Get the show id from last page
$showid = $_GET['showid'];

// Show URL
    $feed = "http://".$ip."/api/".$api."/?cmd=show.seasonlist&tvdbid=".$showid."&sort=asc";
    $feed2 = "http://".$ip."/api/".$api."/?cmd=show&tvdbid=".$showid;
    
$sbJSON = json_decode(file_get_contents($feed));
$tvdata = json_decode(file_get_contents($feed2));

// Grab Show Title
$title = $tvdata->{data}->{show_name};

//Display Browser Title
echo "<title>".$title." | ".$site_name."</title>";

// What are you!?
echo "<h1>".$title." Seasons</h1>";
echo "<a href='shows.php'>Back</a><br><br>";

// Display Show Bannger
printf("<img src=http://".$ip."/api/".$api."/?cmd=show.getbanner&tvdbid=".$showid."><br><br>");

// Run through each feed item
foreach($sbJSON->{data} as $show) {

        // Show Details
        if ($show == '0')
        {
        	echo "<a href='episode.php?showid=".$showid."&seasonid=".$show."'>Specials </a><br />";
        }
        else
        {
        	echo "<a href='episode.php?showid=".$showid."&seasonid=".$show."'>Season ".$show." </a><br />";
        }
    }
// Fix Next Ep
if ($tvdata->{data}->{next_ep_airdate} == "")
{
	$next_ep = "N/A";
}
else
{
	$next_ep = $tvdata->{data}->{next_ep_airdate};
}
// Show Details
echo "<br>Network: ".$tvdata->{data}->{network}.", Airs: ".$tvdata->{data}->{airs}.", Next Ep: ".$next_ep.", Show Status: ".$tvdata->{data}->{status};

?>