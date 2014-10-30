<?php
$page_title = 'Users';
require_once '../backend/sessions.php';
require_once '../backend/user_functions.php';
require_once 'admin_header.php';
$users = get_user();
?>
<table class="table table-bordered table-hover">
	<tr>
		<th>ID</th>
		<th>User</th>
		<th>Email</th>
		<th>Options</th>
	</tr>
	<?php
	foreach($users as $user)
	{
		?>
		<tr>
			<td><?php echo $user['user_id']; ?></td>
			<td><a href="users.php?id=<?php echo $user['user_id']; ?>"><?php echo $user['username']; ?></a></td>
			<td><?php echo $user['email']; ?></td>
			<td><span data-id="<?php echo $user['user_id']; ?>" class="glyphicon glyphicon-remove remove-user"></span></td>
		</tr>
	<?php } ?>

</table>
<script>
	$('.remove-user').click(function() {
		var confirm_result = confirm('Are you sure you want to delete this user?');
		if (confirm_result) {
			var rem_user = $(this);
			var data = {
				id : rem_user.attr('data-id')
			}
			$.post('/ajax/delete_user.php', data, function(response) {
				if (response == 1) {
					rem_user.parent().parent().animate({
						opacity : 0
					}, 1000, function() {
						rem_user.parent().parent().remove();
					});
				}
			});
		}
	}); 
</script>
<?php
require_once 'admin_footer.php';
?>
