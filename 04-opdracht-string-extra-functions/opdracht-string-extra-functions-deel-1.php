<?php

	$fruit 			= "kokosnoot";

	$fruitLengte	= strlen($fruit);

	$haystack 		=	$fruit;	
	$needle 		=	'o';

	$zoekDeLetterO	= strpos($haystack, $needle);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>4 | Oplossing string extra functions</title>
	</head>
	<body>

		<p><?php echo $fruitLengte ?></p>
		<p>Er staat een "o" op volgende plek: <?php echo $zoekDeLetterO ?></p>

	</body>
</html>