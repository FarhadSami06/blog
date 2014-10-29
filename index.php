<?php 
$page_title = 'Home';
require_once 'header_temp.php';
require_once 'backend/post_functions.php';
$posts = get_post();
?>
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Home Page</h1>
                        <hr class="small">
                        <span class="subheading">Protected Home Page</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
				<div class="post-container">
        	<?php 
        	foreach($posts as $post)
			{?>
					<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<h2><a href="/blog_post.php?id=<?php echo $post['post_id'];?>"><?php echo $post['title'];?></a></h2>
					<h3>By <?php echo $post['username'];?> on <?php echo date('F d, Y h:iA', $post ['created_ts']);?></h3>
					<hr>
				</div>
				
			<?php } ?>
        	
        	
           
				</div>
				
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
           </div>
            </div>
        </div>
    

    <hr>
<?php 
require_once 'footer_temp.php';
?>
