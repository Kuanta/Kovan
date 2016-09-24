<?php
	class Display extends Controller{

		private $title='Posts';

		public function listPosts(){
			/*
				This method will preview posts 
			*/

			$this->includeView('displayView');
			$view=new displayView();
			$this->sendData('title',$this->title,$view);

			$this->includeModel('post');
			$model=new Post();
			$posts=$model->getPosts();

			$this->sendData('posts',$posts,$view);

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