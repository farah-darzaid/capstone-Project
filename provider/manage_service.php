<?php 
include("../includes/connection.php");
//the action will start if user press button
if(isset($_POST['add_ser'])){
	//fetch data from web form
	$ser_name      = $_POST['ser_name'];
	$ser_desc      = $_POST['ser_desc'];
	$cat_id        = $_POST['cat_id'];
	$ser_image     = $_FILES['ser_image']['name'];
	$tmp_name      = $_FILES['ser_image']['tmp_name'];
	$path          = "upload/"; 
	move_uploaded_file($tmp_name, $path.$ser_image);

	$query = "INSERT INTO service (ser_name,ser_desc,cat_id,ser_image) VALUES('$ser_name','$ser_desc','$cat_id','$ser_image')";
	//perform the query 

	mysqli_query($conn,$query);
	//stop inserting while refresh
	header("Location:manage_service.php");
	exit;
}
include("../includes/admin_header.php");
?>

<!-- BASIC FORM VALIDATION -->
<section id="main-content">
	<section class="wrapper">

		<div class="row mt">
			<div class="col-lg-12">
				<h4><i class="fa fa-angle-right"></i> Create Service</h4>
				<div class="form-panel">
					<form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data">
						<div class="form-group ">
							<label class="col-lg-2 control-label">Service Name</label>
							<div class="col-lg-10">
								<input type="text" placeholder="" id="f-name" class="form-control" name="ser_name">
							</div>
						</div>
						<div class="form-group ">
							<label class="col-lg-2 control-label">Service Description</label>
							<div class="col-lg-10">
								<input type="text" placeholder="" id="desc" class="form-control" name="ser_desc">
							</div>
						</div>
						<div  class="form-group">
									<label class="col-lg-2 control-label">Category Nmae</label>
									<div class="col-md-10">
									<select id="cc-pament" name="cat_id" class="form-control" required>
										<?php
										$query = "SELECT * FROM category";
										$result = mysqli_query($conn,$query);
										while ( $row = mysqli_fetch_assoc($result)){
											echo  "<option value ='{$row['cat_id']}'>{$row['cat_name']}</option>";
											}
										?>
									</select>
								</div>
								</div>
						
						<div class="form-group ">
							<label class="control-label col-md-3">Service Image </label>
							<div class="col-md-9">
								<div class="fileupload fileupload-new" data-provides="fileupload">
									<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
										<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
									</div>
									<div>

										<input type="file" name="ser_image" class="btn btn-theme" />
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-theme" type="submit" name="add_ser">ADD</button>
							</div>
						</div>
					</form>
				</div>
				<!-- /form-panel -->
			</div>
			<!-- /col-lg-12 -->
		</div>

		<div class="row mt">
			<div class="col-lg-12">
				<div class="form-panel">
					<table class="table table-striped table-advance table-hover">
						<h4><i class="fa fa-angle-right"></i> Services Table</h4>
						<hr>
						<thead>
							<tr>
								<th> #</th>
								<th class="hidden-phone"><i class="fa fa-edit"></i> Service Name</th>
								<th><i class="fa fa-envelope"></i>  decription</th>
								<th><i class="fa fa-envelope"></i>  Cat name</th>
								<th><i class="fa fa-envelope"></i>  Cat id</th>
								<th><i class=" fa fa-image"></i> Image</th>
								<th><i class=" fa fa-edit"></i> Edit</th>
								<th><i class="fa fa-user-times"></i> Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php  
							$query = "SELECT * FROM service 
									INNER JOIN category ON
									category.cat_id = service.cat_id";
							$result = mysqli_query($conn,$query);
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>{$row['ser_id']}</td>";
								echo "<td>{$row['ser_name']}</td>";
								echo "<td>{$row['ser_desc']}</td>";
								echo "<td>{$row['cat_name']}</td>";
								echo "<td>{$row['cat_id']}</td>";
								echo "<td><img src = 'upload/{$row['ser_image']}' width='100' height='100'></td>";
								echo "<td><a class='btn btn-primary btn-xs' href='edit_service.php?ser_id={$row["ser_id"]}'><i class='fa fa-pencil'></i></a></td>";
								echo "<td><a class='btn btn-danger btn-xs' href='delete_service.php?ser_id={$row["ser_id"]}'><i class='fa fa-trash-o '></i></a></td>";
								echo "</tr>";
							}

							?>
							</tbody>
							</table>
							</div>
							<!-- /content-panel -->
							</div>
							<!-- /col-md-12 -->
							</div>
							</section>
							</section>

<?php include ('../includes/admin_footer.php'); ?> 