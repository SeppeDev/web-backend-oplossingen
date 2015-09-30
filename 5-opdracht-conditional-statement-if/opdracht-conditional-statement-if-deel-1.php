<?php

	$number				= 1;
	$dayOfTheWeek		= null;

	if ($number == 1)
	{
		$dayOfTheWeek = "monday";
	}

	if ($number == 2)
	{
		$dayOfTheWeek = "tuesday";
	}

	if ($number == 3)
	{
		$dayOfTheWeek = "wednesday";
	}

	if ($number == 4)
	{
		$dayOfTheWeek = "thursday";
	}

	if ($number == 5)
	{
		$dayOfTheWeek = "friday";
	}

	if ($number == 6)
	{
		$dayOfTheWeek = "saturday";
	}

	if ($number == 7)
	{
		$dayOfTheWeek = "sunday";
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>5 | Oplossing conditional statements if</title>
	</head>
	<body>

		<p>The day corresponding with this number is <?php echo $dayOfTheWeek ?>.</p>

	</body>
</html>