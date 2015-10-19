<?php
	
	session_start();


	$email							=	"";
	$nickname 						=	"";


	if ( isset( $_SESSION["email"] ) )
	{
		$email						=	$_SESSION["email"];
	}

	if ( isset( $_SESSION["nickname"] ) )
	{
		$nickname 					=	$_SESSION["nickname"];
	}

	/*function SetFocus()
	{
		if ( isset( $_GET["focus"] ) )
		{
			$theFocus 					=	$_GET["focus"];

			if ( $_GET["focus"] === this.name )
			{
				return "autofocus";
			}
		}
	}*/

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">

		<title>21 | Oplossing sessions</title>

	</head>
	<body>

		<form action="opdracht-sessions-adress.php" method="POST">
			<ul>

				<h2>Registration Info</h2>

				<li>
					<label for="email">email</label>
					<input type="text" name="email" id="email" value="<?php echo( $email ) ?>" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "email" ) ? 'autofocus' : '' ?>></li>

				<li>
					<label for="nickname">Nickname</label>
					<input type="text" name="nickname"	id="nickname" value="<?php echo( $nickname ) ?>" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "nickname" ) ? 'autofocus' : '' ?>></li>

			</ul>

			<input type="submit" value="Next">

		</form>

		<form action="session_destroy.php" method="POST">
			
			<input type="submit" value="Destroy session">

		</form>
		
	</body>
</html>