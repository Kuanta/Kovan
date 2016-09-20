<?php
	class HomeView extends View{
		public function index(){
			$this->contents=[
				'navbar.php',
				'displays/homeDisplay.php'
			];
			$this->outputContents();
		}
	}
?>