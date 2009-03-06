<h2>Edit Page</h2>


<form action="<?php echo uri::string(); ?>" method="post">

	<p><label for="title">Title</label><input type="text" name="title" id="title" value="<?php echo $page['title']; ?>"></p>
	<p><label for="html">Content</label><textarea name="content" id="html" rows="10" cols="40"><?php echo htmlspecialchars($page['content']); ?></textarea></p>
	<p>
		<label for="page_menu">Menu</label>
		<select name="menu" id="page_menu">
			<option value="">None</option>
			<?php
				foreach ($menus as $menu) {
					$selected = ($menu->id == $page['menu']) ? ' selected="selected"' : '';
					echo "<option $selected value=\"{$menu->id}\">{$menu->title}</option>";
				}
			?>
		</select>
	</p>
	<p><label>&nbsp;</label><input type="submit" value="Save"></p>

</form>
