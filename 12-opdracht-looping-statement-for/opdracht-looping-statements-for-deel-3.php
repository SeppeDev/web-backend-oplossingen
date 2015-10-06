<?php

	$rows			=	11;
	$columns		=	11;
	$className		=	"even";

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>12 | Oplossing looping statement for</title>

		<style>
			
			.uneven
			{
				background-color	:	lightgreen;
			}

		</style>
	</head>
	<body>

		<table>

			<?php for ($row = 0; $row < $rows; $row++) : ?>
			
				<tr>
					
					<?php for ($column = 0; $column < $columns; $column++) : ?>

						<?php

						if ( ( $row * $column ) % 2 != 0 )
						{
							$className = "uneven";
						}
						else
						{
							$className = "even";
						}

						?>

						<td class = <?php echo ( $className ) ?> >
							
							<?php echo ($column * $row) ?>

						</td>

					<?php endfor ?>

				</tr>

			<?php endfor ?>

		</table>

	</body>
</html>