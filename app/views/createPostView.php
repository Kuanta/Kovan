<?php
	
	class CreatePostView extends View{
		public function index(){
			$this->contents=[
				'forms/createPostForm.php'
			];
			$this->outputContents();
		}
		public function submit(){

			if(isset($this->data['errors'])){
				$this->contents=[
				'forms/createPostForm.php',
				'errors.php'
				];
			}else{
				$this->contents=[
					'echo'=>'Created Post'
				];
			}
			$this->outputContents();

		}
	}
	

?>