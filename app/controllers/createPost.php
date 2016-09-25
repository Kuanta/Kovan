<?php
	
	class CreatePost extends Controller{
		
		private $title='Create Post';

		public function index(){
			if(isset($_SESSION['user']) && $_SESSION['user']!=null){
				$this->includeView('createPostView');
				$view=new CreatePostView();
				$this->sendData('title',$this->title,$view);
				$view->index();
			}else{
				header('Location:'.PUBLIC_FOLDER);
			}
			
		}
		public function submit(){
			$this->includeView('createPostView');
			$view=new CreatePostView();
			$this->sendData('title',$this->title,$view);

			$this->includeModel('post');
			$model=new Post();
			$result=$model->checkPostInfo();
			
			if($result['type']==VALID_ARRAY){
				$model->createPost($result['array']);
			}else{
				$this->sendData('errors',$result['array'],$view);
			}

			$view->submit();
		}
		public function defaultMethod(){
			$this->index();
		}
	}

?>