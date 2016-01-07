<?php

	$errorMessage					=	false;

	if( isset( $_POST["submit"] ) )
	{
		try
		{
			$db 							=	new PDO( "mysql:host=localhost;dbname=bieren", "root", "" );

			$queryString					=	"INSERT INTO brouwers(brnaam, adres, postcode, gemeente, omzet)
															VALUES ( :brnaam, :adres, :postcode, :gemeente, :omzet )";

			$statement						=	$db->prepare( $queryString );

			$statement->bindValue( ":brnaam", $_POST["brnaam"] );
			$statement->bindValue( ":adres", $_POST["adres"] );
			$statement->bindValue( ":postcode", $_POST["postcode"] );
			$statement->bindValue( ":gemeente", $_POST["gemeente"] );
			$statement->bindValue( ":omzet", $_POST["omzet"] );

			$isAdded						=	$statement->execute();

			if ( $isAdded )
			{
				$insertId					=	$db->lastInsertId();
				$errorMessage["type"]			=	"Success";
				$errorMessage["text"]			=	"Brouwerij succesvol toegevoegd. Het unieke nummer van de brouwerij is " . $insertId;
			}
			else
			{
				$errorMessage["type"]			=	"Error";
				$errorMessage["text"]			=	"Er ging iets mis bij het toevoegen, probeer opnieuw!";
			}
		}
		catch( PDOException $e )
		{
			$errorMessage["type"]			=	"Error";
			$errorMessage["text"]			=	"Not able to make connection with the database";
		}
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

		<form action="opdracht-CRUD-insert.php" method="POST">
			
			<ul>

				<li>
					<label for="brnaam">Brouwernaam</label>
					<input type="text" name="brnaam" id="brnaam"></li>

				<li>
					<label for="adres">Adres</label>
					<input type="text" name="adres" id="adres"></li>

				<li>
					<label for="postcode">Postcode</label>
					<input type="text" name="postcode" id="postcode"></li>

				<li>
					<label for="gemeente">Gemeente</label>
					<input type="text" name="gemeente" id="gemeente"></li>

				<li>
					<label for="omzet">Omzet</label>
					<input type="text" name="omzet" id="omzet"></li>

			</ul>
			
			<input type="submit" value="Verzenden" name="submit">

		</form>

	</body>

</html>