<p>This is the requested post:</p>


<form action="insert.php" method="post" accept-charset="utf-8">
	<p><input type="text" name="id" value="<?php echo $post->id ?>" readonly></p>
	<p><input type="text" name="author" value="<?php echo $post->author ?>" ></p>
	<p><input type="text" name="content" value="<?php echo $post->content ?>" ></p>
	<p><input type="text" name="idmultiplied" value="<?php echo $post->id_multiplied ?>" readonly></p>
	<input type="submit" name="submit-button" value="Save changes">
	<a href="/?controller=posts&action=show&id=<?php echo $post->id ?>" >Cancel</a>
	
</form>
