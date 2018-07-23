<?php
	include('dbconnection.php');
	
	session_start();

	$user_check=$_SESSION['login_user'];

	$ses_sql="SELECT user_name FROM user WHERE user_name='$user_check'";
	$result = $conn->query($ses_sql);
	$row = $result->fetch_assoc();
	$login_session = $row['user_name'];

	if(!isset($login_session)){
		$conn->close(); 
		header('Location: ../web_view/index.php'); 
	}
?>