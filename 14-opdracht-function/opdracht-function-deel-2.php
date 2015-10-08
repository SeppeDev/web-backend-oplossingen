<?php

	$animals					=	array(	"Dog",
											"Cat",
											"Wolf");

	$htmlString =   '<html><head><title>Dit is een test</title></head><body>Tekst</body></html>';


	function printArray( $array )
	{
		
		$toPrint				=	array();

		foreach ($array as $key => $animal)
		{
			$toPrint[] = "animals[" . $key . "] has value " . $animal;
		}

		return $toPrint;

	}


	function validateHtmlTag( $html )
	{

		$openingTag				=	"<html>";
		$closingTag				=	"</html>";
		$isHtmlValid			=	false;

		if ( strpos( $html, $openingTag ) === 0 )
		{
			
			if ( strpos( $html, $closingTag ) === ( strlen( $html ) - strlen( $closingTag ) ) )
			{
				$isHtmlValid = true;
			}

		}

		return isHtmlValidToTekst( $isHtmlValid );

	}


	function isHtmlValidToTekst( $isHtmlValid )
	{
		
		$answer					=	null;

		if ( $isHtmlValid )
		{
			
			$answer = "a valid";

		}
		else
		{

			$answer = "an invalid";

		}

		return $answer;

	}

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<title>13 | Oplossing looping statement foreach</title>

	</head>
	<body>

		<?php foreach ( printArray( $animals ) as $value ) : ?>

			<p><?php echo ( $value ) ?></p>

		<?php endforeach ?>

		<p>The string has <?php echo ( validateHtmlTag( $htmlString ) ) ?> htmltag.</p>

	</body>
</html>