<?php

// Settings
include 'config.php';
include 'header.php';

// Get the show id from last page
$showid = $_GET['showid'];

// Show URL
$feed = $ip."/api/".$api."/?cmd=show.seasonlist&tvdbid=".$showid."&sort=asc";
$feed2 = $ip."/api/".$api."/?cmd=show&tvdbid=".$showid;
$feed3 = "https://api.trakt.tv/show/episode/summary.json/".$trakt_api."/".$showid."/1/1";

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
echo "<title>".$title." | ".$site_name."</title>";
echo "<center>";

// What are you!?
echo "<h1>".$title." Seasons List</h1><br>";
echo "<button><a href='shows.php'>Back</a></button><br><br>";

// trakt.tv banner intragration
if ($trakt_enabled == "1")
{
	if ($trakt->{status} == "failure")
	{
		// Display SickBeard Banner as trakt returned an error
		printf("<img src=".$ip."/api/".$api."/?cmd=show.getbanner&tvdbid=".$showid."><br><br>");
	}
	else
	{
		// Display trakt.tv Banner
		printf("<img src=".$trakt->{show}->{images}->{banner}."><br><br>");
	}
}
else
{
	// Display SickBeard Banner
	printf("<img src=".$ip."/api/".$api."/?cmd=show.getbanner&tvdbid=".$showid."><br><br>");
}

if ($trakt_enabled == "1")
{
	echo "<b>Year:</b> ".$trakt->{show}->{year}." | <b>Country:</b> ".$trakt->{show}->{country}."<br>";
	echo "<b>Network:</b> ".$trakt->{show}->{network}." | <b>Run Time:</b> ".$trakt->{show}->{runtime}." Mins<br>";
	echo "<b>Runs:</b> ".$trakt->{show}->{air_day}.", ".$trakt->{show}->{air_time}."<br>";
	echo "<b>Overview:</b> ".$trakt->{show}->{overview}."<br><br>";
}
else
{
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
echo "<b>Network:</b> ".$tvdata->{data}->{network}."<br> <b>Airs:</b> ".$tvdata->{data}->{airs}."<br> <b>Next Ep:</b> ".$next_ep."<br> <b>Show Status:</b> ".$tvdata->{data}->{status}."<br><br>";
}

// Run through each feed item
foreach($sbJSON->{data} as $show) {

        echo "- ";
        // Show Details
        if ($show == '0')
        {
        	echo "<button><a href='episode.php?showid=".$showid."&seasonid=".$show."'>Specials</a></button> -<br />";
        }
        else
        {
        	echo "<button><a href='episode.php?showid=".$showid."&seasonid=".$show."'>Season ".$show."</a></button> ";
        }
    }
include 'footer.php';
?>