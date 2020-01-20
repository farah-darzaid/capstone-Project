<?php
	session_start();
	unset($_SESSION['provider_id']); 
	header("Location:provider_login.php");
?>