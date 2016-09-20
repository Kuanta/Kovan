<?php
	class  Controller{
		
		protected $action='';
		protected $parameters=array();

		public function __construct($action,$parameters=[]){
			
			if($action!=null){
				$this->action=$action;
			}else{
				$this->action='index';
			}
			if(is_array($parameters)){
				for($i=0;$i<count($parameters);$i++){
					$this->parameters[$i]=$parameters[$i];
				}	
			}
			
		}
		public function init(){
			if(method_exists($this, $this->action)){
				call_user_func_array([$this,$this->action],$this->parameters);
			}else{
				$this->defaultMethod();
			}

		}
		protected function defaultMethod(){
			// If there is somehow a problem about calling the right
			//method, call this one
			//Override in child class
		}
		protected function sendData($key,$value,$view){
			//Sends data to view. (Like the name of the title)
			if($view!=null){
				$view->data[$key]=$value;
			}
			
		}
		protected function sendMultipleData($data){

		}
		public static function checkVariable($variable){
			if(isset($variable) && $variable!=null){
				return true;
			}else{
				return false;
			}
		}

		//-----UPDATE NEEDED-----
		//Update these methods to check the .php extension
		public function includeView($filename){
			include(VIEWS_FOLDER.$filename.'.php');
		}
		public function includeModel($filename){
			include(MODELS_FOLDER.$filename.'.php');
		}
		//-----UPDATE NEEDED-----
	}
?>