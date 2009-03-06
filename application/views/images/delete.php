<h2>Delete Image</h2>

<h3>Are you sure?</h3>

<img src="/images/thumbnail/<?php echo $image->id; ?>">

<form action="<?php echo uri::string(); ?>" method="post">
	<p><input type="submit" name="answer" value="No"> <input type="submit" name="answer" value="Yes"></p>
</form>
