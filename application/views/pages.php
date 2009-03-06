<h2>Pages</h2>

<table class="admin">
<tr>
	<th>Page</th>
	<th>Actions</th>
</tr>
<?php

	foreach ($pages as $page) {
		echo '<tr>
		<td>'.$page->title.'</td>
		<td>
			<a href="/admin/pages/edit/'.$page->id.'/" title="Edit"><img src="/assets/icons/pencil.png" alt="Edit"></a>
		</td>
		</tr>';
	}

?>
</table>
