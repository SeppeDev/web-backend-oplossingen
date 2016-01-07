<?php
	
	session_start();

	function __autoload( $classname )
	{
		require_once( $classname . '.php' );
	}



	$registrationFormName								=	"opdracht-security-login.php";


	if( isset( $_POST["passwordGenerator"] ) )
	{

		$randomPassword									=	generatePassword( 15, true, true, true, true );

		$_SESSION["registrationDetails"]["email"]		=	$_POST["email"];
		$_SESSION["registrationDetails"]["password"]	=	$randomPassword;

		header( "location: " . $registrationFormName );

	}

	elseif( isset( $_POST["register"] ) )
	{

		$email										=	$_POST["email"];
		$password 									=	$_POST["password"];

		$_SESSION["registrationDetails"]["email"]		=	$email;
		$_SESSION["registrationDetails"]["password"]	=	$password;


		$isAnEmail	=	filter_var( $email, FILTER_VALIDATE_EMAIL );

		if( $isAnEmail )
		{

			if( $password != "" )
			{

				$db			=	new PDO( "mysql:host=localhost;dbname=opdracht-security-login", "root", "" );
				$database	=	new Database( $db );

				$userData	=	$db->query( "SELECT *
													FROM users 
													WHERE email = :email",
													array( ":email" => $email ) );

				if( isset( $userData["data"][0] ) )
				{

					$_SESSION["notifications"]["type"]		=	"error";
					$_SESSION["notifications"]["message"]	=	"This emailaddress is already in use";
					
					header( "location: " . $registrationFormName );

				}
				else
				{

					/*$salt 			=	uniqid(mt_rand(), true);
					$hashedPassword	=	hash( "sha512", $salt . $password );

					$query			=	"INSERT INTO users( email, salt, password, lastlogin )
													VALUES( :email, :salt, :password, NOW() )";

					$values 		=	array(	":email"	=> $email,
												":salt"		=> $salt,
												":password"	=> $hashedPassword );*/





					$newUser		=	User::CreateNewUser( $db, $email, $password );

					if( $newUser )
					{

						$_SESSION["notifications"]["type"]		=	"success";
						$_SESSION["notifications"]["message"]	=	"You have been registered, Welcome!";
						
						header( "location: dashboard.php" );

					}

				}

			}
			else
			{

				$_SESSION["notifications"]["type"]		=	"error";
				$_SESSION["notifications"]["message"]	=	"No valid password";
			
				header( "location: " . $registrationFormName );

			}

		}
		else
		{

			$_SESSION["notifications"]["type"]		=	"error";
			$_SESSION["notifications"]["message"]	=	"No valid emailaddress";

			header( "location: " . $registrationFormName );

		}

	}


	function generatePassword(	$length,
								$numeric 				=	true,
								$alphanumeric 			=	true,
								$alphanumericUpperCase	=	true,
								$specialCharacters		=	true )
	{

		$password 									=	"";
		$characters 								=	array();
		$passwordLengthCounter 						=	0;

		if( $numeric )
		{

			$characters["numeric"]					=	array( 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 );

		}

		if( $alphanumeric )
		{

			$characters["alphanumeric"]				=	array( "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z" );

		}

		if( $alphanumericUpperCase )
		{

			$characters["alphanumericUpperCase"]	=	array( "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z" );

		}

		if( $specialCharacters )
		{

			$characters["specialCharacters"]		=	array( "$", "%", "+", "-", "*", "/", "*" );

		}


		while( $passwordLengthCounter < $length )
		{

			$arrayCounter							=	0;

			foreach( $characters as $value )
			{

				if( $passwordLengthCounter < $length )
				{

					$randomCharacter				=	rand( 0, ( count( $value ) - 1 ) );
					$password 						.=	$value[$randomCharacter];

					$passwordLengthCounter++;

				}

				$arrayCounter++;

			}

		}

		$password = str_shuffle( $password );

		return $password;

	}

?>