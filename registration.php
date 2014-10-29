<?php
$page_title = 'Blog | Registration';
require_once 'header_temp.php'; ?>
	<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Farhad's Blog</h1>
                        <hr class="small">
                        <span class="subheading">Join the blog of THE SECOND MOST INTERESTING MAN IN THE WORLD</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

<div class="container">
	<div id="message-container"></div>
		<form method="post" id="reg_form">
			<label class="post-title" for="userName">Username:</label>
			<p>Minimum of 6 characters and maximum of 20 Alphanumeric only</p>
			<input type="text" name="userName" id="user_Name"/>
			<label for="password">Password:</label>
			<p>Minimum 6 characters maximum 12 characters with at least one capital letter and one number</p>
			<input type="password" name="password" id="pass_word" />
			<label for="email">Email:</label>
			<p>Please enter valid email</p>
			<input type="text" name="email" id="e_mail" />
			<button class="btn btn-default" type="submit">
				Submit
			</button>
		</form>
</div>
<?php
require_once 'footer_temp.php' 
?>

		<script>
			$(function() {
				$('#user_Name').blur(function() {
					var data = {'userName' : $(this).val()}
					var user_field = $(this);
					$.post('ajax/unique_check.php', data,
						function (response) {
							if (response == 1) {
								user_field.removeClass('alert-danger').addClass('alert-success');
							}else {
								user_field.removeClass('alert-success').addClass('alert-danger');
							}
						}
					);
				});
				$('#e_mail').blur(function() {
					var data = {'email': $(this).val()}
					var email_field =$(this);
					$.post('ajax/unique_check.php', data,
						function (response) {
							if (response == 1) {
								email_field.removeClass('alert-danger').addClass('alert-success');
							}else {
								email_field.removeClass('alert-success').addClass('alert-danger');
							}
						}
					);
				});
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
					if (!mailValidate.test(email)) {
						alert('Email provided is not a valid email');
						return false;
					}
					// AJAX call
					var data = {
						'userName' : username,
						'password' : password,
						'email' : email
					}
					$.post('/ajax/registration.php', data, 
					function(response) {
						if (response == 1){
						var div = $('<div>')
						.addClass ('alert alert-success')
						.html ('Account registration successful');
					}else {
						var div = $('<div>')
						.addClass('alert alert-danger')
						.html(response);
					}
						$('#message-container').html(div);					
					}
					
					);
					return false;
				});
			});

		</script>

