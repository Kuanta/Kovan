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

		private $linksToShow=11; //Always an odd number. [First < ...1 2 3 4 5 [6] 7 8 9 10 11... >Last ]

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
		public function createLinks($url){
			$hrefs=array();
			/*
				Each element in hrefs array will be an ass. array with 'href' and 'value' keys.
				To use $hrefs array:
				foreach($hrefs as $href){
					echo "<a href=".$href['href'].">".$href['value']."</a>"
				}
			*/
			if($this->totalPages==1){
				$hrefs['current']=1;
			}else{
				//Current page is somewhere in middle
				if(($this->currentPage-(($this->linksToShow-1)/2)) > 0 && 
					($this->totalPages-$this->currentPage) >($this->linksToShow-1)/2){
					for($i=$this->currentPage-($this->$linksToShow-1)/2;$i<=$this->linksToShow;$i++){
						array_push($hrefs,['href'=>$url.'/'.$i,'value'=>$i]);
					}
						
				//Current page is near the end
				}elseif(($this->totalPages > $this->linksToShow) && $this->totalPages-$this->currentPage>($this->$linksToShow-1)/2){
					for($i=$this->totalPages-$this->linksToShow;$i<=$this->linksToShow;$i++){
						array_push($hrefs,['href'=>$url.'/'.$i,'value'=>$i]);
					}
			
				//Current Page is near the beginning
				}elseif($this->totalPages>$this->linksToShow && $this->currentPage-($this->linksToShow-1)/2>0){
					for($i=1;$i<=$this->linksToShow;$i++){
						array_push($hrefs,['href'=>$url.'/'.$i,'value'=>$i]);
					}
				}

				//Default
				else{
					for($i=0;$i<$this->totalPages;$i++){
						array_push($hrefs,['href'=>$url.'/'.$i,'value'=>$i]);
					}
				}

				if($this->hasPreviousPage()){
					array_unshift($hrefs,['href'=>$url.'/'.($this->currentPage-1),'value'=>'Prev']);
					array_unshift($hrefs,['href'=>$url.'/'.'1','value'=>'First']);
				}
				if($this->hasNextPage()){
					array_push($hrefs,['href'=>$url.'/'.($this->currentPage+1),'value'=>'Next']);
					array_push($hrefs,['href'=>$url.'/'.$this->totalPages,'value'=>'Last']);
				}

				return $hrefs;
			}
		}


	}

?>