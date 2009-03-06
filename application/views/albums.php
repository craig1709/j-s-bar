<h2>Albums</h2>

<p><a class="add" href="/admin/albums/create/"><img src="/assets/icons/add.png" alt=""> Add Album</a></p>

<table class="admin">
<tr>
	<th>Album</th>
	<th>Actions</th>
</tr>
<?php

	foreach ($albums as $album) {
		echo '<tr>
		<td>'.$album->title.'<a class="edit_title" href="/admin/albums/edit/'.$album->id.'/" title="Edit Title"> (Edit Title)</a></td>
		<td>
			<a href="/admin/albums/view/'.$album->id.'/" title="Edit"><img src="/assets/icons/pencil.png" alt="Edit"></a>
			<a href="/admin/albums/delete/'.$album->id.'/" title="Delete"><img src="/assets/icons/cross.png" alt="Delete"></a>
		</td>
		</tr>';
	}

?>
</table>
