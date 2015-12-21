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
$feed = $nzbget_prot.$nzbget_username.":".$nzbget_passsword."@".$nzbget_ip."/jsonrpc/listfiles"; 
    
$sbJSON = json_decode(file_get_contents($feed));

if($nzbget_enabled == "1")
{

// What are you!?
echo "<h1>NzbGet Download Queue</h1>";





// if empty - create

foreach($sbJSON as $job) {

        // Show Details
        echo "<b>Filename:</b> ".$job['NZBNicename']."<br>";
        echo "<b>Size:</b> ".$job->{mb}."<br>";
        //echo "<b>Size Left:</b> ".$job->{mbleft}."<br><br>";
        
}

}
else
{
	echo "<br><b>Module is disabled!</b>";
}
include 'footer.php';
echo "</center>";
?>