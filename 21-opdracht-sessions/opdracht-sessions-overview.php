<?php

	session_start();
	

	$_SESSION["street"]					=	$_POST["street"];
	$_SESSION["number"]					=	$_POST["number"];
	$_SESSION["city"]					=	$_POST["city"];
	$_SESSION["postal_code"]			=	$_POST["postal_code"];

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">

		<title>21 | Oplossing sessions</title>

	</head>
	<body>

		<ul>

			<h2>Overview</h2>
			
			<li>
				<?php echo( $_SESSION["email"] ) ?>
				|
				<a href="opdracht-sessions-registration.php?focus=email">change</a></li>

			<li>
				<?php echo( $_SESSION["nickname"] ) ?>
				|
				<a href="opdracht-sessions-registration.php?focus=nickname">change</a></li>

			<li>
				<?php echo( $_SESSION["street"] ) ?>
				|
				<a href="opdracht-sessions-adress.php?focus=street">change</a></li>

			<li>
				<?php echo( $_SESSION["number"] ) ?>
				|
				<a href="opdracht-sessions-adress.php?focus=number">change</a></li></li>

			<li>
				<?php echo( $_SESSION["city"] ) ?>
				|
				<a href="opdracht-sessions-adress.php?focus=city">change</a></li></li>

			<li>
				<?php echo( $_SESSION["postal_code"] ) ?>
				|
				<a href="opdracht-sessions-adress.php?focus=postal_code">change</a></li></li>

		</ul>

		<form action="session_destroy.php" method="POST">
			
			<input type="submit" value="Destroy session">

		</form>

		<?php echo(var_dump($_SESSION)) ?>
		
	</body>
</html>