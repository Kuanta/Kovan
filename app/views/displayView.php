<?php
	
	class DisplayView extends View{

		public function listPosts($foundPosts){
			if($foundPosts){
				$this->contents=[
					'previews/postsPreview.php',
					'paginationLinks.php'
				];
			}else{
				$this->contents=['messages/noPosts.php'];
			}
			
			$this->outputContents();
		}
		public function displayPost(){
			$this->contents=[
				'displays/postDisplay.php'
			];
			$this->outputContents();
		}
	}

?>