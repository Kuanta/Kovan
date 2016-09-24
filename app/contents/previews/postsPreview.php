<?php
	
	if(isset($data['posts'])){

		foreach($data['posts'] as $post){

			?>

			<a href="<?= PUBLIC_FOLDER?>display/byId/<?= $post['id']?>">
				<div class='postPreview'>
					<div class='title'><?= $post['title'] ?></div>
					<p class='content'><?= $post['content']?></p>
					<div class='postDate'><?= $post['post_date']?></div>
					<div class='posterInfo'>Posted By: <?= $post['username']?></div>
				</div>
			</a>
			<?php

		}

	}

?>