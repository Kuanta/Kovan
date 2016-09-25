<div class='profileDisplay'>
	<div class='username'><?=$data['user']['username']?></div>
	<div class='regDate'><?=$data['user']['reg_date']?></div>
	<?php
		//If this isn't the user, show follow button
		if(isset($_SESSION['user']) && $data['user']['id']!=$_SESSION['user']['id']){
			if(!$data['user']['following']){
				?>
					<a href='<?= PUBLIC_FOLDER?>profile/follow/<?= $data['user']['id']?>'>Follow<a/>
				<?php
			}else{
				?>
					<a href='<?= PUBLIC_FOLDER?>profile/unfollow/<?= $data['user']['id']?>'>Unfollow<a/>
				<?php
			}
		}
	?>
</div>