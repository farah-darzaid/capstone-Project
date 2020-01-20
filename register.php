<?php 
session_start();
include("includes/connection.php");

   //when user press signin button
if (isset($_POST['register'])) {
  $name   =  $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
    //check if empty
  if(!empty($email) && (!empty($password)) && (!empty($name)) && (!empty($address))&& (!empty($phone)) ) {
    //select records from db 
    $query = "INSERT INTO customer(customer_name,customer_email,customer_password,customer_address,phone) VALUES('$name','$email','$password','$address','$phone')";

    mysqli_query($conn, $query);

   

        $_SESSION['customer_id'] = $row['customer_id'];
        //open index page
        header("Location:customer_login.php");

    }
} 
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="admin/css/join.css">
  <link href="admin/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<div class="login">
  <span class="login__name">Create an account</span>
  <form class="login__form" method="post">
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
        <input type="text" class="r-text-input field__input" placeholder="address" required name="address">
        <span class="field__label-wrap">
          <span class="field__label login__label">Address</span>
        </span>
        <span class="field__hint login__hint">e.g. country/city</span>
      </label>    
    </div>
    <div class="login__group">
      <label class="field login__field">
        <input type="text" class="r-text-input field__input" placeholder="Phone" required name="phone">
        <span class="field__label-wrap">
          <span class="field__label login__label">Moblile phone</span>
        </span>
        <span class="field__hint login__hint">e.g. 078-000-0000</span>
      </label>    
    </div>

      <div class="login__group">
        <button class="r-button login__button" type="submit" name="register">Create an account</button>
      </div>
      <hr>
       <div class="login__group center">
            Already have an account ?
            <a class="" href="customer_login.php">
             Sign In
              </a>
          </div>
    </form>
  </div>