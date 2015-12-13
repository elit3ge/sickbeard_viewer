<?php

// include version
include 'version.php';

//Close Content
echo "</div>";
		echo "<footer>";
			echo "<div id='info'>";
				echo "<small>";
				echo "<a href='http://bit.ly/1jYt1q3'> Website</a> |";
				//echo "<a href='https://github.com/rembo10/headphones/wiki/TroubleShooting'><i class='fa fa-ambulance'></i> Help</a>";
				echo "</small>";
			echo "</div>";
			echo "<div id='actions'>";
				echo "<small>";
				//echo "<a href='shutdown'><i class='fa fa-power-off'></i> Shutdown</a> |";
				//echo "<a href='restart'><i class='fa fa-power-off'></i> Restart</a> |";
				echo "Copyright (C) ".date(Y)." - ".$site_name;
				echo "</small>";
			echo "</div>";
			echo "<div id='version'>";
				echo "Version: <em>";
				echo $version;
				echo "</em>";
			echo "</div>";
		echo "</footer>";
		echo "<a href='#main' id='toTop'><i class='fa fa-angle-double-up'></i> <span>Back to top</span></a>";
	echo "</div>";

	echo "<script src='js/libs/jquery-1.11.1.min.js'></script>";
	echo "<script src='js/libs/jquery-ui.min.js'></script>";
	echo "<script src='js/common.js'></script>";
	echo "<script src='js/script.js'></script>";
	echo "<!-- This template is made by Elmar Kouwenhoven -->";

echo "</body>";
echo "</html>";
?>