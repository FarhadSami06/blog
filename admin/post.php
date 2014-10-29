<?php
$page_title = 'Edit Post';
require_once '../backend/sessions.php';
require_once '../backend/post_functions.php';
require_once 'admin_header.php';
$post_id = $_GET['id'];
if (isset($_POST['form_title']) AND isset($_POST['form_body'])) {
			$picture = "";
			// Check that $_FILES['photo'] is set adn there are no errors
			if(isset($_FILES['picture']) AND $FILES['picture']['error'] == 0)
			{
				//move the temporary file to the final location
				move_uploaded_file(
					$_FILES['picture']['tmp_name'],
					$_SERVER['DOCUMENT_ROOT'].'/img/headers/'.$_FILES['picture']['name']
				);
				
				//Assign the filename to #picture
				$picture = $_FILES['picture']['name'];
				
			}
				
			$result = update_post($post_id, $_POST['form_title'], $_POST['form_body'], $_SESSION['user']['user_id'], $picture);
			if (is_array($result)) {
				echo "Your post has been updated";
			}
		}

$posts = get_post($_GET['id']);

$post = $posts[0];

include 'inc/post_form.php';
?>

<?php 
require_once 'admin_footer.php';
?>
