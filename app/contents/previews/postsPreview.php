<?php
	
	if(isset($data['posts'])){

		foreach($data['posts'] as $post){

			?>
			<div class='postPreviewWrapper'>
				<a href="<?= PUBLIC_FOLDER?>display/byId/<?= $post['id']?>">
					<div class='postPreview'>
						<div class='title'><?= $post['title'] ?></div>
						<p class='content'><?= $post['content']?></p>
						<div class='postDate'><?= $post['post_date']?></div>
					</div>
				</a>
				<a href='<?=PUBLIC_FOLDER?>profile/index/<?= $post['user_id']?>'><div class='posterInfo'>Posted By: <?= $post['username']?></div></a>
			</div>
			<?php

		}

	}

?>