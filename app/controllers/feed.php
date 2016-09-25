<?php

	class Feed extends Controller{

		private $title='Feed';

		public function index($curPage=1){
			if(isset($_SESSION['user'])){
				$this->includeView('feedView');
				$view=new FeedView();
				$this->sendData('title',$this->title,$view);

				$this->includeModel('post');
				$model=new Post();
				$result=$model->getFollowersPosts($curPage,'post_date','desc');
				$posts=$result['posts'];
				$hrefs=$result['hrefs'];

				$this->sendData('posts',$posts,$view);
				$this->sendData('hrefs',$hrefs,$view);
				$view->index();
				//Get followed users posts...

			}else{
				header('Location:'.PUBLIC_FOLDER);
			}
			
		}
		public function defaultMethod(){
			$this->index();
		}
	}

?>