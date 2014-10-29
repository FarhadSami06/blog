<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $page_title; ?></title>

    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <link href="css/sb-admin.css" rel="stylesheet">

    
    <link href="css/plugins/morris.css" rel="stylesheet">

    <link href="css/main.css" rel="stylesheet">
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php 
                        	
                        	if(isset($_SESSION['user'])) {
                        		echo $_SESSION['user']['username'];
                        		}else {
                        			echo 'Sign in';
								}
                        			?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                          <li>
                          	<a href="../prohome.php"><i class="fa fa-fw fa-arrow-left"></i>Back to Blog</a>
                          </li>
                          <li> 
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            
            
           
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
           <?php 
            $admin_nav = array (
							array(
								'url' => 'index.php',
								'class' => 'fa fa-fw fa-dashboard',
								'name' => 'Dashboard'
								),
							array(
								'url' => 'create_post.php',
								'class' => 'fa fa-fw fa-pencil',
								'name' => 'Create Post'
								),
							array(
								'url' => 'list_post.php',
								'class' => 'fa fa-fw fa-table',
								'name' => 'List Posts'
								),
							array(
								'url' => 'admin_user.php',
								'class' => 'fa fa-fw fa-user',
								'name' => 'Users'
								)
							);
							
			foreach($admin_nav as $nav) {
				$liClass = '';
				if(strpos($_SERVER['REQUEST_URI'], '/admin/'.$nav['url'])  !== FALSE){
					$liClass = 'active';
				}
				
				
				?>
				<li class="<?php echo $liClass; ?>">
                        <a href="<?php echo $nav['url']; ?>"><i class="<?php echo $nav['class']; ?>"></i><?php echo $nav['name']; ?></a>
                    </li>
				<?php
			}			
			

							
           ?> 
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $page_title; ?></h1>
                        <ol class="breadcrumb">
                        	<?php 
            $bc_navigation = array (
							array(
								'url' => 'index.php',
								'class' => 'fa fa-fw fa-dashboard',
								'name' => 'Dashboard'
								),
							array(
								'url' => 'create_post.php',
								'class' => 'fa fa-fw fa-pencil',
								'name' => 'Create Post'
								),
							array(
								'url' => 'list_post.php',
								'class' => 'fa fa-fw fa-table',
								'name' => 'List Posts'
								),
							array(
								'url' => 'admin_user.php',
								'class' => 'fa fa-fw fa-user',
								'name' => 'Users'
								)
							);
							
			foreach($bc_navigation as $bc_nav) {
				$li_class = '';
				if(strpos($_SERVER['REQUEST_URI'], '/admin/'.$bc_nav['url'])  !== FALSE){
					$li_class = 'active';
				}
				
				
				?>
				<li class="<?php echo $li_class; ?>">
                        <i class="<?php echo $bc_nav['class']; ?>"></i><?php echo $bc_nav['name']; ?>
                    </li>
				<?php
			}			
			

							
           ?> 
                        	
                            <li>
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>