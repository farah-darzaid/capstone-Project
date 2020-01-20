    <?php
    session_start();
include ('includes/public_header.php');

$result = mysqli_query($conn,"SELECT * FROM provider WHERE provider_id={$_GET['provider_id']}");
echo ' <section class="main-block" id="category">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-5">
<div class="styled-heading">
<h3>Provider information</h3>
</div>
</div>
</div>';
while ($row = mysqli_fetch_assoc($result)) {
 echo"<div class='row info'> <div class='col-5 col-md-5 col-sm-6'>";
 echo"<form name='add' action='request.php?provider_id={$_GET['provider_id']}' method='post' enctype='multipart/form-data'>";
 echo  " <h6>provider name : {$row['provider_name']}</h6>";
 echo " <h6>mobile phone : {$row['phone']}</h6>";
 echo " <h6>email : {$row['provider_email']}</h6>";
 echo "<input type='submit' class='btn btn-outline-light top-btn' name='add' id='add' value='CONTACT'>";
 echo "</form>";
 echo"</div>";
 echo " <div class='col-5 col-md-5 col-sm-6 img'>";
 echo " <img src='admin/upload/{$row['provider_image']}' width='100' height='100'>";
echo "</div> </div>";

}

?>


</div>
</div>
</section>

<?php include('includes/public_footer.php'); ?>