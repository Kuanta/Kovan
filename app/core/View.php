<?php
	class View{
		protected $contents=array();
		public $data; //Every variable in contents will be a member of $data array ($data['title']...)

		private function checkContents(){
			//Check if the first and last element of the contents array is header.php and footert.php
			if(!isset($this->contents[0])){
				$this->contents[0]='header.php';
			}
			elseif($this->contents[0]!='header.php'){
				array_unshift($this->contents, 'header.php');
			}
			if($this->contents[count($this->contents)-1]!='footer.php'){
				array_push($this->contents,'footer.php');
			}
		}
		public function outputContents(){
			$data=$this->data;
			$this->checkContents();
			foreach ($this->contents as $content) {
				include(CONTENTS_FOLDER.$content);
			}
		}
	}
?>