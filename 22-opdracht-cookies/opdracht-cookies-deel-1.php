<?php
	
	$userFile 					=	file_get_contents( "opdracht-cookies-deel-1.txt" );
	$credentials				=	explode( ",", $userFile );

	$errormessage				=	"";
	$loggedIn					=	false;


	if ( isset( $_COOKIE["login"] ) )
	{
		$loggedIn = true;
		$errormessage = $_COOKIE["login"];
	}
	else
	{
		if ( $_POST["username"] === $credentials[0] )
		{
			if ( $_POST["password"] === $credentials[1] )
			{
				setcookie("login", "logged in as " . $_POST["username"], time() + 360 );
				$errormessage = "Welcome!";
				header("location: opdracht-cookies-deel-1.php");
			}
			else
			{
				$errormessage = "Username or Password invallid. Try again...";
			}
		}
		else
		{
			$errormessage = "Username or Password invallid. Try again...";
		}
	}

	if ( isset( $_GET["logout"] ) )
	{
		setcookie( "login", "", time() - 1 );
		header("location: opdracht-cookies-deel-1.php");
	}

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">

		<title>21 | Oplossing sessions</title>

	</head>
	<body>

		<?php echo( $errormessage ) ?>

		<?php if( !$loggedIn ) : ?>

			<form action="opdracht-cookies-deel-1.php" method="POST">
				<ul>

					<h2>Login</h2>

					<li>
						<label for="username">username</label>
						<input type="text" name="username" id="username"></li>

					<li>
						<label for="password">password</label>
						<input type="text" name="password"	id="password"></li>

				</ul>

				<input type="submit" value="Log in">

			</form>

		<?php else : ?>

			<form action="opdracht-cookies-deel-1.php?logout=true" method="POST">

				<input type="submit" value="Logout">

			</form>

		<?php endif ?>
		
	</body>
</html>