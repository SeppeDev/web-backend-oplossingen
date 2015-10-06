<?php

	$year				= 365 * $day;
	$month				= 31 * $day;
	$week				= 7 * $day;
	$day				= 24 * $hour;
	$hour				= 60 * $minute;
	$minute				= 60 * $seconde;
	$seconde			= 221108522;

	$numberOfYears		= null; 
    $numberOfMonths     = null;    
    $numberOfWeeks		= null;
    $numberOfDays		= null;
    $numberOfHours		= null;
    $numberOfMinutes	= null;

	/*how do you do this with an if statement?*/

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>6 | Oplossing conditional statement if else</title>
	</head>
	<body>

		<h1><?php echo $seconde ?> seconds are the same as: </h1>
		
		<p><?php echo $numberOfYears	?> years</p>
		<p><?php echo $numberOfMonths	?> months</p>
		<p><?php echo $numberOfWeeks	?> weaks</p>
		<p><?php echo $numberOfDays		?> days</p>
		<p><?php echo $numberOfHours	?> hours</p>
		<p><?php echo $numberOfMinutes	?> minutes</p>

	</body>
</html>