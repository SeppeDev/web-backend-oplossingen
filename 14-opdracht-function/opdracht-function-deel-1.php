<?php

	function calculateSum( $number1, $number2 )
	{
		$sum = $number1 + $number2;
		return $sum;
	}

	function multiply( $number1, $number2 )
	{
		$result = $number1 * $number2;
		return $result;
	}

	function isEven( $number1 )
	{
		if ( $number1 % 2 == 0 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<title>13 | Oplossing looping statement foreach</title>

	</head>
	<body>

		<p>
			
			<?php echo ( calculateSum(1, 2) ) ?>
			<?php echo ( multiply(3, 4) ) ?>
			<?php echo ( isEven(5) ) ?>

		</p>

	</body>
</html>