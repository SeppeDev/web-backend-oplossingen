<?php

	try
	{
		$db 							=	new PDO( "mysql:host=localhost;dbname=bieren", "root", "" );

		$queryString					=	"SELECT *
														FROM bieren
														INNER JOIN brouwers
														ON bieren.brouwernr = brouwers.brouwernr
														WHERE bieren.naam LIKE 'Du%'
														AND brouwers.brnaam LIKE '%a%'";

		$statement						=	$db->prepare( $queryString );

		$statement->execute();

		$bieren							=	array();
		$columnNames					=	array();
		$columnNames[]					=	"nr.";

		while( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
		{
			$bieren[]					=	$row;
		}

		foreach ( $bieren[0] as $line => $bier )
		{
			$columnNames[]				=	$line;
		}
	}
	catch( PDOException $e )
	{
		
	}

?>


<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<title>28 | Oplossing CRUD query - Deel 1</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>

	<body>

		<table>
			
			<thead>
				
				<tr>

					<?php foreach( $columnNames as $columnName ) : ?>
						<td>
							<?php echo( $columnName ) ?></td>
					<?php endforeach ?>

				</tr>

			</thead>

			<tbody>
				
				<?php foreach( $bieren as $line => $bier ) : ?>
					<tr>

						<td>
							<?php echo( $line + 1 ) ?></td>
						
						<?php foreach( $bier as $value ) : ?>
							<td>
								<?php echo( $value ) ?></td>
						<?php endforeach ?></td>

					</tr>
				<?php endforeach ?>

			</tbody>

		</table>

	</body>

</html>