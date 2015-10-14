<?php

	$username 					=	"Seppe";
	$password 					=	"azerty";

	$welcomeMessage				=	"";

	if( isset( $_POST["username"] ) && isset( $_POST["password"] ) )
	{
		if( $_POST["username"] === $username && $_POST["password"] === $password )
		{
			$welcomeMessage = "Welcome";
		}
		else
		{
			$welcomeMessage = "Something went wrong while logging in";
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">

		<title>18 | Oplossing POST</title>

	</head>
	<body>

		<h1>LOGIN</h1>

		<form action="opdracht-post.php" method="post">
			
			<ul>
				
				<li>
					<label for="username">Username</label>
					<input type="text" name="username" id="username">
				</li>

				<li>
					<label for="password">Password</label>
					<input type="text" name="password" id="password">
				</li>

			</ul>

			<input type="submit" value="Log in">

		</form>

		<p>
			
		<?php echo( $welcomeMessage ) ?>

		</p>
		
	</body>
</html>