<?php

include 'config.php';
include 'header.php';

// Get the show id from last page
$showid = $_GET['showid'];
$seasonid = $_GET['seasonid'];
$epid = $_GET['ep'];

// Define feeds
$feed = "http://".$ip."/api/".$api."/?cmd=episode&tvdbid=".$showid."&season=".$seasonid."&episode=".$epid;
$feed2 = "http://".$ip."/api/".$api."/?cmd=show&tvdbid=".$showid;
    
$sbJSON = json_decode(file_get_contents($feed));
$tvdata = json_decode(file_get_contents($feed2));

// Grab Show Title
$title = $tvdata->{data}->{show_name};

//Display Browser Title
echo "<title>".$title." | Season ".$seasonid." | Episode ".$epid." | ".$site_name."</title>";
echo "<center>";

// What are you!?
echo "<h1>".$title." Season ".$seasonid." Episode ".$epid."</h1>";
echo "<a href='episode.php?showid=".$showid."&seasonid=".$seasonid."'>Back</a><br>";

// Display Show Bannger
printf("<img src=http://".$ip."/api/".$api."/?cmd=show.getbanner&tvdbid=".$showid."><br><br>");

        // Show Details
        echo "Episode: " . $epid . "</a><br /><br>";
        echo "Name: " . $sbJSON->{data}->{name} . "<br /><br>";
        echo "Description: " . $sbJSON->{data}->{description} . "<br><br>";
        echo "Aired: " . $sbJSON->{data}->{airdate} . "<br /><br>";
        echo "Quality: " . $sbJSON->{data}->{quality} . "<br /><br>";
        if ($sbJSON->{data}->{status} == "Archived")
        {
        	echo "<font color='#41A317'>Status: Collected </font><br /><br />";
        }
        elseif ($sbJSON->{data}->{status} == "Snatched")
        {
        	echo "<font color='#41A317'>Status: Downloading... </font><br /><br />";
        }
        elseif ($sbJSON->{data}->{status} == "Downloaded")
        {
        	echo "<font color='#41A317'>Status: Collected </font><br /><br />";
        }
        elseif ($sbJSON->{data}->{status} == "Wanted")
        {
        	echo "<font color='#306EFF'>Status: Wanted </font><br /><br />";
        }
        else
        {
        	echo "<font color='#F62817'>Status: Not Collected </font><br /><br />";
        }
include 'footer.php';        
echo "</center>";
?>