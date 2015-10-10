<?php

	$inheritance				=	100000;
	$intrestRate				=	0.08;
	$term						=	10;
	$year 						=	1;

	$account					=	array();

	function CalculateInterst( $originalSum, $intrestRate, $term, $year )
	{

		global $account;

		if ( $year <= $term )
		{
			
			$intrest = $originalSum * $intrestRate;
			$newSum = floor( $originalSum + $intrest );

			$year++;

			$account[] = $newSum;

			return CalculateInterst( $newSum, $intrestRate, $term, $year );

		}
		else
		{
			return $account;
		}

	}

	$calculateInheritance		=	CalculateInterst( $inheritance, $intrestRate, $term, $year );

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