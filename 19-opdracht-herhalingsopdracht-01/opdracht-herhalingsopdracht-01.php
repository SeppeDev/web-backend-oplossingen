<?php
	
	$result						=	"";

	if ( isset($_GET["link"] ) )
	{

		switch ( $_GET["link"] )
		{
			case "course":
				$result = "<iframe src='<?php echo( 'http://web-backend.local/public/cursus/web-backend-cursus.pdf' ) ?>'></iframe>";
				break;

			case "examples":
				$result = SetResult("voorbeelden");
				break;

			case "exercises":
				$result = SetResult("opdrachten");
				break;
			
			default:
				$src = SetSrc("");
				break;
		}
	}


	function SetResult( $foldername )
	{

		$directories			=	array();
		$path = "http://web-backend.local/public/cursus/" . $foldername;


		foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $filename)
		{
	    	    $directories[] =  "$filename";
		}

		return $directories;

	}

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">

		<title>19 | Oplossing herhalingsopdracht</title>

		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>
	<body>

		<h1>Search</h1>

		<ul>
				
				<li>
					<a href="opdracht-herhalingsopdracht-01.php?link=course">Course</a>
				</li>

				<li>
					<a href="opdracht-herhalingsopdracht-01.php?link=examples">Examples</a>
				</li>

				<li>
					<a href="opdracht-herhalingsopdracht-01.php?link=exercises">Exercises</a>
				</li>

			</ul>

		<form action="opdracht-herhalingsopdracht-01.php" method="get">
			
			<label for="searchBox">Search for </label>
			<input type="text" name="searchBox" id="searchBox">

			<input type="submit" value="Log in">

		</form>

		
		<h1>Content</h1>

		<?php echo( $result ) ?>
		
	</body>
</html>