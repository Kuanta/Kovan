<div class='pagination'>
<?php

	foreach($data['hrefs'] as $link){
		?>
		<a href='<?= $link["href"]?>'> <?= $link['value']?> </8a>
		<?php
	}

?>
</div>