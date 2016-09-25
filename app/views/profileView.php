<?php

	class ProfileView extends View{
		public function index(){
			$this->contents=[
				'displays/profileDisplay.php'
			];
			$this->outputContents();
		}
	}

?>