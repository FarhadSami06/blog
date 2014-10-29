<?php
$page_title = 'List Post';
require_once '../backend/sessions.php';
require_once '../backend/post_functions.php';
require_once 'admin_header.php';
$posts = get_post();
?>
<table class="table table-bordered table-hover">
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Author</th>
		<th>Date Posted</th>
		<th>Options</th>
	</tr>
	<?php
	foreach($posts as $post)
	{
		?>
		<tr>
			<td><?php echo $post['post_id']; ?></td>
			<td><a href="post.php?id=<?php echo $post['post_id']; ?>"><?php echo $post['title']; ?></a></td>
			<td><?php echo $post['username']; ?></td>
			<td><?php echo date('m-d-Y h:ia', $post['created_ts']); ?></td>
			<td><span data-id="<?php echo $post['post_id']; ?>" class="glyphicon glyphicon-remove remove-post"></span> | 
			<a href="post.php?id=<?php echo $post['post_id']; ?>"<span class="glyphicon glyphicon-pencil"></span></td>		
		</tr>
	<?php } ?>

</table>
<script>
	$('.remove-post').click(function() {
		var confirm_result = confirm('Are you sure you want to delete this?');
		if (confirm_result) {
			var blah = $(this);
			var data = {
				id : blah.attr('data-id')
			}
			$.post('/ajax/delete_post.php', data, function(response) {
				if (response == 1) {
					blah.parent().parent().animate({
						opacity: 0
					}, 1000, function() {
						blah.parent().parent().remove();
					});
				}
			});
		}
	}); 
</script>
<?php
require_once 'admin_footer.php';
?>
