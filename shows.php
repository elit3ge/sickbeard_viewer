<center>
<?php

include 'config.php';

// Set Title
echo "<title>TV Shows | ".$site_name."</title>";

include 'header.php';

$feed = $ip."/api/".$api."/?cmd=shows&sort=name&paused=0";
$feed2 = $ip."/api/".$api."/?cmd=shows.stats"; 

$sbJSON = json_decode(file_get_contents($feed),true);
$stats = json_decode(file_get_contents($feed2));

echo "<h1>Shows</h1>";
echo "<br>";
echo '<table>';

foreach ($sbJSON['data'] as $key => $values)
	{
			echo '<tr>';
				echo '<td>';
					echo '<a href="seasonlist.php?showid=' . $values['tvdbid'] . '">';
					printf("<img width='300' src=".$ip."/api/".$api."/?cmd=show.getbanner&tvdbid=".$values['tvdbid'].">");
					echo '</a>';
				echo '</td>';	
				echo '<td align="center" style="vertical-align:middle">';
					echo '<a href="seasonlist.php?showid=' . $values['tvdbid'] . '">' . $key . '</a>';
				echo '</td>';
				echo '<td style="vertical-align:middle">';
					echo $values['status'];
				echo '</td>';
			echo '</tr>';

	}

echo '</table>';
echo "<br>Eps Downloaded: ".$stats->{data}->{ep_downloaded}." of ".$stats->{data}->{ep_total}." == Shows Active: ".$stats->{data}->{shows_active}." of ".$stats->{data}->{shows_total};
include 'footer.php';
?>
</center>
