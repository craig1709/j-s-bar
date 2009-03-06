<?php

	foreach ($albums as $album) {
		echo '<div class="album">
			<a href="/gallery/album/'.$album->id.'/"><img src="/images/thumbnail/'.$album->images[0].'">'
		. $album->title . '</a>'
		. '</div>';
	}

?>
