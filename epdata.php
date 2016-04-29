<?php

include 'config.php';
include 'header.php';

// Get the show id from last page
$showid = $_GET['showid'];
$seasonid = $_GET['seasonid'];
$epid = $_GET['ep'];

// Define feeds
$feed = $ip."/api/".$api."/?cmd=episode&tvdbid=".$showid."&season=".$seasonid."&episode=".$epid;
$feed2 = $ip."/api/".$api."/?cmd=show&tvdbid=".$showid;
$feed3 = "https://api.trakt.tv/show/episode/summary.json/".$trakt_api."/".$showid."/".$seasonid."/".$epid;

// fetch trakt api
if ($trakt_enabled == "1")
{
	$sbJSON = json_decode(file_get_contents($feed));
	$tvdata = json_decode(file_get_contents($feed2));
	$trakt = json_decode(file_get_contents($feed3));
}
else
{
	$sbJSON = json_decode(file_get_contents($feed));
	$tvdata = json_decode(file_get_contents($feed2));
}

// Grab Show Title
$title = $tvdata->{data}->{show_name};

//Display Browser Title
echo "<title>".$title." | Season ".$seasonid." | Episode ".$epid." | ".$site_name."</title>";
echo "<center>";

// What are you!?
echo "<h1>".$title." - Season ".$seasonid." - Episode ".$epid."</h1><br>";
echo "<button><a href='episode.php?showid=".$showid."&seasonid=".$seasonid."'>Back</a></button><br><br>";

// trakt.tv banner intragration
if ($trakt_enabled == "1")
{
	printf("<img src=".$trakt->{show}->{images}->{banner}."><br><br>");
}
else
{
	// Display Show Banner
	printf("<img src=".$ip."/api/".$api."/?cmd=show.getbanner&tvdbid=".$showid."><br><br>");
}

        // Show Details
        echo "<b>Episode:</b> " . $epid . "</a><br />";
        echo "<b>Name:</b> " . $sbJSON->{data}->{name} . "<br />";
        if ($trakt_enabled == "1")
        {
        	echo "<b>Screen Grab:</b> <br>";
        	printf("<img src=".$trakt->{episode}->{images}->{screen}."><br><br>");
        }
        else
        {
        	echo "";
        }
        echo "<b>Description:</b> " . $sbJSON->{data}->{description} . "<br><br>";
        echo "<b>Size:</b> " . $sbJSON->{data}->{file_size_human} . "<br />";
        echo "<b>Aired:</b> " . $sbJSON->{data}->{airdate} . "<br />";
        echo "<b>Quality:</b> " . $sbJSON->{data}->{quality} . "<br />";
        if ($sbJSON->{data}->{status} == "Archived")
        {
        	echo "<b>Status:</b><font color='#41A317'> Archived </font><br /><br />";
        }
        elseif ($sbJSON->{data}->{status} == "Snatched")
        {
        	echo "<b>Status:</b><font color='#ec9fea'> Snatched </font><br /><br />";
        }
        elseif ($sbJSON->{data}->{status} == "Downloaded")
        {
        	echo "<b>Status:</b><font color='#92e49f'> Downloaded </font><br /><br />";
        }
        elseif ($sbJSON->{data}->{status} == "Wanted")
        {
        	echo "<b>Status:</b><font color='#306EFF'> Wanted </font><br /><br />";
        }
        elseif ($sbJSON->{data}->{status} == "Unaired")
        {
        	echo "<b>Status:</b><font color='#f0e3ba'> Unaired </font><br /><br />";
        }
        else
        {
        	echo "<b>Status:</b><font color='#8dceed'> Skipped </font><br /><br />";
        }
include 'footer.php';        
echo "</center>";
?>