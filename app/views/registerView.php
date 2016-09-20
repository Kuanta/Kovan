<?php
	class RegisterView extends View{
		public function index(){
			$this->contents=[
				'navbar.php',
				'forms/registerForm.php'
			];
			parent::outputContents();
		}
		public function submit(){
			if(isset($this->data['errors'])){
				$this->contents=[
				'navbar.php',
				'forms/registerForm.php',
				'errors.php'
				];
			}else{
				$this->contents=[
					'navbar.php',
					'messages/registerDone.php'
				];
			}
			parent::outputContents();
		}
	}
?>