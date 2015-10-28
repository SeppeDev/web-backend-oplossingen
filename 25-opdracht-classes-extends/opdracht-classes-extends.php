<?php
	
	function __autoload( $className )
	{

		include "classes/" . $className . ".php";
	
	}

	$alfa						=	new Animal( "Wolf", "male", 666 );
	$beta						=	new Animal( "Bear", "female", 777 );
	$gamma						=	new Animal( "Moose", "female", 555 );

	$beta->ChangeHealth( -112 );
	$gamma->ChangeHealth( 112 );


	$delta						=	new Lion( "Simba", "male", 666, "Fancy Lions" );
	$epsilon					=	new Lion( "Scarr", "female", 777, "Less Fancy Lions" );


	$zeta						=	new Zebra( "Olly", "male", 666, "Fancy Zebra" );
	$eta						=	new Zebra( "Molly", "female", 777, "More Fancy Zebra" );

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">

		<title>24 | Oplossing classes begin</title>

	</head>
	<body>

		<section>

			<h1>Just some random Animals</h1>

			<p>			
				<?php echo( $alfa->GetName() ) ?> is a <?php echo( $alfa->GetGender() ) ?> and has <?php echo( $alfa->GetHealth() ) ?> health at the moment (special move: <?php echo( $alfa->DoSpecialMove() ) ?>)</p>
			
			<p>			
				<?php echo( $beta->GetName() ) ?> is a <?php echo( $beta->GetGender() ) ?> and has <?php echo( $beta->GetHealth() ) ?> health at the moment (special move: <?php echo( $beta->DoSpecialMove() ) ?>)</p>

			<p>			
				<?php echo( $gamma->GetName() ) ?> is a <?php echo( $gamma->GetGender() ) ?> and has <?php echo( $gamma->GetHealth() ) ?> health at the moment (special move: <?php echo( $gamma->DoSpecialMove() ) ?>)</p>

		</section>

		<section>

			<h1>Some lions ...</h1>
			
			<p>			
				<?php echo( $delta->GetName() ) ?> is a <?php echo( $delta->GetGender() ) ?> and has <?php echo( $delta->GetHealth() ) ?> health at the moment. It's a <?php echo( $delta->GetSpecies() ) ?>  (special move: <?php echo( $delta->DoSpecialMove() ) ?>)</p>
		
			<p>			
				<?php echo( $epsilon->GetName() ) ?> is a <?php echo( $epsilon->GetGender() ) ?> and has <?php echo( $epsilon->GetHealth() ) ?> health at the moment. It's a <?php echo( $epsilon->GetSpecies() ) ?> (special move: <?php echo( $epsilon->DoSpecialMove() ) ?>)</p>

		</section>

		<section>

			<h1>... and some zebras.</h1>
			
			<p>			
				<?php echo( $zeta->GetName() ) ?> is a <?php echo( $zeta->GetGender() ) ?> and has <?php echo( $zeta->GetHealth() ) ?> health at the moment. It's a <?php echo( $zeta->GetSpecies() ) ?> (special move: <?php echo( $zeta->DoSpecialMove() ) ?>)</p>
			
			<p>			
				<?php echo( $eta->GetName() ) ?> is a <?php echo( $eta->GetGender() ) ?> and has <?php echo( $eta->GetHealth() ) ?> health at the moment. It's a <?php echo( $eta->GetSpecies() ) ?> (special move: <?php echo( $eta->DoSpecialMove() ) ?>)</p>

		</section>

	</body>
</html>