<div class='pagination'>
<?php
if(isset($data['hrefs'])){

	foreach($data['hrefs'] as $link){
		?>
		<a href='<?= $link["href"]?>'> <?= $link['value']?> </8a>
		<?php
	}
}
?>
</div>