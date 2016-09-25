<?php
	class FeedView extends View{
		public function index(){
			$this->contents=[
				'previews/postsPreview.php'
			];
			$this->outputContents();
		}
	}
?>