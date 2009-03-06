<h2>Edit Menu</h2>

<form enctype="multipart/form-data" action="/<?php echo uri::string(); ?>" method="post">

	<p><label for="title">Title</label><input type="text" name="title" id="title" value="<?php echo $menu['title']; ?>"></p>
	<p><label for="pdf">PDF</label><input type="file" name="pdf" id="pdf"> <span class="warning">This file MUST be a PDF.</span></p>
	<p><label>&nbsp;</label><input type="submit" value="Save"></p>

</form>
