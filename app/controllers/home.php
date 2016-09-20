<?php
	class Home extends Controller{
		
		public function index(){
			$this->includeView('homeView');
			$view=new HomeView();
			$this->sendData('title','Home',$view);
			$view->index();
		}
		protected function defaultMethod(){
			$this->index();
		}
	}
?>