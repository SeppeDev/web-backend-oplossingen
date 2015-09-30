<?php

	$number					= 1;
	$dayOfTheWeek			= null;


	if ($number == 1)
	{
		$dayOfTheWeek = "maandag";
	}

	if ($number == 2)
	{
		$dayOfTheWeek = "dinsdag";
	}

	if ($number == 3)
	{
		$dayOfTheWeek = "woensdag";
	}

	if ($number == 4)
	{
		$dayOfTheWeek = "donderdag";
	}

	if ($number == 5)
	{
		$dayOfTheWeek = "vrijdag";
	}

	if ($number == 6)
	{
		$dayOfTheWeek = "zaterdag";
	}

	if ($number == 7)
	{
		$dayOfTheWeek = "zondag";
	}


	$capitalDayOfTheWeek	= strtoupper($dayOfTheWeek);
	$NoA					= str_replace("A", "a", $capitalDayOfTheWeek);

	$LastA 					= strrpos($dayOfTheWeek, "a");
	$NoLastA				= substr_replace($capitalDayOfTheWeek, "a", $LastA, 1);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>5 | Oplossing conditional statements if</title>
	</head>
	<body>

		<p>The day corresponding with this number is <?php echo $dayOfTheWeek ?>.</p>

		<p>Alles capotal buiten de a'tjes <?php echo $NoA ?>.</p>

		<p>Laatste a blijft klein <?php echo $NoLastA ?>.</p>

	</body>
</html>