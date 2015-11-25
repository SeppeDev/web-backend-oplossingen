<?php

	class HTMLBuilder
	{

		protected $header;
		protected $body;
		protected $footer;

		public function __construct( $header, $body, $footer )
		{

			$this->header 			=	$header;
			$this->body 			=	$body;
			$this->footer 			=	$footer;

			$this->PageBuilder();

		}

		public function BuildHeader()
		{

			$cssDir					=	dirname( dirname( __FILE__ ) ) . "/css/";
			$filesArray				=	$this->Findfiles( $cssDir, "css" );
			$cssLinks				=	$this->CreateCssLink( $filesArray );

			include "html/" . $this->header;

		}

		public function BuildBody()
		{

			include "html/" . $this->body;

		}

		public function BuildFooter()
		{

			include "html/" . $this->footer;

		}

		protected function PageBuilder()
		{

			$this->BuildHeader();
			$this->BuildBody();
			$this->BuildFooter();

		}

		protected function Findfiles( $dir, $file )
		{

			return glob( $dir . "/" . $file );

		}

		protected function CreateCssLink( $filesArray )
		{

			$dumpArray				=	array();

			foreach( $filesArray as $key )
			{
				
			}

		}

	}

?>