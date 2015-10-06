<?php

	$rows			=	10;
	$columns		=	10;

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>12 | Oplossing looping statement for</title>
	</head>
	<body>

		<table>

			<?php for ($row = 0; $row < $rows; $row++) : ?>
			
				<tr>
					
					<?php for ($column = 0; $column < $columns; $column++) : ?>

						<td>
							
							column

						</td>

					<?php endfor ?>

				</tr>

			<?php endfor ?>

		</table>

	</body>
</html>