<?php

$filename = 'config.php';

if (file_exists($filename)) {

	// Settings
	include 'config.php';

	echo "<title>Airing Soon | ".$site_name."</title>";
	if ($sickbeard_enabled == "1") {

		echo "<center>";
		include 'header.php';

		// Feed URL
		$feed = $ip."/api/".$api."/?cmd=future&sort=date&type=soon";
		$feed2 = $ip."/api/".$api."/?cmd=future&sort=date&type=today|missed";
			
		$sbJSON = json_decode(file_get_contents($feed));
		$sbJSON2 = json_decode(file_get_contents($feed2));

		// What are you!?
		echo "<h1>Airing Soon</h1>";
		echo "<br>";

		// Remove Today header if no shows
		if ($sbJSON2->{data}->{today} == "")
			{ }
		else
			{
			echo "<u><b>Today</b></u><br><table style='width:712'>";
			}

		// Run through each feed item
		foreach($sbJSON2->{data}->{today} as $show2) {

			// Reformat date
			$newDate2 = date("l, j F Y", strtotime($show2->{airdate}));

			// Show Details
			echo "<tr><td width='300'><a href='seasonlist.php?showid=".$show2->{tvdbid}."'>" . $show2->{show_name} . "</a></td><td align='right' width='62'>S" . $show2->{season} . "</td><td width='40'>E" . $show2->{episode} . "</td><td align='center' width='310'>" .$newDate2 . "</td></tr>";
		}
		echo "</table>";

		echo "<br><b><u>Later</u></b><br><table style='width:712'>";
		foreach($sbJSON->{data}->{soon} as $show) {
			// Only grab shows of episode 1

			// Reformat date
			$newDate = date("l, j F Y", strtotime($show->{airdate}));

			// Show Details
			echo "<tr><td width='300'><a href='seasonlist.php?showid=".$show->{tvdbid}."'>".$show->{show_name} . "</a></td><td align='right' width='62'>S" . $show->{season} . "</td><td width='40'>E" . $show->{episode} . "</td><td align='center' width='310'>" .$newDate . "</td></tr>";
		}
		echo "</table>";

		// Remove Today header if no shows
		if (!empty($sbJSON->{data}->{missed}))
		{ }
		else
		{
		  echo "<br><b><u>Missed</u></b><br><table style='width:712'>";
		}

		// Run through each feed item
		foreach($sbJSON2->{data}->{missed} as $show3) {

			// Reformat date
			$newDate3 = date("l, j F Y", strtotime($show3->{airdate}));

			// Show Details
			echo "<tr><td width='300'><a href='seasonlist.php?showid=".$show3->{tvdbid}."'>" . $show3->{show_name} . "</a></td><td align='right' width='62'>S" . $show3->{season} . "</td><td width='40'>E" . $show3->{episode} . "</td><td align='center' width='310'>" .$newDate3 . "</td></tr>";
		}
		echo "</table>";
		echo "</center>";
		include 'footer.php';

	} else
	{ echo '<br>Sickbeard is Disabled in Config. Please Enable it to see the Airing Soon items.'; }

} else {
    echo "Config file is missing.";
}

?>