<?php
	
	function __autoload( $className )
	{

		include "classes/" . $className . ".php";
	
	}

	$new						=	150;
	$unit						=	100;
	$percent					=	new Percent( $new, $unit );

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">

		<title>24 | Oplossing classes begin</title>

	</head>
	<body>

		<table>
			
			<caption>Howmuch % is <?php echo( $new ) ?> out off <?php echo( $unit ) ?>?</caption>

			<tr>
				<td>Absolute</td>
				<td><?php echo( $percent->absolute ) ?></td></tr>

			<tr>
				<td>Relative</td>
				<td><?php echo( $percent->relative ) ?></td></tr>

			<tr>
				<td>Percent</td>
				<td><?php echo( $percent->hundred ) ?></td></tr>

			<tr>
				<td>Nominal</td>
				<td><?php echo( $percent->nominal ) ?></td></tr>

		</table>
		
	</body>
</html>