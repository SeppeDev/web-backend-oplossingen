<<!DOCTYPE html>
<html>

	<head>

		<title>Your Todo List</title>

		<link rel="stylesheet" type="text/css" href="{{ URL::asset( 'css/reset.css' ) }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset( 'css/style.css' ) }}">
	
	</head>

	<body>

		<div class="container">
			
			@yield( "content" )

		</div>

	</body>

</html>