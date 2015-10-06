<?php

	$Animals1			= array(	"Dog",
									"Cat",
									"Wolf",
									"Cow",
									"Sheep",
									"Donkey",
									"Monkey",
									"Rabbit",
									"Chicken",
									"Hawk");

	
	$Animals2[]			= "Dog";
	$Animals2[]			= "Cat";
	$Animals2[]			= "Wolf";
	$Animals2[]			= "Cow";
	$Animals2[]			= "Sheep";
	$Animals2[]			= "Donkey";
	$Animals2[]			= "Monkey";
	$Animals2[]			= "Rabbit";
	$Animals2[]			= "Chicken";
	$Animals2[]			= "Hawk";


	$Vehicles			= array(	"landvehicles"	=>	array(	"Bike",
																"Car"),
									"watervehicles"	=>	array(	"Speedboat",
																"Jetski"),
									"aircrafts"		=>	array(	"Airplane",
																"Helicopter")
								);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>9 | Oplossing array basis</title>
	</head>
	<body>

		<pre><?php var_dump($Animals1)?></pre>
		<pre><?php var_dump($Animals2)?></pre>
		<pre><?php var_dump($Vehicles)?></pre>

	</body>
</html>