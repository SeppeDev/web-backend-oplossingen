<?php

	session_start();

	$email								=	"";
	$password 							=	"";
	$errorMessage						=	"";

	if( isset( $_SESSION["registrationDetails"] ) )
	{

		$email			=	$_SESSION["registrationDetails"]["email"];
		$password 		=	$_SESSION["registrationDetails"]["password"];

	}

	if( isset( $_SESSION["notifications"] ) )
	{

		$errorMessage	=	$_SESSION["notifications"];
		$_SESSION["notifications"]		=	"";

	}

	var_dump($_SESSION);

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


		<h1>Register</h1>

		<form action="registration-process.php" method="POST">
			
			<ul>
				
				<li>
					<label for="email">email</label>
					<input type="text" name="email" id="email" value="<?php echo( $email ) ?>"></li>

				<li>
					<label for="password">password</label>
					<input type="<?php echo( 'text' ) ?>" name="password" id="password" value="<?php echo( $password ) ?>">
					<input type="submit" name="passwordGenerator" value="Generate password"></li>

				<li>
					<input type="submit" name="register" value="register"></li>

			</ul>

		</form>	

	</body>

</html>