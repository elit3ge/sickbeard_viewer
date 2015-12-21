<?php

include 'config.php';
echo "<title>Headphones | ".$site_name."</title>";
echo "<center>";
include 'header.php';

$feed = $headphones_ip."/api?apikey=".$headphones_api."&cmd=getIndex";
        
$sbJSON = json_decode(file_get_contents($feed));
	
echo "<h1>Headphones</h1><br>";

foreach($sbJSON as $headphones) {
    	echo "<a href='headphones-artist.php?id=".$headphones->{ArtistID}."'>".$headphones->{ArtistName}."</a><br>";
	}
echo "</center>";
include 'footer.php';

?>