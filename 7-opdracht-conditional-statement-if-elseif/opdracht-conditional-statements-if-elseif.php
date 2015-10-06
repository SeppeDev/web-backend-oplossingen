<?php

	$TheNumber			= 34;
	$TheAnswer			= null;


	if ($TheNumber <= 10)
	{
		$TheAnswer = "The Number lies between 1 and 10.";
	}
	elseif ($TheNumber <= 20)
	{
		$TheAnswer = "The Number lies between 10 and 20.";
	}
	elseif ($TheNumber <= 30)
	{
		$TheAnswer = "The Number lies between 20 and 30.";
	}
	elseif ($TheNumber <= 40)
	{
		$TheAnswer = "The Number lies between 30 and 40.";
	}
	elseif ($TheNumber <= 50)
	{
		$TheAnswer = "The Number lies between 40 and 50.";
	}
	elseif ($TheNumber <= 60)
	{
		$TheAnswer = "The Number lies between 50 and 60.";
	}
	elseif ($TheNumber <= 70)
	{
		$TheAnswer = "The Number lies between 60 and 70.";
	}
	elseif ($TheNumber <= 80)
	{
		$TheAnswer = "The Number lies between 70 and 80.";
	}
	elseif ($TheNumber <= 90)
	{
		$TheAnswer = "The Number lies between 80 and 90.";
	}
	elseif ($TheNumber <= 100)
	{
		$TheAnswer = "The Number lies between 90 and 100.";
	}
	else
	{
		$TheAnswer = "You are cheating and gave a number that's not between 1 and 100.";
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>6 | Oplossing conditional statement if else</title>
	</head>
	<body>

		<h1><?php echo $TheNumber ?></h1>
		
		<p><?php echo $TheAnswer ?></p>
		

	</body>
</html>