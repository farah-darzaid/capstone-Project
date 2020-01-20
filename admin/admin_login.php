<?php 
session_start();
include('../includes/connection.php');

if(isset($_POST['signin'])){
	$email    = $_POST['email'];
	$password = $_POST['password'];

	if(!empty($email) && (!empty($password))) {
    //select records from db 
		$query  = "SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$password' ";

		$result = mysqli_query($conn, $query);

		$row    = mysqli_fetch_assoc($result);

    //check if user already exists in db
        //we can use this to check
        if (mysqli_num_rows($result) > 0) {//if($row['admin_id']) {}
        $_SESSION['admin_id'] = $row['admin_id'];
        //open index page
        header("Location:index.php");

    }else{
        //if user not admin stay on the same page 
    	$error = "You are not authorized";
    }
}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<title>Admin Login</title>

	<!-- Favicons -->
	<link href="img/favicon.png" rel="icon">
	<link href="img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Bootstrap core CSS -->
	<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!--external css-->
	<link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
    ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <div id="login-page">
      	<div class="container">
      		<form class="form-login" method="post">
      			<h2 class="form-login-heading">sign in now</h2>
      			<?php  if(isset($error)) {
      				echo "<div class='alert alert-danger'>";
      				echo "$error";
      				echo "</div>";

      			} ?>
      			<div class="login-wrap">
      				<input type="email" class="form-control" placeholder="Admin Email" name="email" autofocus>
      				<br>
      				<input type="password" class="form-control" placeholder="Admin Password" name="password">
      				<hr>
      				<button class="btn btn-theme btn-block" type="submit" name="signin"><i class="fa fa-lock"></i> SIGN IN</button>
      			</div>
      			<!-- Modal -->
      			<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
      				<div class="modal-dialog">
      					<div class="modal-content">
      						<div class="modal-header">
      							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      							<h4 class="modal-title">Forgot Password ?</h4>
      						</div>
      						<div class="modal-body">
      							<p>Enter your e-mail address below to reset your password.</p>
      							<input type="text" name="emailaa" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
      						</div>
      						<div class="modal-footer">
      							<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
      							<button class="btn btn-theme" type="button">Submit</button>
      						</div>
      					</div>
      				</div>
      			</div>
      			<!-- modal -->
      		</form>
      	</div>
      </div>
      <!-- js placed at the end of the document so the pages load faster -->
      <script src="lib/jquery/jquery.min.js"></script>
      <script src="lib/bootstrap/js/bootstrap.min.js"></script>
      <!--BACKSTRETCH-->
      <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
      <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
      <script>
      	$.backstretch("img/login-bg.jpg", {
      		speed: 500
      	});
      </script>
  </body>

  </html>
