<?php
	
	session_start();


	if ( isset( $_POST["email"] ) )
	{
		$_SESSION["email"]			=	$_POST["email"];
	}
	
	if ( isset( $_POST["email"] ) )
	{
		$_SESSION["nickname"]		=	$_POST["nickname"];
	}


	$street 						=	"";
	$number 						=	"";
	$city							=	"";
	$postal_code					=	"";
	
	if ( isset( $_SESSION["street"] ) )
	{
		$street						=	$_SESSION["street"];
	}

	if ( isset( $_SESSION["number"] ) )
	{
		$number						=	$_SESSION["number"];
	}

	if ( isset( $_SESSION["city"] ) )
	{
		$city						=	$_SESSION["city"];
	}

	if ( isset( $_SESSION["postal_code"] ) )
	{
		$postal_code					=	$_SESSION["postal_code"];
	}
	
?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">

		<title>21 | Oplossing sessions</title>

	</head>
	<body>

		<ul>

			<h2>Registration info</h2>
			
			<li>
				<?php echo( $_SESSION["email"] ) ?></li>

			<li>
				<?php echo( $_SESSION["nickname"] ) ?></li>

		</ul>

		<form action="opdracht-sessions-overview.php" method="post">
			<ul>

				<h2>Address Info</h2>

				<li>
					<label for="street">street</label>
					<input type="text" name="street" id="street" value="<?php echo( $street ) ?>" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "street" ) ? 'autofocus' : '' ?>></li>

				<li>
					<label for="number">number</label>
					<input type="text" name="number" id="number" value="<?php echo( $number ) ?>" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "number" ) ? 'autofocus' : '' ?>></li>

				<li>
					<label for="city">city</label>
					<input type="text" name="city" id="city" value="<?php echo( $city ) ?>" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "city" ) ? 'autofocus' : '' ?>></li>

				<li>
					<label for="postal code">postal code</label>
					<input type="text" name="postal code" id="postal code" value="<?php echo( $postal_code ) ?>" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "postal_code" ) ? 'autofocus' : '' ?>></li>

			</ul>

			<input type="submit" value="Next">

		</form>

		<form action="session_destroy.php" method="POST">
			
			<input type="submit" value="Destroy session">

		</form>
		
	</body>
</html>