<ul class='errors_list'>
<?php
	foreach($data['errors'] as $error){
		?>
			<li><?= $error ?></li>
		<?php
	}
?>
</ul>