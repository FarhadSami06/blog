<!DOCTYPE html>
<html>
	<head>
		<title>Blog | Sign In</title>
		
		<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/clean-blog.min.css" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    	<link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		<script src="js/bootstrap.min.js"></script>
	    <script src="js/clean-blog.js"></script>
	    
		<style>
			form {
				height: 465px;
				width: 300px;
				margin: 0 auto;
				text-align: center;
				background-color: #f4f4f4;
				padding-top: 25px;
			}
			form label {
				margin: 0 auto;
				
			}
			form input {
				box-shadow: 1px 1px 5px;
				margin: 10px;
			}
			
			form button {
				margin-top: 30px;
				box-shadow: 1px 1px 5px;
				
			}
			form p {
				font-size: 10px;
				margin: 0 35px;
				color: #8e8e8e;
				font-weight: 800;
			}
			.alert, alert-success {
				text-align: center;
				background-color: #0085a1;
				border: none;
				color: #ffffff;
				font-weight: 800;
				margin: 20px auto;
				
				
				
			}
			.sign_inStyle {
				font-size: 35px;
				font-weight:bold;
				text-transform: uppercase;
				
				
			}


		</style>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
      
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>

           
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="post.html">Sign In</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            
        </div>
       
    </nav>
		
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
			
		<div class="alert alert-success" role="alert">
		
		
		<?php
		require_once 'backend/user_functions.php';

		if (isset($_POST['userName']) AND isset($_POST['password'])) {
			$result = login_user($_POST['userName'], $_POST['password']);
			if (is_array($result)) {
				echo 'Hi, '.$result['username'].'. You are signed in';
				
			}else {
				echo 'Invalid username or password';
			}
			
		}
		?>
		</div>
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


<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Farhad's Blog 2014</p>
                </div>
            </div>
        </div>
    </footer>

  
    

  
   

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
</body>

</html>
	</body>
</html>