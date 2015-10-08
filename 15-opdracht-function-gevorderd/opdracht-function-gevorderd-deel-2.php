<?php

	$pigHealth					=	5;
	$maximumThrows				=	8;

	$toPrint					=	array();

	function CalculateHit()
	{

		global $pigHealth;
		$shot					=	rand( 0, 10 );
		$toPrint				=	null;


		if ( $shot > 4 )
		{
			
			$pigHealth--;

			$toPrint = "HIT! There are only " . $pigHealth . " pigs left!";

		}
		else
		{

			$toPrint = "MISSED! There are still " . $pigHealth . " pigs left!";

		}

		return $toPrint;

	}

	function LaunchAngryBird()
	{

		global $pigHealth;
		global $maximumThrows;
		global $toPrint;
		static $timesThrown		=	0;

		while ( $timesThrown < $maximumThrows )
		{
			
			$timesThrown++;

			$toPrint[] = CalculateHit();

			if ( $pigHealth === 0 )
			{
				
				break;

			}

		}

		if ( $pigHealth === 0 )
		{
			
			$toPrint[] = "NICE, you did it!";

		}
		else
		{

			$toPrint[] = "YOU SUCK! you just got defeated by pigs...";

		}

	}

LaunchAngryBird();

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<title>15 | Oplossing function gevorderd</title>

	</head>
	<body>

		<?php foreach( $toPrint as $round ) : ?>

			<p>

				<?php echo ( $round ) ?>

			</p>

		<?php endforeach ?>
		
	</body>
</html>