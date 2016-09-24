<?php
	
	class DisplayView extends View{

		public function listPosts(){
			$this->contents=[
				'previews/postsPreview.php',
				'paginationLinks.php'
			];
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