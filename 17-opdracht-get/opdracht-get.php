<?php

	$showOneArticle		=	false;

	$articles[]			=	array(

									"title"			=>	"De gevangenis die niemand levend verlaat",
									"date"			=>	"13 december 2015",
									"content"		=>	"Er vinden geen executies plaats maar de enige manier om uit deze gevangenis in de Mojavewoestijn in Zuid-Californië te geraken, is in een lijkzak.
														Zeshonderd mannelijke gevangenen die tot levenslang zijn veroordeeld maar geen kans maken op een voorwaardelijke invrijheidstelling, zitten in een bijzondere vleugel van de streng beveiligde staatsgevangenis in Californië. Niemand heeft er de doodstraf gekregen maar de gevangenen zullen er de rest van hun leven slijten en uiteindelijk ook sterven. 

														De criminelen die gruwelijke misdaden begingen zoals moord en geen uitzicht hebben op vrijlating, volgen een speciaal regime en zoeken hun heil in spirituele groei om een beter mens te worden. Ze verblijven in een aparte vleugel van de gevangenis, uniek in zijn soort, waar geen geweld of raciale spanningen voorkomen. ",
									"image"			=>	"article-1.jpg",
									"imageDescr"	=>	"De buitenkant van een zwaar bewaakte gevangenis, omringd met wachttorens en muren in een dor landschap."

								);
	$articles[]			=	array(

									"title"			=>	"Vroege komst zwanen en lage temperatuur zeewater kondigen strenge winter aan",
									"date"			=>	"13 december 2015",
									"content"		=>	"Zet je schrap want alle tekenen wijzen op een strenge winter met veel sneeuw. En ook al is het nog volop herfst, de winter staat echt al wel voor de deur. De kans is reëel dat er morgen een eerste keer sneeuw valt in ons land, op de hoogste toppen van de Ardennen.
														De winter komt dit jaar dus ongemeen vroeg aankloppen. 'Gewoonlijk zien we pas begin november sneeuw in de Ardennen', bevestigt het KMI aan Het Laatste Nieuws. 'De eerste sneeuwvlokken vallen dit jaar dus een tweetal weken vroeger in het seizoen.' Aangezien de ondergrond nog lang niet koud genoeg is, gaat het evenwel om smeltende sneeuw. ",
									"image"			=>	"article-2.jpg",
									"imageDescr"	=>	"Besneeuwde akkers met kale bomen en struiken rond, onder een heldere hemel."

								);
	$articles[]			=	array(

									"title"			=>	"Deze paddenstoel bezorgt vrouwen spontaan orgasme",
									"date"			=>	"13 december 2015",
									"content"		=>	"Eekhoorntjesbrood, cantharellen, morieljes of de populaire champignon. Ja, die paddenstoelen kennen we. Maar had u al van de Phallus Indusiatus gehoord? Deze paddenstoel, die enkel lavagrond op Hawaï gedijt, bezorgt vrouwen een spontaan orgasme. Niet door 'm op te eten. De dames hoefden hem zelfs niet aan te raken. Ruiken aan de paddenstoel volstond om hen een orgasme te doen ervaren.
														De Phallus Indusiatus is een soort van de stinkhornfamilie en dankt zijn naam aan zijn vorm, die wat aan een penis doet denken. Hoewel, hij wordt ook bruidssluier genoemd, ook omwille van zijn vorm. 

														De medische wetenschappers John C. Hallyday en Noah Soule ontdekten de bijzondere kwaliteiten van de paddenstoel tijdens een experiment op Hawaï in 2001. Ze publiceerden hun bevindingen in het vakblad International Journal of Medicinal Mushrooms. 

														Zes op zestien
														De paddenstoel had de reputatie dat zijn geur een krachtig afrodisiacum is voor vrouwen. Dat wilden Halluday en Soule wel eens testen. Wat bleek? Zes van de zestien vrouwen die vrijwillig aan de paddenstoel roken, ervaarden een orgasme. De andere vrouwen kwamen niet tot een hoogtepunt, maar ervaarden wel lichamelijke effecten zoals een verhoogde hartslag. 

														Weerzinwekkend voor mannen
														De 20 mannen die aan de paddenstoel roken, rapporteerden niets meer dan een weerzinwekkende geur.

														De wetenschappers hebben een hypothese: de hormoonachtige elementen in de sporen van de paddenstoel zijn wellicht verwant met de neurotransmitters die tijdens het minnespel in het vrouwelijke brein vrijkomen. 

														In China wordt een eetbare variant van de paddenstoel gekweekt, maar voor u een een vliegticket boekt: in de studie werd de soort uit Hawaï gebruikt.",
									"image"			=>	"article-3.jpg",
									"imageDescr"	=>	"Een uitgestrekte hand waarvoor een champignon, in de vorm van een groot ei, met een gehaakte structuur op donkere bodem staat."

								);
	
	if( isset( $_GET["id"] ) )
	{

		$id = $_GET["id"];

		if( array_key_exists( $id, $articles ) )
		{

			$articles = array( $articles[$id] );
			$showOneArticle = true;

		}

	}

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">

		<?php if( $showOneArticle ) : ?>
			<title>17 | Oplossing GET | Article - <?php echo( $articles[$id]["title"] ) ?></title>
		<?php else : ?>
			<title>17 | Oplossing GET</title>
		<?php endif ?>

		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>
	<body>

		<h1>Het boeiendste nieuws ooit, hier voor u verzameld</h1>

		<?php foreach( $articles as $key => $article ) : ?>

			<article>
				
				<h2>
					<?php echo( $article["title"] ) ?>
				</h2>

				<img src="css/images/<?php echo( $article['image'] ) ?>" alt="<?php echo ( $article['imageDescr'] ) ?>">

				<p id="date">
					<?php echo( $article["date"] ) ?>
				</p>
					
				<p id="content">

					<?php if( $showOneArticle ) : ?>
						<?php echo( $article["content"] ) ?>
					<?php else : ?>
						<?php substr( $article["content"], 0, 50 ) ?>
					<?php endif ?>

				</p>

				<?php if( !$showOneArticle ) : ?>
					<a href="opdracht-get.php?key=<?php echo( $key ) ?>">Lees meer</a>
				<?php endif ?>

			</article>

		<?php endforeach ?>
		
	</body>
</html>