<?php
	class Model{

		protected $db;
		protected $coreQueryComplete=false; //Without completeing the core query, statement like limit can't be 

		public function __construct(){
			$this->db=new Database();
		}
		public function selectAll($column,$table){
			$this->db->query('select :column from :table');
			$this->db->bind(':column',$column);
			$this->db->bind(':table',$column);
			$this->db->execute();

		}
		public function selectWhere($column,$table,$condition){
			/*
				This method aims to build sql statements using WHERE. $condition argument can be
			an array holding needed column values and key words like 'AND, OR'
				'keyWord' is a special key for the $condition array since the method will think that
			 the according value as logic operator.
			*/
			$query='select '.$column.' from '.$table.' where ';
			if(is_array($condition)){
				foreach($condition as $key=>$value){
					if($key==='keyWord' && ($value==='OR' || $value==='or')){
						$query.=' OR ';
					}elseif($key='keyword' && ($value==='AND' || $value==='and')){
						$query.=' AND ';
					}else{
						$query.=' '.$key.'='.$value;
					}
				}
			}
		}
	}
?>