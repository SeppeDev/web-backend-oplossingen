<?php

	$numbers1			=	null;
	$amount				=	100;

	$number1			=	0;


	while ( $number1 < $amount)
	{
		$numbers1 .= ( $number1 . ", " );
		++$number1;
	}



	$numbers2			=	null;
	$number2			=	0;

	while ( $number2 < $amount )
	{
		if ($number2 % 3 == 0 && $number2 > 40 && $number2 < 80)
		{
			$numbers2 .= ( $number2 . ", ");
		}

		++$number2;
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>11 | Oplossing looping statement while</title>
	</head>
	<body>

		<p><?php echo ($numbers1) ?></p>
		<p><?php echo ($numbers2) ?></p>

	</body>
</html>