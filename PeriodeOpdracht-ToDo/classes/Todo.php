<?php

	class Todo
	{

		protected $id;
		protected $description;
		protected $isDone;

		public function __construct( $id, $description, $isDone )
		{

			$this->id 			=	$id;
			$this->description 	=	$description;
			$this->isDone 		=	$isDone;

		}

		public function GetId()
		{

			return $this->id;

		}

		public function GetDescription()
		{

			return $this->description;

		}

		public function GetisDone()
		{

			return $this->done;

		}

		public function ChangeIsDone( $doneIsTrue )
		{

			$this->isDone += $doneIsTrue;

			return $this->isDone;

		}

	}

?>