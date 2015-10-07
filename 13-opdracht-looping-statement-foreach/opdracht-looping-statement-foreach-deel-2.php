<?php

	$text						=	file_get_contents( "text-file.txt" );

	$allCapstext				=	strtoupper( $text );

	$textChars					=	str_split( $allCapstext );


	str_replace(' ', '', $textChars);
	



	$CharCounter				=	array();

	foreach ( $textChars as $char )
	{
		if ( isset( $CharCounter[$char] ) )
		{
			$CharCounter[$char]++;
		}
		else
		{
			$CharCounter[$char] = 1;
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

		<ul>

			<li>

				<h1>Amount every character is in the text:</h1>

			</li>
			
			<li>
				
				<?php foreach ( $CharCounter as $amountToPrint => $charToPrint) : ?>

					<ul>

						<li>
						
							<?php echo ( $amountToPrint ) ?> : <?php echo ( $charToPrint ) ?>

						</li>

					</ul>

				<?php endforeach ?>

			</li>

		</ul>

	</body>
</html>