<?php
	session_start();
	if(session_destroy())
	{
		header("Location: ../web_view/index.php");
	}
?>