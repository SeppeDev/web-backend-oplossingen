<?php

	$Number			= array(	8,
									7,
									8,
									7,
									3,
									2,
									1,
									2,
									4);

	$UniqueNumber	= array_unique($Number);

	rsort($UniqueNumber);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>10 | Oplossing array functions</title>
	</head>
	<body>

		<p><?php var_dump($UniqueNumber) ?></p>

	</body>
</html>