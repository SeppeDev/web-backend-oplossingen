<?php

	$errorMessage					=	false;
	
	try
	{
		$db 						=	new PDO('mysql:host=localhost;dbname=bieren', 'root', '' );

		if( isset( $_POST["delete"] ) )
		{

			$queryString 			=	"DELETE FROM brouwers
														WHERE brouwernr = :brouwernr";

			$statement				=	$db->prepare( $queryString );
			$statement->bindValue( ":brouwernr", $_POST["delete"] );

			$isDeleted				=	$statement->execute();

		}

		$query 						=	"SELECT *
													FROM brouwers";

		$statement					=	$db->prepare( $query );
		$statement->execute();

		$names 						=	array();
		$brouwers 					=	array();

		for( $count = 0; $count < $statement->columnCount(); $count++ )
		{

			$names[]				=	$statement->getColumnMeta( $count )["name"];

		}

		while( $line = $statement->fetch( PDO::FETCH_ASSOC ) )
		{

			$brouwers[]				=	$line;

		}
	}
	catch( PDOException $e )
	{
		$errorMessage["type"]		=	"Error";
		$errorMessage["text"]		=	"Not able to make connection with the database";
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

		<h1>Voeg brouwer toe</h1>

		<?php if ( $errorMessage ) : ?>

			<?php echo( $errorMessage["text"] ) ?>

		<?php endif ?>
	
		<form action="opdracht-CRUD-delete.php" method="POST">

			<table>
				
				<thead>

					<tr>
						<th>Nr</th>

						<?php foreach ($names as $fieldname): ?>
							<th><?= $fieldname ?></th>
						<?php endforeach ?>

						<th></th>

					</tr>

				</thead>

				<tbody>

					<?php foreach ($brouwers as $key => $brouwer): ?>

						<tr class="<?= ( ($key+1)%2 == 0 ) ? 'even' : ''  ?>">

							<td><?= ++$key ?></td>

							<?php foreach ($brouwer as $value): ?>
								<td><?= $value ?></td>
							<?php endforeach ?>

							<td>

								<button type="submit" name="delete" value="<?= $brouwer['brouwernr'] ?>" class="delete-button">
									<img src="css/images/icon-delete.png" alt="Delete button"></button>

							</td>

						</tr>

					<?php endforeach ?>
					
				</tbody>

			</table>

		</form>

	</body>

</html>