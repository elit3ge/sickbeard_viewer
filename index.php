<?php

$filename = 'config.php';

if (file_exists($filename)) {

include 'config.php';
echo "<title>Airing Soon | ".$site_name."</title>";


echo "<center>";
	include 'header.php';
	if ($sickbeard_enabled == "1") {include 'soon.php';} else {echo '<br>Sickbeard is Disabled in Config. Please Enable it to see the Airing Soon items.';}
	include 'footer.php';
echo "</center>";

} else {
    echo "Config file is missing.";
}

?>
