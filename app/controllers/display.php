<?php
	class Display extends Controller{

		private $title='Posts';

		public function listPosts($curPage=1){
			/*
				This method will preview posts 
			*/

			$this->includeView('displayView');
			$view=new displayView();
			$this->sendData('title',$this->title,$view);

			$this->includeModel('post');
			$model=new Post();
			$result=$model->getPosts($curPage);
			$posts=$result['posts'];
			$hrefs=$result['hrefs'];

			$this->sendData('posts',$posts,$view);
			$this->sendData('hrefs',$hrefs,$view);
			$view->listPosts();


		}
		public function byId($postId){
			$this->includeView('displayView');
			$view=new displayView();
			$this->sendData('title',$this->title,$view);

			$this->includeModel('post');
			$model=new Post();
			$post=$model->getPostById($postId);
			$this->sendData('post',$post,$view);
			$view->displayPost();
		}
		protected function defaultMethod(){
			$this->listPosts();
		}

	}