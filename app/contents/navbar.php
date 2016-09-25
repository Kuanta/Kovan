<ul id='navbar'>
	<li><a href='<?= PUBLIC_FOLDER?>home'>Home</a></li>
	<li><a href='<?=PUBLIC_FOLDER?>display'>Posts</a></li>
		

		<?php
			if(isset($_SESSION['user']) && $_SESSION['user']!=null){
				?>
				
				<li><a href='<?= PUBLIC_FOLDER?>createPost'>Create Post</a></li>
				<li><a href='<?= PUBLIC_FOLDER?>logout'>Logout</a></li>

				<?php
			}else
			{

				?>
				<li><a href='<?= PUBLIC_FOLDER?>register'>Register</a></li>
				<li><a href='<?= PUBLIC_FOLDER?>login'>Login</a></li>

				<?php

			}
		?>
		
	
</ul>