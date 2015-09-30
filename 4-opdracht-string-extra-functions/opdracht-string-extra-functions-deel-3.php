<?php

	$lettertje			= "e";
	$cijfertje			= 3;
	$langsteWoord		= "zandzeepsodemineralenwatersteenstralen";

	$ReplacedLetter		= str_replace($lettertje, $cijfertje, $langsteWoord);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>4 | Oplossing string extra functions</title>
	</head>
	<body>

		<p>
			<?php echo $ReplacedLetter ?>
		</p>

	</body>
</html>