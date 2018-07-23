<?php
	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$dataBaseName = "final_project_db";
	$conn = new mysqli($serverName, $userName, $password, $dataBaseName);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
?>