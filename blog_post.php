<?php 
$page_title = 'Blog | Post';
require_once 'proheader_temp.php';
require_once 'backend/sessions.php';
require_once 'backend/post_functions.php';
$posts = get_post($_GET['id']);
$post = $posts[0];
$comments = get_post_comments($post['post_id']);
?>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/headers/<?php echo $posts['0']['picture']; ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>Post Title</h1>
                        <span class="meta">Posted by <a href="#">Username</a> on timestamp</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
               <?php 	
                	foreach($posts as $post){
                		?>
                		<div class="post-container">
                			<h2><?php echo $post['title'];?></h2>
                			<h3><?php echo $post['body'];?></h3>
                			<hr>
                		</div>
                		
                	<?php	 }  ?>
            </div>
        </div>
    </article>

    <hr>
    <div id="comment-container">
    	<ul id="comments-list">
    		<?php
    		foreach($comments as $comment)
			{
				?>
				<li><p><?php echo $comment['body'];?></p>
				<em>By <?php echo $comment['username'];?> </em></li>
		<?php	} ?>
			
    	</ul>
    </div>
    <form id="comment-form">
    		<label for="comment">Comment</label>
    		<textarea rows="5" id="comment" name="comment" class="form-control" placeholder="Comment..."></textarea>
    		<button class="btn btn-default" type="submit">Submit</button>
    </form>
    <script>
    	var post_id = <?php echo $_GET['id']; ?>;
    	var user_id = <?php echo $_SESSION['user']['user_id']; ?>;
    	var comment;
    	$(function() {
    		$('#comment-form').submit(function(){
    			// Populate the comment variable
    			comment = $('#comment').val();
    			
    			//run  the AJAX call 
    			var data = {
    				'post_id': post_id,
    				'user_id': user_id,
    				'comment': comment
    			}
    			$.post('/ajax/add_comment.php', data, 
    				function(response) 
    			{
    				var li = $('<li>').html(response);
    				$('#comments-list').append(li);
    			});
    		
    			return false;
    		});
    	});
    </script>

   <?php require_once 'footer_temp.php'; ?>
