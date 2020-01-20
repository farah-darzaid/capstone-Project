<?php 
	session_start();
	$provider_id = $_GET['provider_id'];
	if (!isset($_SESSION['customer_id']) ){
	header("Location:customer_login.php");

}

if (isset($_SESSION['customer_id']) ){
	header("Location:request.php");
}
 
 ?>