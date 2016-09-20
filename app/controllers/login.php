<?php
	class Login extends Controller{
		public function index(){
			$this->includeView('loginView');
			$view=new LoginView();
			$this->sendData('title','Login',$view);
			$view->index();
		}
		public function submit(){
			$this->includeView('loginView');
			$view=new LoginView();
			$this->sendData('title','Login',$view);

			$this->includeModel('user');
			$model=new User();
			$result=$model->checkLoginInfo();
			if($result['type']=='user'){
				//Infos are valid
				$model->login($result['array']);
			}else{
				$this->sendData('errors',$result['array'],$view);
			}
			$view->submit();
		}
		public function defaultFunction(){
			$this->index();
		}
		
	}
?>