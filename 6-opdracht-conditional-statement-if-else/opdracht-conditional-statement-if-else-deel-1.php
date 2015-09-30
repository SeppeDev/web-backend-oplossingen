<?php

	$year				= 1952;
	$intercalaryYear	= "no";

	if ($year % 4 == 0 && $year % 100 != 0 || $year % 400 == 0)
	{
		$intercalaryYear = "a";
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>6 | Oplossing conditional statement if else</title>
	</head>
	<body>

		<p>The year <?php echo $year ?> is <?php echo $intercalaryYear ?> intercalary year.</p>
		

	</body>
</html>