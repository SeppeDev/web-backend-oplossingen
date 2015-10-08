<?php

	function CalculateSum( $number1, $number2 )
	{
		$sum = $number1 + $number2;
		return $sum;
	}

	function Multiply( $number1, $number2 )
	{
		$result = $number1 * $number2;
		return $result;
	}

	function IsEven( $number1 )
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
		<title>14 | Oplossing function</title>

	</head>
	<body>

		<p>
			
			<?php echo ( calculateSum(1, 2) ) ?>
			<?php echo ( multiply(3, 4) ) ?>
			<?php echo ( isEven(5) ) ?>

		</p>

	</body>
</html>