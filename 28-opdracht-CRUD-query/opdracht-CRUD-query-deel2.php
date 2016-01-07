<?php

	$geselecteerdeBrouwer				=	false;

	try
	{
		$db 							=	new PDO( "mysql:host=localhost;dbname=bieren", "root", "" );
		$errorMessage					=	false;

		$queryString					=	"SELECT brnaam, brouwernr
														FROM brouwers";

		$statement						=	$db->prepare( $queryString );

		$statement->execute();


		$brouwers						=	array();
		$tHead 							=	array();
		$tHead[]						=	"Nr.";
		$bier 							=	array();

		
		while( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
		{
			$brouwers[]					=	$row;
		}

		
		if( isset( $_GET["brouwernr"] ) )
		{
			$geselecteerdeBrouwer		=	$_GET["brouwernr"];

			$bierQueryString			=	"SELECT bieren.naam
														FROM bieren
														WHERE bieren.brouwernr = :brouwernr";

			$bierStatement				=	$db->prepare( $bierQueryString );
			$bierStatement->bindParam( ":brouwernr", $_GET["brouwernr"] );
			
			//echo("good");
		}
		else
		{
			$bierQueryString			=	"SELECT bieren.naam
														FROM bieren
														WHERE bieren";

			$bierStatement				=	$db->prepare( $bierQueryString );

			//echo("bad");
		}

		$bierStatement->execute();

		for ( $line = 0; $line < $bierStatement->columnCount(); $line++ )
		{ 
			$tHead[]					=	$bierStatement->getColumnMeta( $line )["name"];
		}

		while( $row = $bierStatement->fetch( PDO::FETCH_ASSOC ) )
		{
			$bier[]						=	$row["naam"];
		}

	}
	catch( PDOException $e )
	{
		$errorMessage["type"]			=	"Error";
		$errorMessage["text"]			=	"Not able to make connection with the database";
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

		<?php if( $errorMessage ) : ?>

			<?php echo( $errorMessage["text"] ) ?>

		<?php endif ?>

		<form action="opdracht-CRUD-query-deel2.php" method="GET">
			
			<select name="brouwernr">
				
				<?php foreach( $brouwers as $line => $brouwer ) : ?>

					<option value="<?php echo( $brouwer['brouwernr'] ) ?>"><?php echo( $brouwer["brnaam"] ) ?></option>

				<?php endforeach ?></select>

			<input type="submit" value="Geef alle bieren van deze brouwerij" >

		</form>

		<table>
			
			<thead>
			
				<tr>
					
					<?php foreach( $tHead as $columnName ) : ?>

						<th><?php echo( $columnName ) ?></th>

					<?php endforeach ?>

				</tr>

			</thead>

			<tbody>
				
				<?php foreach( $bier as $line => $biernaam ) : ?>

					<tr>
						
						<td>
							<?php echo( $line + 1 ) ?></td>

						<td>
							<?php echo( $biernaam ) ?></td>

					</tr>

				<?php endforeach ?>

			</tbody>

		</table>

	</body>

</html>