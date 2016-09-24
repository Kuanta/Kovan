<?php
	
	/*
		Usage:
		$pagination=new Pagination(10,10,0);
		$db->sql('select * from ... LIMIT '.$pagination->perPage.' OFFSET '.$pagination->offset');
		....
	*/

	class Pagination{

		public $currentPage;
		public $perPage=5;
		public $totalCount;
		public $totalPages;

		public function __construct($page=1,$totalCount=0){
			$this->currentPage=$page;
			$this->totalCount=$totalCount;
			$this->totalPages=$this->totalPages();
			if(isset($_SESSION['perPage'])){
				$this->perPage=$_SESSION['perPage'];
			}
			if($this->currentPage>$this->totalPages){
				$this->currentPage=$this->totalPages;
			}elseif($this->currentPage<1){
				$this->currentPage=1;
			}
		}
		public function totalPages(){
			return ceil($this->totalCount/$this->perPage);
		}
		public function getOffset(){
			return ($this->currentPage-1)*$this->perPage;
		}
		public function hasNextPage(){
			if($this->currentPage+1<=$this->totalPages){
				return true;
			}else{
				return false;
			}
		}
		public function hasPreviousPage(){
			if($this->currentPage-1>0){
				return true;
			}else{
				return false;
			}
		}
		


	}

?>