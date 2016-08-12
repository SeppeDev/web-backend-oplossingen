$( document ).ready( function(){

	$( "#messageForm" ).submit( function(){

		var messageFormData					=	$( "#messageForm" ).serialize();

		$.ajax( {

			type: "POST",
			url: "contact.php",
			data: messageFormData,
			success: function( data ){

				data 	=	JSON.parse( data );

				if( data["type"] == "succes" )
				{

					$( "#messageForm" ).fadeOut( "slow", function(){

						$( "#sentMessage" ).html( "<p class='modal success'>Thanks, message well sent!</p>" ).hide().fadeIn( "slow" );

					} );

				}
				else if( data["type"] == "error" )
				{

					$( "#sentMessage" ).html( "<p class='modal error'>Something went wrong! Try again!</p>" ).hide().fadeIn( "slow" );

				}

			}

		} )

		return false;

	} );

});