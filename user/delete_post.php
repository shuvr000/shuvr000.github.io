<?php

	include 'session.php';

	$get_id = $_GET['id'];

	$sql_del = "DELETE from post_info WHERE id='$get_id'";
	$result = $conn -> query($sql_del);


?>