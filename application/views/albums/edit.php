<h2>Edit Album</h2>

<form action="<?php echo uri::string(); ?>" method="post">

	<p><label for="title">Title</label><input type="text" name="title" id="title" value="<?php echo $album['title']; ?>"></p>
	<p><label>&nbsp;</label><input type="submit" value="Save"></p>

</form>
