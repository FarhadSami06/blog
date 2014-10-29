<?php
$response = '';

if (isset($_POST['userName']) AND isset($_POST['password']) AND isset($_POST['email'])) {
	include '../backend/user_functions.php';	
	$result = add_user ($_POST['email'], $_POST['userName'], $_POST['password']);
	$response = $result;
}
else
{
	$response = 'Required fields are missing';
}
	echo $response;
