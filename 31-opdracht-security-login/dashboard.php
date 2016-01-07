<?php

	session_start();

	function __autoload( $classname )
	{
		require_once( $classname . ".php" );
	}



	$connection 			=	 new PDO( "mysql:host=localhost;dbname=opdracht-security-login", "root", "" );
	
	if( User::validate( $connection ) )
	{
		$errorMessage	=	$_SESSION["notifications"];
		$_SESSION["notifications"]				=	"";
	}
	else
	{
		User::logout();

		$_SESSION["notifications"]["type"]		=	"error";
		$_SESSION["notifications"]["message"]	=	"Something went wrong during the login, try again.";
		
		header( 'location: opdracht-security-login.php' );
	}

?>


<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<title>31 | Oplossing security</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>

	<body>

		<?php if( $errorMessage ) : ?>

			<div class="modal <?php echo( $errorMessage['type'] ) ?>">
				<?php echo( $errorMessage["message"] ) ?>
			</div>

		<?php endif ?>


		<h1>DASHBOARD</h1>

		<p>
			
			Logged in and all is well!

		</p>

	</body>

</html>