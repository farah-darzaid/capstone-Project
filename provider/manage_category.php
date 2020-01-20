<?php 
start_session();
 include ('../includes/connection.php');//check admin id session
if (isset($_SESSION['admin_id'])) {
	if (isset($_POST['add_cat'])) {
		$cat_name = $_POST['cat_name'];
		$cat_desc = $_POST['cat_desc'];
		$cat_image = $_FILES['cat_image']['name'];
		$tmp_name = $_FILES['cat_image']['tmp_name'];
		$path = "upload/";
		//function to check if image 
		move_uploaded_file($tmp_name, $path.$cat_image);//

		$query = "INSERT INTO category(cat_name,cat_desc,cat_image) VALUES ('$cat_name','$cat_desc','$cat_image') ";
		mysqli_query($conn,$query);

	}
	 }  
 include ('../includes/admin_header.php');

 ?> 

<!-- BASIC FORM VALIDATION -->
<section id="main-content">
	<section class="wrapper">

		<div class="row mt">
			<div class="col-lg-12">
				<h4><i class="fa fa-angle-right"></i> Create category</h4>
				<div class="form-panel">
					<form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data">
						<div class="form-group ">
							<label class="col-lg-2 control-label">Category Name</label>
							<div class="col-lg-10">
								<input type="text" placeholder="" id="f-name" class="form-control" name="cat_name">
							</div>
						</div>
						<div class="form-group ">
							<label class="col-lg-2 control-label">Category Description</label>
							<div class="col-lg-10">
								<input type="text" placeholder="" id="desc" class="form-control" name="cat_desc">
							</div>
						</div>
						<div class="form-group ">
							<label class="control-label col-md-3">Category Image </label>
							<div class="col-md-9">
								<div class="fileupload fileupload-new" data-provides="fileupload">
									<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
										<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
									</div>
									<div>

										<input type="file" name="cat_image" class="btn btn-theme" />
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-theme" type="submit" name="add_cat">ADD</button>
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
						<h4><i class="fa fa-angle-right"></i> Categories Table</h4>
						<hr>
						<thead>
							<tr>
								<th><i class="fa fa-bullhorn"></i> #</th>
								<th class="hidden-phone"><i class="fa fa-edit"></i>  Name</th>
								<th><i class="fa fa-envelope"></i>  decription</th>
								<th><i class=" fa fa-image"></i> Image</th>
								<th><i class=" fa fa-edit"></i> Edit</th>
								<th><i class="fa fa-user-times"></i> Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php  
							$query  = "SELECT  * FROM category";
							$result = mysqli_query($conn,$query);
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>{$row['cat_id']}</td>";
								echo "<td>{$row['cat_name']}</td>";
								echo "<td>{$row['cat_desc']}</td>";
								echo "<td><img src = 'upload/{$row['cat_image']}' width='100' height='100'></td>";
								echo "<td><a class='btn btn-primary btn-xs' href='edit_category.php?cat_id={$row["cat_id"]}'><i class='fa fa-pencil'></i></a></td>";
								echo "<td><a class='btn btn-danger btn-xs' href='delete_category.php?cat_id={$row["cat_id"]}'><i class='fa fa-trash-o '></i></a></td>";
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