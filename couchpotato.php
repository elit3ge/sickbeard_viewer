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
				echo '<td>';
				//echo $values['title'];
					//echo '<a href="seasonlist.php?showid=' . $key->{titles}->{imdb} . '">' . $values['title'] . '</a>';
					echo $values['title'];
				echo '</td>';
				echo '<td>';
				if ($values['status'] == "done")
					{
						echo "<font color='#41A317'>";
						echo $values['status'];
						echo "</font>";
					}
					else
					{
						echo "<font color='#EE0000'>";
						echo $values['status'];
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
