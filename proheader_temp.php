<?php require_once 'backend/sessions.php';?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $page_title; ?></title>
		
		<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/clean-blog.min.css" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    	<link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		<script src="js/bootstrap.min.js"></script>
	    <script src="js/clean-blog.js"></script>
	    <link href="css/main.css" rel="stylesheet">
		
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
                        <a href="prohome.php">Home</a>
                    </li>
                    <li>
                        <a href="blog_post.php">Entries</a>
                    </li>
                    <li>
                        <a href="prohome.php">
                        	
                        	<?php 
                        	
                        	if(isset($_SESSION['user'])) {
                        		echo $_SESSION['user']['username'];
                        		}else {
                        			echo 'Sign in';
								}
                        			?></a>
                    </li>
                    <li>
                        <a href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
            
        </div>
       
    </nav>