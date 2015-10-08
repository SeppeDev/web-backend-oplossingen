<?php

	$md5HashKey					=	"d1fa402db91a7a93c4f414b8278ce073";

	function CalculatePercentage1( $hashkey, $character )
	{

		$hashLength				=	strlen( $hashkey );

		$counter = substr_count( $hashkey, $character );
		$percentage = ( $counter / $hashLength ) * 100;

		return $percentage;

	}

	function CalculatePercentage2( $character )
	{

		global $md5HashKey;
		$hashLength				=	strlen( $md5HashKey );

		$counter = substr_count( $md5HashKey, $character );
		$percentage = ( $counter / $hashLength ) * 100;

		return $percentage;

	}

	function CalculatePercentage3( $character )
	{

		$hashLength				=	strlen( $GLOBALS["md5HashKey"] );

		$counter = substr_count( $GLOBALS["md5HashKey"], $character );
		$percentage = ( $counter / $hashLength ) * 100;

		return $percentage;

	}

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<title>15 | Oplossing function gevorderd</title>

	</head>
	<body>

		<p>The character 2 accounts for <?php echo ( calculatePercentage1( $md5HashKey, "2" ) ) ?>% of the string.</p>
		<p>The character 8 accounts for <?php echo ( calculatePercentage2( "8" ) ) ?>% of the string.</p>
		<p>The character a accounts for <?php echo ( calculatePercentage3( "a" ) ) ?>% of the string.</p>

	</body>
</html>