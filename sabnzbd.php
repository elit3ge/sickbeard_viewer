<?php

// Settings
include 'config.php';
include 'header.php';
echo "<title>Download Queue | ".$site_name."</title>";

// Feed URL
$feed = "http://".$sab_ip."/api?mode=qstatus&output=json&apikey=".$sab_api;
    
$sbJSON = json_decode(file_get_contents($feed));

if($sab_enabled == "1")
{

// What are you!?
echo "<h1>Download Queue</h1>";

if ($sbJSON->{mb} > "0")
{
echo "Timeleft: ".$sbJSON->{timeleft}."<br />";
if ($sbJSON->{paused} == "")
{
}
else
{
	echo "Downloads Paused: ".$sbJSON->{paused}."<br />";
}
echo "Queued: ".$sbJSON->{mb}." MB<br />";
echo "Speed: ".$sbJSON->{kbpersec}." Kbps<br />";
echo "Jobs:<br>";

foreach($sbJSON->{jobs} as $job) {

        // Show Details
        echo "Filename: ".$job->{filename}."<br>";
        echo "Size: ".$job->{mb}."<br>";
        echo "Size Left: ".$job->{mbleft}."<br><br>";
        
}
}
else
{
	echo "Queue is Empty!";
}
}
else
{
	echo "<br><center>Module is disabled!</center>";
}
?>