<?php
	class Post extends Model{
		private $title;
		private $content;

		public function checkPostInfo(){

			$errors=array();
			$post=array();

			//Title
			if(!Controller::checkVariable($_POST['postTitle'])){
				array_push($errors,'Missing Title');
			}else{
				$post['title']=$_POST['postTitle'];
			}

			//Content
			if(!Controller::checkVariable($_POST['postContent'])){
				array_push($errors,'Missing Content');
			}else{
				$post['content']=$_POST['postContent'];
			}

			if(count($errors)>0){
				return $result=['type'=>ERROR_ARRAY,'array'=>$errors];
			}else{
				return ['type'=>VALID_ARRAY,'array'=>$post];
			}
		}
		public function createPost($post){

			$this->db->query('Insert into posts (user_id,title,content) values (:user_id,:title,:content)');
			$this->db->bind(':user_id',$_SESSION['user']['id']);
			$this->db->bind(':title',$post['title']);
			$this->db->bind(':content',$post['content']);
			$this->db->execute();
			header('Location:'.PUBLIC_FOLDER);
		}
		public function getPosts($page=1,$orderBy='post_date',$ordering='desc'){
			//Get the total count for pagination...
			$this->db->query('Select count(*) from posts left outer join users on posts.user_id=users.id');
			$this->db->execute();
			$result=$this->db->single(); //$result['count(*)']
			

			require_once(CORE_FOLDER.'Pagination.php');
			$pag=new Pagination($page,$result['count(*)']);

			$this->db->query('Select 
				posts.id, title, content, post_date, users.id as user_id, username
				from posts left outer join users on posts.user_id=users.id order by '.$orderBy.' '.$ordering.
				' LIMIT '.$pag->perPage.' OFFSET '.$pag->getOffset());
			$this->db->execute();

			//Create 

			for($i=0;$i<$pag->totalPages)

			return $this->db->resultset();
		}
		public function getPostById($postId){
			$this->db->query('Select 
				posts.id, title, content, post_date, users.id as user_id, username
				from posts left outer join users on posts.user_id=users.id where posts.id=:id');
			$this->db->bind(':id',$postId);
			$this->db->execute();
			if($this->db->rowCount()<1){
				return null;
			}else{
				return $this->db->single();
			}
			
		}
	}
?>