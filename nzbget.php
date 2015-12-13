<?php

// Settings
include 'config.php';
include 'header.php';
echo "<title>NzbGet Download Queue | ".$site_name."</title>";
echo "<center>";

//Check for SSL
if ($nzbget_ssl == "1")
{ $nzbget_prot = "https://";}
else
{ $nzbget_prot = "http://"; }

// Feed URL - http://username:password@localhost:6789/jsonrpc
$feed = $nzbget_prot.$nzbget_username.":".$nzbget_passsword."@".$nzbget_ip."/jsonrpc"; 
    
$sbJSON = json_decode(file_get_contents($feed));

if($nzbget_enabled == "1")
{

// What are you!?
echo "<h1>NzbGet Download Queue</h1>";

if ($sbJSON->{mb} > "0")
{
echo "<b>Timeleft:</b> ".$sbJSON->{timeleft}."<br />";
if ($sbJSON->{paused} == "")
{
}
else
{
	echo "<b>Downloads Paused:</b> ".$sbJSON->{paused}."<br />";
}
echo "<b>Queued:</b> ".$sbJSON->{mb}." MB<br />";
echo "<b>Speed:</b> ".$sbJSON->{kbpersec}." Kbps<br /><br>";
echo "<b>Jobs:</b><br>";

foreach($sbJSON->{jobs} as $job) {

        // Show Details
        echo "<b>Filename:</b> ".$job->{filename}."<br>";
        echo "<b>Size:</b> ".$job->{mb}."<br>";
        echo "<b>Size Left:</b> ".$job->{mbleft}."<br><br>";
        
}
}
else
{
	echo "<b>Queue is Empty!</b>";
}
}
else
{
	echo "<br><b>Module is disabled!</b>";
}
include 'footer.php';
echo "</center>";
?>