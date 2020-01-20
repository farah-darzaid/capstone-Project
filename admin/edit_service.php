<?php

//the action will start if user press button
include("../includes/connection.php");
if(isset($_POST['edit'])){
		//fetch data from web form
	$ser_name    = $_POST['ser_name'];
	$ser_desc = $_POST['ser_desc'];
	//get data from file
	$ser_image = $_FILES['ser_image']['name'];
	$tmp_name    = $_FILES['ser_image']['tmp_name'];
	$path        = "upload/";

	move_uploaded_file($tmp_name, $path.$ser_image);

	//check if user change image
	if($_FILES['ser_image']['error'] == 0){
		//return admin records
		$select = "SELECT * FROM service WHERE ser_id= {$_GET['ser_id']}";
		$result = mysqli_query($conn,$select);
		$row    = mysqli_fetch_assoc($result);
		//delete image from upload file
		unlink("upload/".$row['ser_image']);

		//set new image 
		$query = "UPDATE service SET ser_name = '$ser_name',
		ser_desc = '$ser_desc',
		ser_image = '$ser_image'
		where ser_id={$_GET['ser_id']}";
	}
	//if user dosnt change image
	else {
		$query = "UPDATE service SET ser_name = '$ser_name',
		ser_desc = '$ser_desc'
		where ser_id={$_GET['ser_id']}";
	}
		//perform the query 
	mysqli_query($conn,$query);
	header("Location:manage_service.php");

}

include("../includes/admin_header.php");
?>
<!-- BASIC FORM VALIDATION -->
<section id="main-content">
	<section class="wrapper">

		<div class="row mt">
			<div class="col-lg-12">
				<h4><i class="fa fa-angle-right"></i> Create service</h4>
				<div class="form-panel">
					<form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data">
						<?php
						 //Fetch old data
						$query  = "SELECT * FROM service WHERE ser_id = {$_GET['ser_id']}";
						$result = mysqli_query($conn,$query);
						$row    = mysqli_fetch_assoc($result);
						 ?>
						<div class="form-group ">
							<label class="col-lg-2 control-label">Service Name</label>
							<div class="col-lg-10">
								<input type="text" placeholder="" id="f-name" class="form-control" name="ser_name" value="<?php echo $row['ser_name'] ?>">
							</div>
						</div>
						<div class="form-group ">
							<label class="col-lg-2 control-label">Service Description</label>
							<div class="col-lg-10">
								<input type="text" placeholder="" id="desc" class="form-control" name="ser_desc" value="<?php echo $row['ser_desc'] ?>">
							</div>
						</div>
						<div class="form-group ">
							<label class="control-label col-md-3">Your image</label>
							<?php 
							$imageurl = $row['ser_image'];
							echo "<img  src= 'upload/$imageurl' alt='your image'  width='100' height='100'/>";
							?>
						</div>
						<div class="form-group ">
							<label class="control-label col-md-3">Service Image </label>
							<div class="col-md-9">
										<input type="file" name="ser_image" class="btn btn-theme" />
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-theme" type="submit" name="edit">save</button>
							</div>
						</div>
					</form>
				</div>
				<!-- /form-panel -->
			</div>
			<!-- /col-lg-12 -->
		</div>
	</section>
</section>