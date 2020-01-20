<?php
//the action will start if user press button
include("../includes/connection.php");
if(isset($_POST['edit'])){

		//fetch data from web form
	$fullname     = $_POST['fullname'];
	$email 		  = $_POST['email'];
	$password     = $_POST['password'];
	$phone        = $_POST['phone'];
	$ser_id       = $_POST['ser_id'];
	//get data from file
	$provider_image  = $_FILES['provider_image']['name'];
	$tmp_name        = $_FILES['provider_image']['tmp_name'];
	$path            = "upload/";

	move_uploaded_file($tmp_name, $path.$provider_image);

	//check if user change image
	if($_FILES['provider_image']['error'] == 0){

		//return admin records
		$select = "SELECT * FROM provider WHERE provider_id= {$_GET['provider_id']}";
		$result = mysqli_query($conn,$select);
		$row    = mysqli_fetch_assoc($result);
		//delete image from upload file
		unlink("upload/".$row['provider_image']);

		//set new image 
		$query = "UPDATE provider SET provider_name = '$fullname',
		phone = '$phone',
		ser_id = '$ser_id',
		provider_email = '$email',
		provider_password = '$password',
		provider_image = '$provider_image'
		where provider_id={$_GET['provider_id']}";

	}
	//if user dosnt change image
	else {
		$query = "UPDATE provider SET provider_name = '$fullname',
		phone = '$phone',
		ser_id = '$ser_id',
		provider_email = '$email',
		provider_password = '$password'
		where provider_id={$_GET['provider_id']}";


	}
		//perform the query 
	mysqli_query($conn,$query);
	header("Location:manage_provider.php");

}

include("../includes/admin_header.php");
?>

<!-- BASIC FORM VALIDATION -->
<section id="main-content">
	<section class="wrapper">

		<div class="row mt">
			<div class="col-lg-12">
				<h4><i class="fa fa-angle-right"></i> Create Provider</h4>
				<div class="form-panel">
					<form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data">
						<?php 
						//Fetch old data
						$query  = "SELECT * FROM provider WHERE provider_id = {$_GET['provider_id']}";
						$result = mysqli_query($conn,$query);
						$row1    = mysqli_fetch_assoc($result);
						?>
						<div class="form-group ">
							<label class="col-lg-2 control-label">Name</label>
							<div class="col-lg-10">
								<input type="text" placeholder="" id="f-name" class="form-control" name="fullname" value="<?php echo $row1['provider_name'];?>">
							</div>
						</div>
						<div class="form-group ">
							<label class="col-lg-2 control-label">Email</label>
							<div class="col-lg-10">
								<input type="email" placeholder="" id="email2" class="form-control" name="email" value="<?php echo $row1['provider_email']; ?>">
							</div>
						</div>
						<div class="form-group ">
							<label class="col-lg-2 control-label">Password</label>
							<div class="col-lg-10">
								<input type="password" placeholder="" id="password" class="form-control" name="password" value="<?php echo $row1['provider_password']; ?>">
							</div>
						</div>
						<div class="form-group ">
							<label class="col-lg-2 control-label">Phone</label>
							<div class="col-lg-10">
								<input type="phone" placeholder="" class="form-control" name="phone" value="<?php echo $row1['phone'];?>">
							</div>
						</div>
						
						<div  class="form-group">
							<label class="col-lg-2 control-label">Service Nmae</label>
							<div class="col-md-10">

								<select id="ser_id" name="ser_id" class="form-control" required>
									<option disabled selected >Select service</option>";
									<?php $q = "SELECT * FROM service";
									$result = mysqli_query($conn,$q);
									while ($row =mysqli_fetch_assoc($result)) {
										echo"<option value={$row['ser_id']}>{$row['ser_name']} </option>";
									}  ?>

								</select>
							</div>
						</div>
						<div class="form-group ">
							<label class="control-label col-md-3">Your image</label>
							<?php 
							$imageurl = $row1['provider_image'];
							echo "<img  src= 'upload/$imageurl' alt='your image'  width='100' height='100'/>";
							?>
						</div>
						<div class="form-group ">
							<label class="control-label col-md-3">Image Upload</label>
							<div class="col-md-9">
								<div class="fileupload fileupload-new" data-provides="fileupload">
									<input type="file" name="provider_image" class="btn btn-theme" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-theme" type="submit" name="edit">Save</button>
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