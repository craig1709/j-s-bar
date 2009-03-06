<h2>Edit Dish</h2>

<p><a class="add" href="/admin/menus/view/<?php echo $menu_id; ?>/"><img src="/assets/icons/arrow_left.png" alt=""> Back to Menu</a></p>

<form action="/<?php echo uri::string(); ?>/" method="post">

	<p><label for="title">Title</label><input type="text" name="title" id="title" value="<?php echo $dish['title']; ?>"></p>
	<p><label for="description">Description</label><input type="text" name="description" id="description" value="<?php echo $dish['description']; ?>"></p>
	<p>
		<label for="type">Type</label>
		<select name="type" id="type">
			<option value="0" <?php echo ($dish['type'] == 0) ? ' selected="selected"' : ''; ?>>Starter</option>
			<option value="1" <?php echo ($dish['type'] == 1) ? ' selected="selected"' : ''; ?>>Main</option>
			<option value="2" <?php echo ($dish['type'] == 2) ? ' selected="selected"' : ''; ?>>Dessert</option>
		</select>
	</p>
	<p><label for="cost">Cost</label><input type="text" name="cost" id="cost" value="<?php echo number_format($dish['cost'], 2); ?>"></p>
	<p><label>&nbsp;</label><input type="submit" value="Save"></p>

</form>
