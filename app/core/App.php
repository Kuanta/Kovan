<?php

	//Includes
	require_once('../app/core/Database.php');
	require_once('../app/core/Controller.php');
	require_once('../app/core/Model.php');
	require_once('../app/core/View.php');
	require_once('../app/config.php');

	class App{
		protected $controller='home';
		protected $action='index';
		protected $parameters=[];
		public function __construct(){

			//Index.php will instantiate this class. First thing to do is deciding which controller is going to run
			$url=$this->parseUrl();
		
			//Checking if the controller is valid
			if(isset($url[0]) && file_exists('../app/controllers/'.$url[0].'.php')){
				$this->controller=$url[0];
				unset($url[0]);
			}
			
			if(isset($url[1])){
				$this->action=$url[1];
				unset($url[1]);
			}
			
			$this->parameters=$url ? array_values($url):[];

		}

		
		public function init(){
			session_start();
			require_once('../app/controllers/'.$this->controller.'.php');
			$controller=new $this->controller($this->action,$this->parameters);
			return $controller;
		}	
		
		private function parseUrl(){
			if(isset($_GET['url']) && $_GET['url']!=null){
				return explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
			}
		}
	}
?>