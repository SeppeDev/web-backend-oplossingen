<?php

	$rows					=	10;
	$columns				=	10;
	$className				=	"even";

	$row					=	array();
	$rowCounterToDisplay	=	0;


	for ( $rowCounter=0; $rowCounter <= $rows; $rowCounter++ )
	{ 
		$column = array();

		for ( $columnCounter=0; $columnCounter <= $columns; $columnCounter++ )
		{ 
			$column[] = ( $columnCounter * $rowCounter );
		}

		$row[$rowCounter] = $column;
	}

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

			<thead>

				<th>
					Table	
				</th>

				<?php for ( $columnCounter = 0; $columnCounter <= $columns; $columnCounter++ ) : ?>

					<th>
						
						<?php echo ( $columnCounter ) ?>

					</th>

				<?php endfor ?>

			</thead>

			<tbody>

				<?php foreach ($row as $column) : ?>
				
					<tr>
						
						<td>
							
							<?php

								echo ( $rowCounterToDisplay );
								$rowCounterToDisplay++;

							?>

						</td>

						<?php foreach ($column as $result) : ?>

							<?php

								if ( $result % 2 != 0 )
								{
									$className = "uneven";
								}
								else
								{
									$className = "even";
								}

							?>

							<td class = <?php echo ( $className ) ?> >
								
								<?php echo ($result) ?>

							</td>

						<?php endforeach ?>

					</tr>

				<?php endforeach ?>

			</tbody>

		</table>

	</body>
</html>