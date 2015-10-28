<?php
	
	$articles[]					=	array(
											"title"	=>	"Life is good",
											"text"	=>	"As stated above, life is good, if it wouldn't be good, we wouldn't want to live it.",
											"tags"	=>	array(
																"life",
																"good")
											);

	$articles[]					=	array(
											"title"	=>	"Life is bad",
											"text"	=>	"As stated above, life is bad, if it was good, we would want to live it.",
											"tags"	=>	array(
																"life",
																"bad")
											);

	$articles[]					=	array(
											"title"	=>	"Life is the best!",
											"text"	=>	"As stated above, life is the best, if it wouldn't be good, we wouldn't want to live it.",
											"tags"	=>	array(
																"life",
																"the best")
											);

	if( isset( $_GET[ "article" ] ) )
	{

		$article 				=	$articles[ $_GET[ "article" ] ];

	}

	/*header*/
	include "view/header-partial.html";

	/*body*/
	if( isset( $_GET[ "article" ] ) )
	{
		include "view/body-partial.html";
	}
	else
	{
		include "view/body.html";
	}

	/*footer*/
	include "view/footer-partial.html";

	

?>