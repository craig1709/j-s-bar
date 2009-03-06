<?php

	foreach ($album->images as $image) {
		echo '<div class="album">
			<a href="/images/full/'.$image->id.'/" rel="lightbox[\''.$album->title.'\']" title="'.$image->caption.'">
				<img alt="" src="/images/thumbnail/'.$image->id.'">'
		. $image->caption . '</a>'
		. '</div>';
	}

?>
