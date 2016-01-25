<?php

// include version
include 'version.php';

//Close Content
echo "</div>";
		echo "<footer>";
			echo "<div id='info'>";
				echo "<small>";
				echo "<a href='http://bit.ly/1jYt1q3'> Website</a> |";
				echo "</small>";
			echo "</div>";
			echo "<div id='actions'>";
				echo "<small>";
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

echo "</body>";
echo "</html>";
?>