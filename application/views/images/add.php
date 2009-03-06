<h2>Edit Image</h2>

<p><a class="add" href="/admin/albums/view/<?php echo $album_id; ?>/"><img src="/assets/icons/arrow_left.png" alt=""> Back to Album</a></p>

<form enctype="multipart/form-data" action="/<?php echo uri::string(); ?>/" method="post">
	
	<?php echo ($image['id'] !== 0) ? '<img src="/images/thumbnail/'.$image['id'].'">' : ''; ?>
	<p><label for="image">Image</label><input type="file" id="image" name="image"></p>
	<p><label for="caption">Caption</label><input type="text" name="caption" id="caption" value="<?php echo $image['caption']; ?>"></p>
	<p><label>&nbsp;</label><input type="submit" value="Save"></p>

</form>
