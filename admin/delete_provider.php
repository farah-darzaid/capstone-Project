<?php 

	include("../includes/connection.php");
	$select = "SELECT * FROM provider WHERE provider_id= {$_GET['provider_id']}";
	$result = mysqli_query($conn,$select);
	$row    = mysqli_fetch_assoc($result);
	
  	
    unlink( "upload/".$row['provider_image']);

	
	$query = "DELETE FROM provider WHERE provider_id ={$_GET['provider_id']}";
	$result = mysqli_query($conn,$query);

	header("Location:manage_provider.php");
