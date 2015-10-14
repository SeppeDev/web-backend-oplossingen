<?php
	
	$timestamp					=	mktime(22, 35, 25, 1, 21, 1904);
	$date						=	date( "j F Y,g:i:s a", $timestamp )

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">

		<title>20 | Oplossing date</title>

		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>
	<body>

		<?php echo( $timestamp ) ?>
		<?php echo( $date ) ?>
		
	</body>
</html>