<?php

//the action will start if user press button
include("../includes/connection.php");
if(isset($_POST['edit'])){
		//fetch data from web form
	$email    = $_POST['email'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];
	//get data from file
	$admin_image = $_FILES['admin_image']['name'];
	$tmp_name    = $_FILES['admin_image']['tmp_name'];
	$path        = "upload/";

	move_uploaded_file($tmp_name, $path.$admin_image);

	//check if user change image
	if($_FILES['admin_image']['error'] == 0){
		//return admin records
		$select = "SELECT * FROM admin WHERE admin_id= {$_GET['admin_id']}";
		$result = mysqli_query($conn,$select);
		$row    = mysqli_fetch_assoc($result);
		//delete image from upload file
		unlink("upload/".$row['admin_image']);

		//set new image 
		$query = "UPDATE admin SET admin_email = '$email',
		admin_password = '$password',
		fullname = '$fullname',
		admin_image = '$admin_image'
		where admin_id={$_GET['admin_id']}";
	}
	//if user dosnt change image
	else {
		$query = "UPDATE admin SET admin_email = '$email',
		admin_password = '$password',
		fullname = '$fullname'
		where admin_id={$_GET['admin_id']}";
	}
		//perform the query 
	mysqli_query($conn,$query);
	header("Location:manage_admin.php");

}
//Fetch old data
$query  = "SELECT * FROM admin WHERE admin_id = {$_GET['admin_id']}";
$result = mysqli_query($conn,$query);
$row    = mysqli_fetch_assoc($result);

include("../includes/admin_header.php");
?>
<section id="main-content">
	<section class="wrapper">
<div class="row mt">
			<div class="col-lg-12">
				<h4><i class="fa fa-angle-right"></i> Edit Admin</h4>
				<div class="form-panel">
					<form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data">
						<div class="form-group ">
							<label class="col-lg-2 control-label">Name</label>
							<div class="col-lg-10">
								<input type="text" placeholder="" id="f-name" class="form-control" name="fullname" value="<?php echo $row['fullname'];?>">
							</div>
						</div>
						<div class="form-group ">
							<label class="col-lg-2 control-label">Email</label>
							<div class="col-lg-10">
								<input type="email" placeholder="" id="email2" class="form-control" name="email" value="<?php echo $row['admin_email'];?>">
							</div>
						</div>
						<div class="form-group ">
							<label class="col-lg-2 control-label">Password</label>
							<div class="col-lg-10">
								<input type="password" placeholder="" id="l-name" class="form-control" name="password" value="<?php echo $row['admin_password'];?>">
							</div>
						</div>
						<div class="form-group ">
							<label class="control-label col-md-3">Your image</label>

							<?php 
							$imageurl = $row['admin_image'];
						    echo "<img  src= 'upload/$imageurl' alt='your image'  width='100' height='100'/>";
						    ?>
						</div>
						<div class="form-group ">
							<label class="control-label col-md-3">Image Upload</label>
							<div class="col-md-9">
								<div class="fileupload fileupload-new" data-provides="fileupload">
										<input type="file" name="admin_image" class="btn btn-theme"  />
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