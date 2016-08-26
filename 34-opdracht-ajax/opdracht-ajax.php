<?php

	session_start();


	$errorMessage						=	"";
	$email 								=	"";
	$message 							=	"";
	$copyToMe 							=	"";

	if( isset( $_SESSION["notifications"] ) )
	{

		$errorMessage	=	$_SESSION["notifications"];
		$_SESSION["notifications"]		=	"";

	}

	if( isset( $_SESSION["sendMessage"] ) )
	{

		$email 		=	$_SESSION["sendMessage"]["email"];
		$message 	=	$_SESSION["sendMessage"]["message"];
		$copyToMe	=	$_SESSION["sendMessage"]["copyToMe"];

	}

	var_dump($_SESSION);

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">

		<title>37 | Oplossing Ajax</title>

		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>
	<body>

		<?php if( $errorMessage ) : ?>

			<div class="modal <?php echo( $errorMessage['type'] ) ?>">
				<?php echo( $errorMessage["message"] ) ?>
			</div>

		<?php endif ?>


		<h1>CONTACT US</h1>

		<div id="sentMessage"></div>

		<form action="contact.php" method="POST" id="messageForm">
			
			<ul>
				
				<li>
					<label for="email">E-mailaddress</label>
					<input type="text" name="email" id="email" value="<?php echo( isset( $email ) ) ? $email : '' ?>"></li>

				<li>
					<label for="message">Message</label>
					<textarea name="message" id="message"><?php echo( isset( $message ) ) ? $message : "" ?></textarea></li>

				<li>
					<input type="checkbox" id="copyToMe" name="copyToMe" <?php echo( $copyToMe ) ?>>
					<label for="copyToMe">Send a copy to me</label></li>

			</ul>

			<input type="submit" name="submit" value="Send">

		</form>



		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

		<script type="text/javascript" src="js/index.js"></script>
		
	</body>
</html>