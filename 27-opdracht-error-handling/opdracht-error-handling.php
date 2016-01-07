<?php

	session_start();

	$isValid							=	false;

	try
	{
		if( isset( $_POST["submit"] ) )
		{
			if( !isset( $_POST["code"] ) )
			{
				throw new Exception( "SUBMIT-ERROR" );
				
			}
			else
			{
				if( strlen( $_POST["code"] ) == 8 )
				{
					$isValid			=	true;
				}
				else
				{
					throw new Exception( "VALIDATION-CODE-LENGTH" );
					
				}
			}
		}
	}

	catch( Exception $e )
	{
		$messageCode					=	$e->getMessage(); //Exception::getCode();
		$message 						=	array();
		$createMessage 					=	false;

		switch ( $messageCode )
		{
			case "SUBMIT-ERROR":
				$message["type"]		=	'error';
				$message["text"]		=	"Er werd met het formulier geknoeid";
				break;

			case "VALIDATION-CODE-LENGTH":
				$message["type"]		=	'error';
				$message["text"]		=	"De kortingscode heeft niet de juiste lengte";
				$createMessage			=	true;
				break;
		}

		if( $createMessage )
		{
			CreateMessage( $message );
		}

		LogToFile( $message );
	}

	$errorMessage 						=	ShowMessage();

	function LogToFile( $message )
	{
		$date							=	"[" . date( 'H:i:s d/m/Y' ) . "]";
		$ip 							=	$_SERVER["REMOTE_ADDR"];
		$type 							=	$message["type"];
		$message 						=	$message["text"];

		$errorMessage 					=	$date . " - " .
											$ip . " - TYPE:[ " .
											$type . "] = " .
											$message . "\n\r";

		file_put_contents( "error.log", $errorMessage, FILE_APPEND );
	}

	function CreateMessage( $message )
	{
		$_SESSION["message"]["type"]	=	$message["type"];
		$_SESSION["message"]["message"]	=	$message["text"];
	}

	function ShowMessage()
	{
		$messageData 					=	false;

		if( isset( $_SESSION["message"] ) )
		{
			$messageData 				=	$_SESSION["message"];
			unset( $_SESSION["message"] );
		}

		return $messageData;
	}

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<title>27 | Oplossing Error handling</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>
	<body>

		<h1>Oplossing error handling: try-catch</h1>

		<h2>Vul de kortingscode in</h2>

		<?php if( $errorMessage ) : ?>

			<div class="modal <?= $errorMessage["type"] ?>"><?= $errorMessage["message"]?></div>
			
		<?php endif ?>
	
		<?php if( !$isValid ) : ?>
			<form action="opdracht-error-handling.php" method="POST">
			
				<ul>
					<li>
						<label for="code">Kortingscode (8 karakters lang)</label>
						<input type="text" id="code" name="code">
					</li>
				</ul>

				<input type="submit" name="submit">

			</form>
		<?php else: ?>

			<p class="blink">Korting toegekend!</p>

		<?php endif ?>

    </body>
</html>