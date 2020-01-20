<?php

//the action will start if user press button
include("../includes/connection.php");
if(isset($_POST['edit'])){
		//fetch data from web form
	$cat_name    = $_POST['cat_name'];
	$cat_desc = $_POST['cat_desc'];
	//get data from file
	$cat_image = $_FILES['cat_image']['name'];
	$tmp_name    = $_FILES['cat_image']['tmp_name'];
	$path        = "upload/";

	move_uploaded_file($tmp_name, $path.$cat_image);

	//check if user change image
	if($_FILES['cat_image']['error'] == 0){
		//return admin records
		$select = "SELECT * FROM category WHERE cat_id= {$_GET['cat_id']}";
		$result = mysqli_query($conn,$select);
		$row    = mysqli_fetch_assoc($result);
		//delete image from upload file
		unlink("upload/".$row['cat_image']);

		//set new image 
		$query = "UPDATE category SET cat_name = '$cat_name',
		cat_desc = '$cat_desc',
		cat_image = '$cat_image'
		where cat_id={$_GET['cat_id']}";
	}
	//if user dosnt change image
	else {
		$query = "UPDATE category SET cat_name = '$cat_name',
		cat_desc = '$cat_desc'
		where cat_id={$_GET['cat_id']}";
	}
		//perform the query 
	mysqli_query($conn,$query);
	header("Location:manage_category.php");

}

include("../includes/admin_header.php");
?>
<section id="main-content">
	<section class="wrapper">
<div class="row mt">
			<div class="col-lg-12">
				<h4><i class="fa fa-angle-right"></i> Edit Category</h4>
				<div class="form-panel">
					<form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data">
						<div class="form-group ">
							<label class="col-lg-2 control-label">Category name</label>
							<div class="col-lg-10">
								<?php 
								$query  = "SELECT * FROM category WHERE cat_id = {$_GET['cat_id']}";
								$result = mysqli_query($conn,$query);
								$row    = mysqli_fetch_assoc($result);
								?>
								<input type="text" placeholder="" id="f-name" class="form-control" name="cat_name" value="<?php echo $row['cat_name'];?>">
							</div>
						</div>
						<div class="form-group ">
							<label class="col-lg-2 control-label">category description</label>
							<div class="col-lg-10">
								<input type="text" placeholder="" id="email2" class="form-control" name="cat_desc" value="<?php echo $row['cat_desc'];?>">
							</div>
						</div>
						<div class="form-group ">
							<label class="control-label col-md-3">Your image</label>

							<?php 
							$imageurl = $row['cat_image'];
						    echo "<img  src= 'upload/$imageurl' alt='your image'  width='100' height='100'/>";
						    ?>
						</div>
						<div class="form-group ">
							<label class="control-label col-md-3">Image Upload</label>
							<div class="col-md-9">
								<div class="fileupload fileupload-new" data-provides="fileupload">

										<input type="file" name="cat_image" class="btn btn-theme"  />
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