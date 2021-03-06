<?php 
include('../includes/connection.php');
//if (isset($_SESSION['admin_id'])) {
if (isset($_POST['add_admin'])){
	$email        = $_POST['email'];
	$password     = $_POST['password'];
	$fullname     = $_POST['fullname'];
	//get data from file
	$admin_image  = $_FILES['admin_image']['name'];
	$tmp_name     = $_FILES['admin_image']['tmp_name'];
	$path         = "upload/";


	move_uploaded_file($tmp_name, $path.$admin_image);

	$query = "INSERT INTO admin(admin_email,admin_password,fullname,admin_image) VALUES('$email','$password','$fullname','$admin_image')";
		//perform the query 
	mysqli_query($conn,$query);
	header("location: manage_admin.php");
	exit;
//}
}
include("../includes/admin_header.php");



?>
<!-- BASIC FORM VALIDATION -->
<section id="main-content">
	<section class="wrapper">

		<div class="row mt">
			<div class="col-lg-12">
				<h4><i class="fa fa-angle-right"></i> Create Admin</h4>
				<div class="form-panel">
					<form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data">
						<div class="form-group ">
							<label class="col-lg-2 control-label">Name</label>
							<div class="col-lg-10">
								<input type="text" placeholder="" id="f-name" class="form-control" name="fullname">
							</div>
						</div>
						<div class="form-group ">
							<label class="col-lg-2 control-label">Email</label>
							<div class="col-lg-10">
								<input type="email" placeholder="" id="email2" class="form-control" name="email">
							</div>
						</div>
						<div class="form-group ">
							<label class="col-lg-2 control-label">Password</label>
							<div class="col-lg-10">
								<input type="password" placeholder="" id="l-name" class="form-control" name="password">
							</div>
						</div>
						<div class="form-group ">
							<label class="control-label col-md-3">Image Upload</label>
							<div class="col-md-9">
								<div class="fileupload fileupload-new" data-provides="fileupload">
									<input type="file" name="admin_image" class="btn btn-theme" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-theme" type="submit" name="add_admin">Save</button>
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
						<h4><i class="fa fa-angle-right"></i> Admins Table</h4>
						<hr>
						<thead>
							<tr>
								<th><i class="fa fa-bullhorn"></i> #</th>
								<th class="hidden-phone"><i class="fa fa-edit"></i>  Name</th>
								<th><i class="fa fa-envelope"></i>  Email</th>
								<th><i class=" fa fa-image"></i> Image</th>
								<th><i class=" fa fa-edit"></i> Edit</th>
								<th><i class="fa fa-user-times"></i> Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php  
							$query  = "SELECT  * FROM admin";
							$result = mysqli_query($conn,$query);
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>{$row['admin_id']}</td>";
								echo "<td>{$row['fullname']}</td>";
								echo "<td>{$row['admin_email']}</td>";
								echo "<td><img src = 'upload/{$row['admin_image']}' width='100' height='100'></td>";
								echo "<td><a class='btn btn-primary btn-xs' href='edit_admin.php?admin_id={$row["admin_id"]}'><i class='fa fa-pencil'></i></a></td>";
								echo "<td><a class='btn btn-danger btn-xs' href='delete_admin.php?admin_id={$row["admin_id"]}'><i class='fa fa-trash-o '></i></a></td>";
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