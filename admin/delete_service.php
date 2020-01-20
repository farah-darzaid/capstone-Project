<?php 

	include("../includes/connection.php");
	$select = "SELECT * FROM service WHERE ser_id= {$_GET['ser_id']}";
	$result = mysqli_query($conn,$select);
	$row    = mysqli_fetch_assoc($result);
	
  	
    unlink( "upload/".$row['ser_image']);

	
	$query = "DELETE FROM service WHERE ser_id ={$_GET['ser_id']}";
	$result = mysqli_query($conn,$query);

	header("Location:manage_service.php");
