<?php
	class User extends Model{
		
		private $username;
		private $minUsernameChar=6;
		private $password;
		private $minPasswordChar=6;
		private $email;
		private $tableName='users';

		public function __construct($username='',$password='',$email=''){
			parent::__construct();
		}
		public function checkFollowing($id){
			$this->db->query('select count(*) from follows where follower_id=:follower_id and followed_id=:followed_id');
			$this->db->bind(':follower_id',$_SESSION['user']['id']);
			$this->db->bind('followed_id',$id);
			$result=$this->db->single();
			return $result['count(*)'];
		}
		public function findById($id){
			$this->db->query('select * from users where id=:id');
			$this->db->bind(':id',$id);
			$this->db->execute();
			return $this->db->single();
		}
		public function follow($id){
			$this->db->query('insert into follows (follower_id,followed_id) values(:follower_id,:followed_id)');
			$this->db->bind(':follower_id',$_SESSION['user']['id']);
			$this->db->bind('followed_id',$id);
			$this->db->execute();
		}
		public function unfollow($id){
			$this->db->query('delete from follows where follower_id=:follower_id and followed_id=:followed_id');
			$this->db->bind(':follower_id',$_SESSION['user']['id']);
			$this->db->bind('followed_id',$id);
			$this->db->execute();
		}
		public function checkLoginInfo(){
			 /*
			This method will check Post datas. It will return the needed array at the end
			Controller which is calling this method should check the 'type' key and if that key's value
			is 'user', login() method must be called right after it
			*/


			$errors=array();
			$user=array();

			//Checking User input...

			//=====Username=====

			//If isn't null
			/*if(!Controller::checkVariable($_POST['username'])){
				array_push($errors,'Username is null');

			//If doesn't exist on db
			}else{
				$this->db->query('select * from users where username=?');
				$this->db->bind(1,$_POST['username']);
				$this->db->execute();
				if($this->db->rowCount()!=1){
					array_push($errors,'Username not found');
				}
			}*/
			if(Controller::checkVariable($_POST['username'])){
				
				//If exists on database
				$this->db->query('select * from users where username=?');
				$this->db->bind(1,$_POST['username']);
				$this->db->execute();
				$result=$this->db->single();

				if($this->db->rowCount()==1){

					//If password not null
					if(Controller::checkVariable($_POST['password'])){
						if(password_verify($_POST['password'],$result['password'])){
							
							//Can login
							$user['username']=$_POST['username'];
							return $result=['type'=>'user','array'=>$user];

						}else{
							array_push($errors,'Wrong Password');
						}
					}else{
						array_push($errors,'Password is null');
					}
				}else{
					array_push($errors,'Username not found');
				}
			}else{
			 	array_push($errors,'Username is null');
			}


			return $result=['type'=>'error','array'=>$errors];
		}
		public function login($user){

			$this->db->query('select * from users where username = ?');
			$this->db->bind(1,$user['username']);
			$this->db->execute();
			$result=$this->db->single();
			$_SESSION['user']=['username'=>$result['username'],'id'=>$result['id']];
			return true;

		}
		public function checkRegisterInfo(){
			/*
			This method will check Post datas. It will return the needed array at the end
			Controller which is calling this method should check the 'type' key and if that key's value
			is 'user', register() method must be called right after it
			*/
			$errors=array();
			$user=array();

			//Checking User input...

			//=====Username=====
			
			//If isn't null
			if(Controller::checkVariable($_POST['username'])){
				
				//If long enough
				if(strlen($_POST['username'])>=$this->minUsernameChar){
					
					//If unique
					$this->db->query('select * from '.$this->tableName.' where username=?');
					$this->db->bind(1,$_POST['username']);
					$this->db->execute();
					if($this->db->rowCount()==0){
						$user['username']=$_POST['username'];
					}else{
						array_push($errors,'Username is taken');
					}
				}else{
					array_push($errors,'Username is too short (min '.$this->minUsernameChar.')');
				}
				
			}else{
				array_push($errors,'Username is null');
			}

			//=====Password=====

			//If password_1 isn't null
			if(Controller::checkVariable($_POST['password_1'])){

				//If password_2 isn't null
				if(Controller::checkVariable($_POST['password_2'])){

					//If passwords match
					if($_POST['password_1']==$_POST['password_2']){

						//If password long enough
						if(strlen($_POST['password_1'])>=$this->minPasswordChar){
							$user['password']=$_POST['password_1'];
						}else{
							array_push($errors,'Password too short');
						}
					}else{
						array_push($errors,'Passwords do not match');
					}
				}else{
					array_push($errors,'Password 2 is null');
				}
			}else{
				array_push($errors,'Password 1 is null');
			}

			//=====Email=====

			//If not null
			if(Controller::checkVariable($_POST['email'])){
				
				//If valid
				if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
					$user['email']=$_POST['email'];
				}else{
					array_push($errors,"Email not valid");
				}
			}else{
				array_push($errors,'Email is null');
			}

			if(count($errors)>0){
				return $result=['type'=>'error','array'=>$errors];
			}else{
				return $result=['type'=>'user','array'=>$user];
			}
		}
		public function register($user){
			//Connect to database and create a row
			$this->db->query("insert into users (username,password,email) values (?,?,?)");
			$this->db->bind(1,$user['username']);
			$this->db->bind(2,password_hash($user['password'],PASSWORD_DEFAULT));
			//$this->db->bind(2,$user['password']);
			$this->db->bind(3,$user['email']);
			$this->db->execute();
			return true;
		}
	}
?>