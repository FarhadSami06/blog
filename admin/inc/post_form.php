<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="form_title">Title</label>
		<input class="form-control" type="text" name="form_title" id="formTitle" value="<?php echo $post['title']; ?>"/>
		</br>
	</div>
	<div class="form-group">
		<label for="form_body">Main Content</label>
		<textarea class="form-control" name="form_body" id="formBody" rows='10'><?php echo $post['body']; ?></textarea>
	</div>
	<div class="form-group">
		<input type="hidden" name="original_picture" value="<?php echo $post['picture']; ?>" />
		<?php	if(!empty($post['picture']))
		{
		?>
		<a href="/img/headers/<?php echo $post['picture']; ?>" target="_new">Current Image</a>
		<br/>

		<?php } ?>

		<label for="picture">Include Images</label>
		<input id="photo" name="picture" type="file">
	</div>

	<button type="submit" class="btn btn-default">
		Submit
	</button>

</form>
