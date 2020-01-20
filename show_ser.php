<?php
session_start();
include ('includes/public_header.php');
$cat_id = $_GET['cat_id'];
$result = mysqli_query($conn,"SELECT * FROM service WHERE cat_id={$_GET['cat_id']}");
echo ' <section class="main-block light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
<h3>Our services</h3>
</div>
                </div>
            </div>
<div class="row">';
while ($row = mysqli_fetch_assoc($result)) {
 echo "<div class='col-md-4 featured-responsive'>
                    <div class='featured-place-wrap'>
 <a href='show_pro.php?ser_id={$row['ser_id']}' class='category-wrap'>";
 echo "<img src='admin/upload/{$row['ser_image']}' class='img-fluid' alt='#'>";
 echo "<span class='featured-rating-orange'>{$row['ser_name']}</span>";
 echo "<div class='featured-title-box'>
                                <p>{$row['ser_desc']} </p> 
                                
                            </div> </a>
                    </div> </div>
                "; }
 
 ?>
 
 
</div>
</div>
</section>
<?php include('includes/public_footer.php'); ?>