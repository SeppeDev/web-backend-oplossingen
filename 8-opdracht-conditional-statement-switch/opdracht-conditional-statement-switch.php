<?php

	$TheNumber			= 1;


	switch ($TheNumber)
	{
		case "1":
			$TheDay	= "monday";
			break;

		case "2":
			$TheDay	= "tuesday";
			break;

		case "3":
			$TheDay	= "wednesday";
			break;

		case "4":
			$TheDay	= "thursday";
			break;

		case "5":
			$TheDay	= "friday";
			break;

		case "6":
			$TheDay	= "saturday";
			break;

		case "7":
			$TheDay	= "sunday";
			break;
		
		default:
			$TheDay	= "day unknown";
			break;
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>8 | Oplossing conditional statement switch</title>
	</head>
	<body>

		<p><?php echo $TheNumber ?> corresponds with <?php echo $TheDay ?>.</p>

	</body>
</html>