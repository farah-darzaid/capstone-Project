<?php 
session_start(); 
$_SESSION['issend'] = false;
if (!isset($_SESSION['customer_id']) ){
  header("location:customer_login.php");
  exit();
}

include('includes/public_header.php');
if (isset($_POST['send'])) {
  $_SESSION['issend'] = true;
  $customer_id = $_SESSION['customer_id'];
  $name    = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $admin_id = $_SESSION['admin_id'];


  $query = "INSERT INTO contact_admin(customer_id,customer_name,customer_email,message,admin_id) VALUES('$customer_id','$name','$email','$message','$admin_id')";

  mysqli_query($conn, $query);

  if ($_SESSION['issend'] == true) {
   echo " <div class='alert alert-success' class='alert-success' id='sms'>Your message sent successfully</div>";
   
 }
}
?>

<!-- BASIC FORM ELELEMNTS -->
<div class="row mt contact">
  <div class="col-lg-6 col-md-6 col-sm-6">
    <h4 class="title">Contact Form</h4>
    <div id="message"></div>
    <form class="contact-form php-mail-form" role="form" method="post">

      <div class="form-group">
        <?php  
        $query = "SELECT * FROM customer WHERE customer_id={$_SESSION['customer_id']}";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        ?>
        <input type="name" name="name" class="form-control" id="contact-name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="<?php echo $row['customer_name']?>">
        <div class="validate"></div>
      </div>
      <div class="form-group">
        <input type="email" name="email" class="form-control" id="contact-email" placeholder="Your Email" value="<?php echo $row['customer_email']?>"data-msg="Please enter a valid address">
        <div class="validate"></div>
      </div>

      <div class="form-group">
        <textarea class="form-control" name="message" id="contact-message" placeholder="Your Message" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
        <div class="validate"></div>
      </div>

      <div class="loading"></div>
      
      <div class="form-send">
        <button type="submit" name="send" id="send" class="btn btn-warning" style="margin-top: 13%;">Send Message</button>
      </div>

    </form>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-6">
    <h4 class="title">Contact Constraints</h4>
    <p class="alert alert-warning">If you have any questions or notic fill the form here all data submitted will be send to website owner .
    your opinion is important for us.</p>
    <ul class="contact_details">
      <?php 
      $query = "SELECT * FROM admin WHERE admin_id ={$_SESSION['admin_id']}";
      $result = mysqli_query($conn,$query);
      $row = mysqli_fetch_assoc($result);
      echo "<li><i class='fa fa-envelope-o'></i> admin name : {$row['fullname']}</li>";
      echo "<li><i class='fa fa-phone-square'></i>admin email : {$row['admin_email']}</li>";
      ?>
    </ul>
    <!-- contact_details -->
  </div>
</div>
<!-- <script type="text/javascript">
  document.getElementById("send").onclick = function() {myFunction()};

  function myFunction() {
    document.getElementById("sms").style.visibility= "visible";
  }
</script>
-->
<?php include('includes/public_footer.php'); ?>
