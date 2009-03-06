<h2>Delete <?php echo $album->title; ?></h2>

<h3>Are you sure?</h3>

<form action="<?php echo uri::string(); ?>" method="post">
	<p><input type="submit" name="answer" value="No"> <input type="submit" name="answer" value="Yes"></p>
</form>
