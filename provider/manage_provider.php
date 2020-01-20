<?php 
include('../includes/connection.php');
if (isset($_POST['add_provider'])){
	$fullname     = $_POST['fullname'];
	$phone        = $_POST['phone'];
	$ser_id        = $_POST['ser_id'];
	//get data from file
	$provider_image  = $_FILES['provider_image']['name'];
	$tmp_name     = $_FILES['provider_image']['tmp_name'];
	$path         = "upload/";

	move_uploaded_file($tmp_name, $path.$provider_image);

	$query = "INSERT INTO provider(provider_name,phone,ser_id,provider_image) VALUES('$fullname','$phone','$ser_id','$provider_image')";
		//perform the query 
	mysqli_query($conn,$query);
	header("location: manage_provider.php");
	exit;
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
						<div class="form-group ">
							<label class="col-lg-2 control-label">Name</label>
							<div class="col-lg-10">
								<input type="text" placeholder="" id="f-name" class="form-control" name="fullname">
							</div>
						</div>
						<div class="form-group ">
							<label class="col-lg-2 control-label">Phone</label>
							<div class="col-lg-10">
								<input type="phone" placeholder="" id="email2" class="form-control" name="phone">
							</div>
						</div>
						<div  class="form-group">
									<label class="col-lg-2 control-label">Service Nmae</label>
									<div class="col-md-10">
									<select id="cc-pament" name="ser_id" class="form-control" required>
										<?php
										$query = "SELECT * FROM service";
										$result = mysqli_query($conn,$query);
										echo "<option>Select Service</option>";
										while ( $row = mysqli_fetch_assoc($result)){
											echo  "<option value ='{$row['ser_id']}'>{$row['ser_name']}</option>";
											}
										?>
									</select>
								</div>
								</div>
						<div  class="form-group">
									<label class="col-lg-2 control-label">Category Nmae</label>
									<div class="col-md-10">
									<select id="cc-pament" name="cat_id" class="form-control" required>
										<?php
										$query = "SELECT * FROM category";
										$result = mysqli_query($conn,$query);
										echo "<option>Select Category</option>";
										while ( $row = mysqli_fetch_assoc($result)){
											echo  "<option value ='{$row['cat_id']}'>{$row['cat_name']}</option>";
											}
										?>
									</select>
								</div>
								</div>
						<div class="form-group ">
							<label class="control-label col-md-3">Image Upload</label>
							<div class="col-md-9">
								<div class="fileupload fileupload-new" data-provides="fileupload">
									<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
										<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
									</div>
									<div>
										<input type="file" name="provider_image" class="btn btn-theme" />
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-theme" type="submit" name="add_provider">Save</button>
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
						<h4><i class="fa fa-angle-right"></i> Providers Table</h4>
						<hr>
						<thead>
							<tr>
								<th><i class="fa fa-bullhorn"></i> #</th>
								<th class="hidden-phone"><i class="fa fa-edit"></i>  Name</th>
								<th><i class="fa fa-envelope"></i>  Phone</th>
								<th><i class="fa fa-envelope"></i>  Service</th>
								<th><i class="fa fa-envelope"></i>  Category</th>
								<th><i class="fa fa-image"></i> Image</th>
								<th><i class="fa fa-edit"></i> Edit</th>
								<th><i class="fa fa-user-times"></i> Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php  
							$query = "SELECT * FROM provider  
									INNER JOIN service ON
									service.ser_id = provider.ser_id 
									INNER JOIN category ON
									category.cat_id = service.cat_id";
							$result = mysqli_query($conn,$query);
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>{$row['provider_id']}</td>";
								echo "<td>{$row['provider_name']}</td>";
								echo "<td>{$row['phone']}</td>";
								echo "<td>{$row['ser_name']}</td>";
								echo "<td>{$row['cat_name']}</td>";
								echo "<td><img src = 'upload/{$row['provider_image']}' width='100' height='100'></td>";
								echo "<td><a class='btn btn-primary btn-xs' href='edit_provider.php?provider_id={$row["provider_id"]}'><i class='fa fa-pencil'></i></a></td>";
								echo "<td><a class='btn btn-danger btn-xs' href='delete_provider.php?provider_id={$row["provider_id"]}'><i class='fa fa-trash-o '></i></a></td>";
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

							<?php include('../includes/admin_footer.php'); ?>