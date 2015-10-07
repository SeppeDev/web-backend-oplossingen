<?php

	$text						=	file_get_contents( "text-file.txt" );

	$textChars					=	str_split( $text );

	rsort($textChars);

	$BackwardsSortedTextChar	=	array_reverse( $textChars );



	$CharCounter				=	array();

	foreach ( $BackwardsSortedTextChar as $char )
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

		<pre><?php var_dump( $textChars ) ?></pre>
		<pre><?php var_dump( $BackwardsSortedTextChar ) ?></pre>

		<ul>

			<li>

				<h1>Amount of different characters:</h1>

			</li>
			
			<li>
				
				<?php echo ( count( $CharCounter ) ) ?>

			</li>

			<li>

				<h1>Amount every character is in the text:</h1>

			</li>
			
			<li>
				
				<?php var_dump ( $CharCounter ) ?>

			</li>

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