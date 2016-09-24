<?php
	class HomeView extends View{
		public function index(){
			$this->contents=[
				'displays/homeDisplay.php'
			];
			$this->outputContents();
		}
	}
?>