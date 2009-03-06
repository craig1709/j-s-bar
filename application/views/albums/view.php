<h2><?php echo $album->title; ?></h2>

<p><a class="add" href="/admin/images/add/<?php echo $album->id; ?>"><img src="/assets/icons/add.png" alt=""> Add Image</a></p>

<p>Images cannot be overwritten. To change an image, delete it and upload a new one.</p>

<table class="admin album">
	<tr>
		<th>Image</th>
		<th>Caption</th>
		<th>Actions</th>
	</tr>
	<?php
	
		foreach ($images as $image) {
			echo '<tr>'
			. '<td><img src="/images/thumbnail/'.$image->id.'"></td>'
			. '<td class="description">';
				echo ($image->caption == NULL) ? 'No caption' : $image->caption;
			echo '</td>'
			. '<td>
				<a href="/admin/images/edit/'.$image->id.'/" title="Edit"><img src="/assets/icons/pencil.png" alt="Edit"></a>
				<a href="/admin/images/delete/'.$image->id.'/" title="Delete"><img src="/assets/icons/cross.png" alt="Delete"></a>
			</td>'
			. '</tr>';
		}
	
	?>
</table>
