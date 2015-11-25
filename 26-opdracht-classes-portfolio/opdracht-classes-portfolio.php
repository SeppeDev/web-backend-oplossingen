<?php
	
	function __autoload( $className )
	{

		include "classes/" . $className . ".php";
	
	}

	if( isset( $_GET['page'] ) )
	{
		$body 					=	"body-partial-" . $_GET["page"] . ".php";
	}
	else
	{
		$body					=	"body-partial-index.php";
	}

	$htmlBuild					=	new HTMLBuilder( "header-partial.php", $body, "footer-partial.php" );

?>