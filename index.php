<?php

$filename = 'config.php';

if (file_exists($filename)) {

include 'config.php';
echo "<title>Coming Soon | ".$site_name."</title>";

echo "<center>";
	include 'header.php';
	include 'soon.php';
	include 'footer.php';
echo "</center>";

} else {
    echo "Config file is missing.";
}

?>
