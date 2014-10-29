<?php
$result = false;
if (isset($_POST['userName']) OR isset($_POST['email'])) 
{
	include '../backend/user_functions.php';
	
	if(isset($_POST['userName']) AND !empty($_POST['userName']))
	{
		$result = unique_check('username', $_POST['userName']);
	}
	elseif(isset($_POST['email']) AND !empty($_POST['email']))
	{
		$result = unique_check('email', $_POST['email']);
	}	
}	

echo (int)$result;