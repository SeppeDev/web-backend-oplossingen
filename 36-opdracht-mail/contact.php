<?php
	
	session_start();


	if( isset( $_POST["submit"] ) )
	{

		$admin 									=	"goossens.seppe.dev@gmail.com";


		$source 								=	$_POST["email"];
		$message 								=	$_POST["message"];
		$copyToMe								=	(isset( $_POST["copyToMe"] ) ) ? "checked" : "";

		$_SESSION["sendMessage"]["email"] 		=	$source;
		$_SESSION["sendMessage"]["message"] 	=	$message;
		$_SESSION["sendMessage"]["copyToMe"] 	=	$copyToMe;

		try
		{

			$db			=	new PDO( "mysql:host=localhost;dbname=opdracht-mail", "root", "" );
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$_SESSION["notifications"]["type"] 		=	"success";
			$_SESSION["notifications"]["message"] 	=	"Connection";

			$query 		=	$db->query("INSERT INTO users(	email,
																		message,
																		time_sent)
												VALUES( '" . $source . "',
														'" . $message . "',
														NOW() )");


			$to      		= 	$admin;
			$subject 		= 	'Vraag van ' . $source;

			$body 			= 	'<p>Beste, </p>';
			$body 			.=	'<p>iemand heeft je via de website proberen te contacteren. Dit is zijn bericht:<p>';
			$body 			.=	'<p style="font-style:italic;">' . $message . '</p>';
											
			$headers 		= 	'From: ' . $source . "\r\n";
			$headers 		.=	'Reply-To: ' . $source  . "\r\n";
			$headers		.= 	'MIME-Version: 1.0' . "\r\n";
			$headers		.= 	'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";

			$messageSent = mail($to, $subject, $body, $headers);	


			$copySent	=	true;

			if ($copyToMe)
			{
				$to      		= 	$source;
				$subject 		= 	'Kopie van vraag aan ' . $admin;

				$body 			=	'<p>Beste, </p>';
				$body 			.=	'<p>Bij deze een kopie van je vraag aan ' . $admin . '<p>';
				$body 			.=	'<p style="font-style:italic;">' . $message . '</p>';
				$body 			.=	'<p>Wij nemen zodra we kunnen contact met je op!</p>';
												
				$headers 		= 	'From: ' . $admin . "\r\n";
				$headers 		.=	'Reply-To: ' . $admin  . "\r\n";
				$headers		.= 	'MIME-Version: 1.0' . "\r\n";
				$headers		.= 	'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
					
				$copySent 	=	mail($to, $subject, $body, $headers);
			}

			if ($messageSent && $copySent)
			{
				
				$_SESSION["notifications"]["type"] 		=	"success";
				$_SESSION["notifications"]["message"] 	=	"Thank you for the message! We'll be in contact a.s.a.p.";

				unset( $_SESSION["sendMessage"] );

			}

			header( "location: opdracht-mail.php" );
			
		}
		catch( PDOException $e )
		{

			$_SESSION["notifications"]["type"] 		=	"error";
			$_SESSION["notifications"]["message"] 	=	"Could not connect.";

			header( "location: opdracht-mail.php" );
		
		}

	}
	else
	{

		$_SESSION["notifications"]["type"]		=	"error";
		$_SESSION["notifications"]["message"]	=	"Something went wrong!";
					
		header( "location: opdracht-mail.php" );

	}


?>