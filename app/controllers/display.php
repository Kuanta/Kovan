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
			if($result==null){
				$view->listPosts(false);
			}else{
				$posts=$result['posts'];
				$hrefs=$result['hrefs'];

				$this->sendData('posts',$posts,$view);
				$this->sendData('hrefs',$hrefs,$view);
				$view->listPosts(true);
			}


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
		public function search($keyword='',$curPage=1){
			$this->includeView('displayView');
			$view=new displayView();
			$this->sendData('title',$this->title,$view);

			$this->includeModel('post');
			$model=new Post();
			$result=$model->search($curPage,'post_date','desc',$keyword);

			if($result==null){
				$view->listPosts(false);
			}else{
				$posts=$result['posts'];
				$hrefs=$result['hrefs'];

				$this->sendData('posts',$posts,$view);
				$this->sendData('hrefs',$hrefs,$view);
				$view->listPosts(true);
			}
			

		}
		protected function defaultMethod(){
			$this->listPosts();
		}

	}