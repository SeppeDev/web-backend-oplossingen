				jQuery.noConflict();

				( function( $ ){

					$( document ).ready( function(){

						console.log("Ready!");


						var dataGlobal;
					
						$.getJSON( "klaslijst.js", function( data ){

							console.log( "getJSON succesful" );
							console.log ( data );
							dataGlobal	=	data;

							for( klaslijst in data ){

								console.log("klaslijst: " + klaslijst);

								var klasOption	=	"<option>" + klaslijst + "</option>";
								$("#klasgroep").append(klasOption);

							}

						});

						$("#klasgroep").change(function(){

							var selected = $("#klasgroep option:selected").val();

							for( leerling in dataGlobal[selected] ){

								console.log(dataGlobal[selected][leerling]);

								var leerlingOption	=	"<option>" + dataGlobal[selected][leerling] + "</option>";
								$("#leerlingen").append(leerlingOption);

							}

							$("h1").html( selected );

						});

						$("#leerlingen").change(function(){

							var selected = $("#leerlingen option:selected").val();

							$("h3").html( selected );

						});;

					});

				})( jQuery );

					// haal het jsonobject op uit klaslijst.js en voer de callbackfunctie uit

						// de ontvangen data is onmiddelijk toegankelijk als object (json)
						// loop door het object: deze bestaat in eerste dimensie uit de klasgroepen

							// maak per klasgroep een option aan in de eerste select

						
						// koppel een change-event-listener aan de select:
						// wanneer de waarde van de select verandert, voer dan de functie selectGroep uit.
						// trigger een change event om de functie al eens uit te voeren
						// (trigger doet alsof de select veranderd is, zonder dat dat het geval is)

						
					
					// wordt uitgevoerd als de eerste select verandert (of zo'n trigger krijgt)
						
						// vraag de huidige waarde van de select op (klasgroep)
						
						// maak de tweede select leeg
											
						// loop door het klasgroepobject (tweede dimensie van het json-object)
							
							// maak een option aan
							// geef de option de juiste value (de key leerling), value is een attribuut van de option
							// en vul de juiste tekst in (opvragen met behulp van de key leerling)
							
							// voeg de net aangemaakte option toe aan de tweede select
							
						
						// koppel een change-event-listener aan de select (de functie selectLeerling)
						// en trigger direct een eerste change om de functie uit te voeren
						
					
					// wordt uitgevoerd als de tweede select verandert (of zo'n trigger krijgt)
						
						// vraag de huidige waarde van de select op (leerlingId)

						// vraag de tekst van de geselecteerde option op (leerlingnaam)
						
						// zoek de H1, geef als tekst de naam van de leerling mee
						// zoek het volgende element (de H3), geef als tekst het leerlingID mee