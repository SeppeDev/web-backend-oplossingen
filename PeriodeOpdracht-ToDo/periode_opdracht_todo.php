<?php

	session_start();

	$emptyDescription						=	false;
	$errorMessage							=	"You must give a description to your TODO!";

	if( !isset( $_SESSION["todoArray"] ) )
	{
		$_SESSION["todoArray"]				=	array();
	}
	if( !isset( $_SESSION["doneArray"] ) )
	{
		$_SESSION["doneArray"]				=	array();
	}


	if( isset( $_POST["addTodo"] ) )
	{
		if( $_POST["description"] != "" )
		{
			array_push( $_SESSION["todoArray"], $_POST["description"] );
		}
		else
		{
			$emptyDescription 				=	true;
		}
	}


	if( isset( $_POST["toggleTodo"] ) )
	{
		$id 								=	$_POST["toggleTodo"];
		array_push( $_SESSION["doneArray"], $_SESSION["todoArray"][$id] );
		unset( $_SESSION["todoArray"][$id] );
	}

	if( isset( $_POST["deleteTodo"] ) )
	{
		$id 								=	$_POST["deleteTodo"];
		unset( $_SESSION["todoArray"][$id] );
	}


	if( isset( $_POST["toggleDone"] ) )
	{
		$id 								=	$_POST["toggleDone"];
		array_push( $_SESSION["todoArray"], $_SESSION["doneArray"][$id] );
		unset( $_SESSION["doneArray"][$id] );
	}

	if( isset( $_POST["deleteDone"] ) )
	{
		$id 								=	$_POST["deleteDone"];
		unset( $_SESSION["doneArray"][$id] );
	}

?>

<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="description" content="An interactive To Do list">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Todo App</title>
        <link rel="stylesheet" href="css/style.css">
    
    </head>

    <body>

    	<?php if( $emptyDescription ) : ?>

    		<div class="error"><?php echo( $errorMessage ) ?></div>

    	<?php endif ?>

    	<h1>Todo app</h1>

						
			<h2>Nog te doen</h2>

			<?php if(isset($_SESSION["todoArray"]) && !empty($_SESSION["todoArray"])): ?>

				<ul>
					
					<?php foreach ( $_SESSION["todoArray"] as $key => $toDo) : ?>
								
						<li>
							<form action="periode_opdracht_todo.php" method="POST">
								<button value="<?php echo( $key ) ?>" title="Status wijzigen" name="toggleTodo" class="status not-done"></button>
								<label title="Naam weergeven" name="displayNameTodo" class="not-done-text"><?php echo( $toDo ) ?></label>
								<button value="<?php echo( $key ) ?>" title="Verwijderen" name="deleteTodo">Verwijder</button>
							</form></li>

					<?php endforeach ?>

				</ul>

			<?php endif ?>

			<?php if( ( !isset( $_SESSION["todoArray"] ) || empty( $_SESSION["todoArray"] ) )  && ( isset( $_SESSION["doneArray"] ) && !empty($_SESSION["doneArray"] ) ) ) : ?>

				<div>Well done! You have nothing left to do...</div>

			<?php endif ?>

			<?php if( ( !isset( $_SESSION["todoArray"] ) || empty( $_SESSION["todoArray"] ) )  && ( !isset( $_SESSION["doneArray"] ) || empty($_SESSION["doneArray"] ) ) ) : ?>

				<div>Nothing planned yet..., come on, get some TODOs going!</div>

			<?php endif ?>


			
			<?php if(isset($_SESSION["doneArray"]) && !empty($_SESSION["doneArray"])): ?>

				<h2>Done</h2>

				<ul>
				
					<?php foreach ( $_SESSION["doneArray"] as $key => $done) : ?>
								
						<li>
							<form action="periode_opdracht_todo.php" method="POST">
								<button value="<?php echo( $key ) ?>" title="Status wijzigen" name="toggleDone" class="status done"></button>
								<label title="Naam weergeven" name="displayNameTodo" class="done-text"><?php echo( $done ) ?></label>
								<button value="<?php echo( $key ) ?>" title="Verwijderen" name="deleteDone">Verwijder</button>
							</form></li>

					<?php endforeach ?>
					
				</ul>

			<?php endif ?>


			<?php if(!isset($_SESSION["doneArray"]) || empty($_SESSION["doneArray"])): ?>

				<h2>Done and done!</h2>
					
				<p>Werk aan de winkel...</p>

			<?php endif ?>		
			
		
		<h1>Todo toevoegen</h1>

		<form action="periode_opdracht_todo.php" method="POST">

			<ul>
				<li>
					<label for="description">Beschrijving: </label>
					<input type="text" id="description" name="description">
				</li>
			</ul>

			<input type="submit" name="addTodo" value="Toevoegen">

		</form>
    
    </body>

</html>