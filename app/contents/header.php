<html>
<head>
	<meta charset='utf-8'>
	<title><?= $data['title'] ?></title>
	<link rel='stylesheet' href='<?= PUBLIC_FOLDER?>/css/main.css'>
	<script src='<?= PUBLIC_FOLDER?>/scripts/main.js' type='text/javascript'></script>
</head>
<body>
	<ul id='navbar'>
	<li><a href='<?= PUBLIC_FOLDER?>home'>Home</a></li>
	<li><a href='<?=PUBLIC_FOLDER?>display'>Posts</a></li>
		

		<?php
			if(isset($_SESSION['user']) && $_SESSION['user']!=null){
				?>
				<li><a href='<?=PUBLIC_FOLDER?>profile/index/<?= $_SESSION['user']['id']?>'>
					<?=$_SESSION['user']['username']?></a></li>
				<li><a href='<?= PUBLIC_FOLDER?>feed'>Feed</a></li>
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
	<div id='searchBar'>
		<form method='post' action='' id='searchForm'>
			<input type='text' name='keyword' id='keyword'>
			<input type='radio' name='searchBy' value='username'>Username
			<input type='radio' name='searchBy' value='title'>Title
			<input type='submit' value='Search' id='searchButton'>
		</form>
	</div>