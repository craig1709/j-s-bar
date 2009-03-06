<h2><?php echo $menu->title; ?></h2>

<p><a class="add" href="/admin/dishes/add/<?php echo $menu->id; ?>"><img src="/assets/icons/add.png" alt=""> Add Dish</a></p>

<?php
	foreach ($sections as $title => $section) {
		echo '<h3>'. ucwords($title) . '</h3>
		<table class="admin">
			<tr>
				<th>Dish</th>
				<th>Description</th>
				<th>Cost</th>
				<th>Actions</th>
			</tr>';
		foreach ($section as $dish) {
			echo '<tr>
			<td>'.$dish->title.'</td>
			<td class="description">';
			echo ($dish->description == NULL) ? 'No description' : $dish->description;
			echo '</td>
			<td>£' . number_format($dish->cost, 2) . '</td>
			<td>
				<a href="/admin/dishes/edit/'.$dish->id.'/" title="Edit"><img src="/assets/icons/pencil.png" alt="Edit"></a>
				<a href="/admin/dishes/delete/'.$dish->id.'/" title="Delete"><img src="/assets/icons/cross.png" alt="Delete"></a>
			</td>
			</tr>';
		}
		echo '</table>';
	}
?>
