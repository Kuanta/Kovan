<?php
	
	class Logout extends Controller{
		public function defaultMethod(){
			if($this->checkVariable($_SESSION['user'])){
				unset($_SESSION['user']);
			}
			header('Location:'.PUBLIC_FOLDER);
		}
	}

?>