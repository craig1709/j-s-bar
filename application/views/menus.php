<h2>Menus</h2>

<p><a class="add" href="/admin/menus/create/"><img src="/assets/icons/add.png" alt=""> Add Menu</a></p>

<table class="admin">
<tr>
	<th>Menu</th>
	<th>Actions</th>
</tr>
<?php

	foreach ($menus as $menu) {
		echo '<tr>
		<td>'.$menu->title.'</td>
		<td>
			<a href="/admin/menus/edit/'.$menu->id.'/" title="Edit"><img src="/assets/icons/pencil.png" alt="Edit"></a>
			<a href="/admin/menus/delete/'.$menu->id.'/" title="Delete"><img src="/assets/icons/cross.png" alt="Delete"></a>
		</td>
		</tr>';
	}

?>
</table>
