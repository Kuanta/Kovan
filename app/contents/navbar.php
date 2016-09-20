<ul id='navbar'>
	<li><a href='/Kuantaria/public/home'>Home</a></li>
	
		

		<?php
			if(isset($_SESSION['user']) && $_SESSION['user']!=null){
				?>

				<li><a href='/Kuantaria/public/logout'>Logout</a></li>

				<?php
			}else
			{

				?>
				<li><a href='/Kuantaria/public/register'>Register</a></li>
		<li><a href='/Kuantaria/public/login'>Login</a></li>

				<?php

			}
		?>
		
	
</ul>