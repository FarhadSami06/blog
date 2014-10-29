<?php
require_once 'backend/user_functions.php';
$login_fail = '';
if (isset($_POST['userName']) AND isset($_POST['password'])) {
	$result = login_user($_POST['userName'], $_POST['password']);
	if (is_array($result)) {
		if (isset($_GET['url'])) {
			header('Location: ' . $_GET['url']);
		} else {
			header('Location: prohome.php');
		}exit ;
	} else {
		$login_fail = '<div class="alert alert-success" role="alert">Invalid username or password</div>';
	}

}
$page_title = 'Sign In';
require_once 'header_temp.php';
?>
<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<div class="site-heading">
					<h1>Farhad's Blog</h1>
					<hr class="small">
					<span class="subheading"><span class="sign_inStyle">Sign in</span> for the blog of THE SECOND MOST INTERESTING MAN IN THE WORLD</span>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="container">

	<?php echo $login_fail; ?>

	<form method="post" id="reg_form">
		<label class="post-title" for="userName">Username:</label>
		<input type="text" name="userName" id="user_Name"/>
		<label for="password">Password:</label>
		<input type="password" name="password" id="pass_word" />
		<button class="btn btn-default" type="submit">
			Enter
		</button>
	</form>
</div>

<script>
	$(function() {
		// Handle the submit event by validating our fields first
		$('#reg_form').submit(function() {
			var nameValidate = /^[A-Za-z0-9]{6,20}$/;
			var mailValidate = /^[A-Za-z0-9_\.]+@[A-Za-z0-9]+\.[a-z]{2,4}$/;
			var passValidate = /^[A-Za-z0-9]{6,12}$/;
			var caps = /[A-Z]+/;
			var nums = /[0-9]+/;
			var username = $('#user_Name').val();
			var email = $('#e_mail').val();
			var password = $('#pass_word').val();

			if (!nameValidate.test(username)) {
				alert('Username is invalid. Username must contain a minimum of 6 characters');
				return false;
			}
			if (!caps.test(password)) {
				alert('Password must contain one capitalized letter.');
				return false;
			}
			if (!nums.test(password)) {
				alert('Password must contain one number');
			}
			if (!passValidate.test(password)) {
				alert('Password must contain a minimum of 6 characters and a maximum of 12 characters');
				return false;
			}
		});
	});

</script>
<?php
require_once 'footer_temp.php'
?>
