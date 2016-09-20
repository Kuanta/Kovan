<?php
	class LoginView extends View{
		public function index(){
			$this->contents=[
				'navbar.php',
				'forms/loginForm.php'
			];
			$this->outputContents();
		}
		public function submit(){
			if(isset($this->data['errors'])){
				$this->contents=[
				'navbar.php',
				'forms/loginForm.php',
				'errors.php'
				];
			}else{
				$this->contents=[
					'navbar.php',
					'messages/loginDone.php'
				];
				header('Location:'.PUBLIC_FOLDER);
			}
			parent::outputContents();
		}
	}
?>