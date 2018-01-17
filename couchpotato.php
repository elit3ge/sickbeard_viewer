<center>
<?php

include 'config.php';

// Set Title
echo "<title>Couchpotato | ".$site_name."</title>";

include 'header.php';

$feed = $couchpotato_ip."/api/".$couchpotato_api."/movie.list";


$sbJSON = json_decode(file_get_contents($feed),true);

echo "<h1>CouchPotato</h1>";
echo "<br>";
echo '<table>';

foreach ($sbJSON['movies'] as $key => $values)

	{
			echo '<tr>';
				echo '<td align="middle">';
					echo '<a href="http://www.imdb.com/title/' . $values['identifiers']['imdb'] . '" target="_blank">';
					printf("<img width='154' height='231' src=".$values['info']['images']['poster']['0'].">");
					echo '</a>';
				echo '</td>';
				echo '<td align="middle">';
					echo '<a href="http://www.imdb.com/title/' . $values['identifiers']['imdb'] . '" target="_blank">' . $values['title'] . '</a>';
				echo '</td>';
				echo '<td align="middle">';
					if ($values['status'] == "done")
						{
							echo "<font color='#41A317'>";
							echo "Complete";
							echo "</font>";
						}
						else
						{
							echo "<font color='#EE0000'>";
							echo "Incomplete";
							echo "</font>";
						}
						//echo $values['status'];
				echo '</td>';
			echo '</tr>';

	}

echo '</table>';
include 'footer.php';
?>
</center>
