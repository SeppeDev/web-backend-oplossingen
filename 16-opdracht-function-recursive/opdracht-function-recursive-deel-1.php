<?php

	$inheritance				=	100000;
	$intrestRate				=	0.08;
	$term						=	10;

	$account					=	array();

	function CalculateInterst( $originalSum, $intrestRate, $term )
	{

		static $year			=	1;
		global $account;

		if ( $year <= $term )
		{
			
			$intrest = $originalSum * $intrestRate;
			$newSum = floor( $originalSum + $intrest );

			$year++;

			$account[] = $newSum;

			return CalculateInterst( $newSum, $intrestRate, $term );

		}
		else
		{
			return $account;
		}

	}

	$calculateInheritance		=	CalculateInterst( $inheritance, $intrestRate, $term );

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<title>16 | Oplossing function recursive</title>

	</head>
	<body>

		<p>
			
			Hans started with €100.000, which turned into following amounts of money over the next 10 years.

		</p>

		<?php foreach( $calculateInheritance as $year ) : ?>

			<p>

				- €<?php echo ( $year ) ?>

			</p>

		<?php endforeach ?>
		
	</body>
</html>