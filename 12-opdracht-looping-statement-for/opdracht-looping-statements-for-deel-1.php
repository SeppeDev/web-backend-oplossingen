<?php

	$shoppinglist		=	array(	"Eggs",
									"Bread",
									"Carrots",
									"Milk");

	$shoppingCounter	=	0;

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>11 | Oplossing looping statement while</title>
	</head>
	<body>

		<p>Shoppinglist contains:</p>
		<ul>

			<?php while ( isset($shoppinglist[$shoppingCounter]) ): ?>
			
				<li><?php echo ($shoppinglist[$shoppingCounter]) ?></li>
				<?php $shoppingCounter++ ?>

			 <?php endwhile ?>

		</ul>

	</body>
</html>