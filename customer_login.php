<?php 
session_start();
 
include("includes/connection.php");

   //when user press signin button
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
    //check if empty
  if(!empty($email) && (!empty($password))) {
    //select records from db 
    $query  = "SELECT * FROM customer WHERE customer_email='$email' AND customer_password='$password' ";

    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);


    //check if user already exists in db
        //we can use this to check
        if (mysqli_num_rows($result) > 0) {//if($row['admin_id']) {}
        $_SESSION['customer_id'] = $row['customer_id'];
        
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
  <link href="admin/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="admin/css/join.css">
  
<div class="login">
  <span class="login__name">Login </span>
  <?php  if(isset($error)) {
              echo "<div class='alert alert-danger'>";
              echo "$error";
              echo "</div>";
            } 
            ?>
  <form class="login__form" method="post">
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
        <button class="r-button login__button" type="submit" name="login"> SIGN IN</button>
      </div>
      <hr>
       <div class="registration center">
            Don't have an account yet?
            <a class="" href="register.php">
              Create an account
              </a>
          </div>
    </form>
  </div>