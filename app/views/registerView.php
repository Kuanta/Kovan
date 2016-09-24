<?php
	class RegisterView extends View{
		public function index(){
			$this->contents=[
				
				'forms/registerForm.php'
			];
			parent::outputContents();
		}
		public function submit(){
			if(isset($this->data['errors'])){
				$this->contents=[
				
				'forms/registerForm.php',
				'errors.php'
				];
			}else{
				$this->contents=[
					
					'messages/registerDone.php'
				];
			}
			parent::outputContents();
		}
	}
?>