<?php

	$voornaam 					= "Seppe";
	$achternaam 				= "Goossens";
	$volledigeNaam 				= $voornaam . " " . $achternaam;
	$volledigeNaamLengte		= strlen($volledigeNaam);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>3 | Oplossing string concatenate</title>
	</head>
	<body>

		<p><?php echo $volledigeNaam ?></p>
		<p>Aantal karakters in deze string: <?php echo $volledigeNaamLengte ?></p>

	</body>
</html>