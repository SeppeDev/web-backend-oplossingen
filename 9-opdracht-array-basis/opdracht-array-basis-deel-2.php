<?php

	$Numbers1			= array(	1,
									2,
									3,
									4,
									5);

	
	$Numbers2			= array(	5,
									4,
									3,
									2,
									1);


	$result1			= array_product($Numbers1);


	$uneven				= array();

	foreach ($Numbers1 as $value )
	{
		if ($value % 2 != 0)
		{
			$uneven[] = $value;
		}
	}


	$result2			= array();

	foreach ($Numbers1 as $key => $number)
	{
		$number1 = $number;
		$number2 = $Numbers2[$key];

		$result2[] = $number1 + $number2;
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>9 | Oplossing array basis</title>
	</head>
	<body>

		<p><?php echo ($result1)?></p>
		<p><?php var_dump($uneven)?></p>
		<p><?php var_dump($result2)?></p>

	</body>
</html>