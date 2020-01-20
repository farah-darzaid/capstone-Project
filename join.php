<?php 
session_start();
include("includes/connection.php");

   //when user press signin button
if (isset($_POST['register'])) {
	$name   =  $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];
	$cat_id = $_POST['cat_id'];
	$ser_id = $_POST['ser_id'];
  //get data from file

	$provider_image  = $_FILES['provider_image']['name'];
	$tmp_name     = $_FILES['provider_image']['tmp_name'];
	$path         = "admin/upload/";

	move_uploaded_file($tmp_name, $path.$provider_image);

    //check if empty
	if(!empty($email) && (!empty($password)) && (!empty($name)) && (!empty($phone)) && (!empty($ser_id)) && (!empty($cat_id))  && (!empty($provider_image))) {
    //select records from db 
		$query = "INSERT INTO provider(provider_name,phone,ser_id,provider_email,provider_password,provider_image) VALUES('$name','$phone','$ser_id','$email','$password','$provider_image')";

		mysqli_query($conn, $query);


		$_SESSION['provider_id'] = $row['provider_id'];
        //open index page
		header("Location:provider");

	}
} 
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="admin/css/join.css">
<body>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$("#cat_id").change(function()
			{
                    //get selected parent option 
                    var cat_id = $("#cat_id").val();
                    //alert(admin_id);
                    $.ajax(
                    {
                    	type: "GET",
                    	url: "names.php?cat_id=" + cat_id,
                    	success: function(data)
                    	{
                    		$("#ser_id").html(data);

                    	}
                    });
                });

		});
	</script>
</body>
<div class="login">
	<span class="login__name">Create an account as provider</span>
	<form class="login__form" method="post"  enctype="multipart/form-data">
		<div class="login__group">
			<label class="field login__field">
				<input type="text" class="r-text-input field__input" placeholder="Username" required name="name">
				<span class="field__label-wrap">
					<span class="field__label login__label">Username</span>
				</span>
				<span class="field__hint login__hint">e.g. melnik909</span>
			</label>		
		</div>
		<div class="login__group">
			<label class="field login__field">
				<input type="email" class="r-text-input field__input" placeholder="E-mail" required name="email">
				<span class="field__label-wrap">
					<span class="field__label login__label">E-mail</span>
				</span>
				<span class="field__hint login__hint">e.g. melnik909@ya.ru</span>
			</label>		
		</div>
		<div class="login__group">
			<label class="field login__field">
				<input type="password" class="r-text-input field__input" placeholder="Password" required name="password">
				<span class="field__label-wrap">
					<span class="field__label login__label">Password</span>
				</span>
				<span class="field__hint login__hint">e.g. JoomLa1990</span>
			</label>		
		</div>	
		<div class="login__group">
			<label class="field login__field">
				<input type="number" class="r-text-input field__input" placeholder="Phone number" required name="phone">
				<span class="field__label-wrap">
					<span class="field__label login__label">Phone number</span>
				</span>
				<span class="field__hint login__hint">e.g. 012345678</span>
			</label>		
		</div>
		<div class="login__group">
			<select class="field login__field r-text-input field__input" id="cat_id" name="cat_id">
				<?php 
				$result = mysqli_query($conn, "SELECT * FROM category");
				echo "<option disabled selected >Select category</option>";
				while ($row = mysqli_fetch_assoc($result)){
					echo "<option value='{$row['cat_id']}' >{$row['cat_name']}</option>";
				}
				echo "</select>";
				?>
			</div>	
			<div class="login__group">

				<select class="field login__field r-text-input field__input" id='ser_id' name="ser_id">
					echo "<option disabled selected >Select service</option>";

				</select>
			</div>
			<div class="login__group">
				<label class="control-label col-md-3">Image Upload</label>
				<div class="col-md-9">

						<input type="file" name="provider_image"  class="r-text-input field__input" required />

				</div>
			</div>

			<div class="login__group">
				<button class=" login__button" type="submit" name="register">Create an account</button>
			</div>
		</form>
	</div>