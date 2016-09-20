<?php
	
	class Register extends Controller{
		
		private $title='Register';

		public function index(){
			$this->includeView('registerView');
			$view=new RegisterView();
			$this->sendData('title','Register',$view);
			$view->index();
		}
		public function submit(){

			$this->includeView('registerView');
			$view=new RegisterView();
			$this->sendData('title','Register',$view);

			$this->includeModel('user');
			$model=new User();
			$result=$model->checkRegisterInfo();
			if($result['type']=='user'){
				//Infos are valid
				$model->register($result['array']);
			}else{
				//Send errors data
				$this->sendData('errors',$result['array'],$view);
			}

		
			$view->submit();
			
		}
		public function defaultFunction(){
			$this->index();
		}
	}
?>