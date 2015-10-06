<?php

	$Animals			= array(	"Dog",
									"Cat",
									"Sheep",
									"Donkey",
									"Monkey",
									"Wolf");

	
	$NumberOfElements	= count($Animals);


	$AnimalToSearch		= "Donkey";

	$AnimalInArray		= null;
	
	if(in_array($AnimalToSearch, $Animals))
	{
		$AnimalInArray = "a";
	}
	else
	{
		$AnimalInArray = "no";
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>10 | Oplossing array functions</title>
	</head>
	<body>

		<p>There are <?php echo ($NumberOfElements)?> elements in the array.</p>
		<p>There is <?php echo ($AnimalInArray)?> <?php echo ($AnimalToSearch)?> in the array.</p>

	</body>
</html>