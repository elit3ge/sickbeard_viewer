<?php

include 'config.php';
include 'header.php';
echo "<center>";
$albumid = $_GET['id'];

$feed = $headphones_ip."/api?apikey=".$headphones_api."&cmd=getAlbum&id=".$albumid;
        
$sbJSON = json_decode(file_get_contents($feed));
	
foreach($sbJSON->{album} as $headphones) {
		echo "<title>".$headphones->{AlbumTitle}." | ".$headphones->{ArtistName}." | ".$site_name."</title>";
		echo "<h1>".$headphones->{AlbumTitle}." | ".$headphones->{ArtistName}."</h1><br>";
		printf("<img src=".$headphones->{ArtworkURL}."><br><br>");
		echo "<b>Album Title:</b> ".$headphones->{AlbumTitle}."<br>";
		echo "<b>Artist:</b> ".$headphones->{ArtistName}."<br>";
		echo "<b>Release Date:</b> ".$headphones->{ReleaseDate}."<br>";
		if ($headphones->{Status} == "Ignored")
			{ echo "<b>Status:</b><font color='#666666'> Archived </font><br /><br />"; }
        elseif ($headphones->{Status} == "Snatched")
			{ echo "<b>Status:</b><font color='#5cc5ef'> Snatched </font><br /><br />"; }
        elseif ($headphones->{Status} == "Downloaded")
			{ echo "<b>Status:</b><font color='#28ad1f'> Downloaded </font><br /><br />"; }
        elseif ($headphones->{Status} == "Wanted")
			{ echo "<b>Status:</b><font color='#ffd9d4'> Wanted </font><br /><br />"; }
        elseif ($headphones->{Status} == "Skipped")
			{ echo "<b>Status:</b><font color='#c0c0c0'> Skipped </font><br /><br />"; }
	}

foreach($sbJSON->{tracks} as $headphones) {
		echo "<b>Track:</b> ".$headphones->{TrackNumber}."<br>";
    	echo "<b>Title:</b> ".$headphones->{TrackTitle}."<br>";
    	echo "<b>Format:</b> ".$headphones->{Format}."<br>";
    	echo "<b>Location:</b> ".$headphones->{Location}."<br><br>";

	}
echo "</center>";
include 'footer.php';

?>