<?php

	class Animal
	{

		protected $name;
		protected $gender;
		protected $health;

		public function __construct( $name, $gender, $health )
		{

			$this->name 		=	$name;
			$this->gender 		=	$gender;
			$this->health 		=	$health;

		}

		public function GetName()
		{

			return $this->name;

		}

		public function GetGender()
		{

			return $this->gender;

		}

		public function GetHealth()
		{

			return $this->health;

		}

		public function ChangeHealth( $healthPoints )
		{

			$this->health += $healthPoints;

			return $this->health;

		}

		public function DoSpecialMove()
		{

			return "Walk";

		}

	}

?>