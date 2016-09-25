<?php
	class Profile extends Controller{

		private $title='Profile';

		public function index($id){

			$this->includeModel('user');
			$model=new User();
			$user=$model->findById($id);
			
			if($model->checkFollowing($id)>0){
				//Already following
				$user['following']=true;
			}else{
				$user['following']=false;
			}
			$this->includeView('profileView');
			$view=new ProfileView();
			$this->sendData('title',$user['username'].'\'s Profile',$view);

			$this->sendData('user',$user,$view);
			$view->index();

		}
		public function follow($id){
			$this->includeModel('user');
			$model=new User();
			$model->follow($id);
			header('Location:'.PUBLIC_FOLDER.'profile/index/'.$id);
		}
		public function unfollow($id){
			$this->includeModel('user');
			$model=new User();
			$model->unfollow($id);
			header('Location:'.PUBLIC_FOLDER.'profile/index/'.$id);
		}
	}
?>