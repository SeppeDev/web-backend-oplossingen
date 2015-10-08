<?php

	$fruit 				= "ananas";

	$haystack 			=	$fruit;	
	$needle 			=	'a';

	$searchLastLetterA	= strrpos($haystack, $needle);

	$upperCaseFruit		= strtoupper($fruit);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>4 | Oplossing string extra functions</title>
	</head>
	<body>

		<p>De laatste "a" staat op volgende plek: <?php echo $searchLastLetterA ?></p>
		<p><?php echo $upperCaseFruit ?></p>

	</body>
</html>