<?php
	
	$seconde			= 221108522;
	$minute				= 60 * $seconde;
	$hour				= 60 * $minute;
	$day				= 24 * $hour;
	$week				= 7 * $day;
	$month				= 31 * $day;
	$year				= 365 * $day;

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