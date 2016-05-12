<?php

include 'config.php';
include 'header.php';

// Get the show id from last page
$showid = $_GET['showid'];
$seasonid = $_GET['seasonid'];

// Check if username is available, set URL
    $feed = $ip."/api/".$api."/?cmd=show.seasons&tvdbid=".$showid."&season=".$seasonid;
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
echo "<title>".$title." | Season ".$seasonid." | ".$site_name."</title>";
echo "<center>";

// What are you!?
echo "<h1>".$title." - Season ".$seasonid."</h1><br>";
echo "<button><a href='seasonlist.php?showid=".$showid."'>Back</a></button><br><br>";

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

// Define episode counter
$counter = "1";

// Run through each feed item
foreach($sbJSON->{data} as $show) {

        // Show Details
        echo "<button><a href='epdata.php?showid=".$showid."&seasonid=".$seasonid."&ep=".$counter."'><b>Episode:</b> " . $counter . "</a></button><br />";
        echo "<b>Name:</b> " . $show->{name} . "<br />";
        echo "<b>Aired:</b> " . $show->{airdate} . "<br />";
		echo "<b>Quality:</b> " . $show->{quality};
		
		if ($show->{quality} == "SD TV")
		{
			printf("<img src='images/SDTV.png'>");
		}
		elseif ($show->{quality} == "SD DVD")
		{
			printf("<img src='images/SDDVD.png'>");
		}
		elseif ($show->{quality} == "720p HDTV")
		{
			printf("<img src='images/720TV.png'>");
		}
		elseif ($show->{quality} == "1080p HDTV")
		{
			printf("<img src='images/1080TV.png'>");
		}
		elseif ($show->{quality} == "1080p WEB-DL")
		{
			printf("<img src='images/1080DL.png'>");
		}
		else
		{
			printf("<img src='images/unknown.png'>");
		}
		
		echo " - Size: " . round($show->{file_size}/1024/1024,2) . " MB<br />";
		
        if ($show->{status} == "Archived")
        {
        	echo "<b>Status:</b><font color='#41A317'> Archived </font><br /><br />";
        }
        elseif ($show->{status} == "Snatched")
        {
        	echo "<b>Status:</b><font color='#ec9fea'> Snatched </font><br /><br />";
        }
        elseif ($show->{status} == "Downloaded")
        {
			echo "<b>Status:</b><font color='#92e49f'> Downloaded </font><br /><br />";
        }
        elseif ($show->{status} == "Wanted")
        {
        	echo "<b>Status:</b><font color='#306EFF'> Wanted </font><br /><br />";
        }
        elseif ($show->{status} == "Unaired")
        {
        	echo "<b>Status:</b><font color='#f0e3ba'> Unaired </font><br /><br />";
        }
        else
        {
        	echo "<b>Status:</b><font color='#8dceed'> Skipped </font><br /><br />";
        }

        $counter = $counter + "1";
    }
include 'footer.php';
echo "</center>";
?>