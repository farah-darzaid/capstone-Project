<?php
session_start();
include ('includes/public_header.php');
$query = "SELECT * FROM provider p INNER JOIN service s ON
									s.ser_id = p.ser_id WHERE p.ser_id={$_GET['ser_id']}";

									
$result = mysqli_query($conn,$query);
echo ' <section class="main-block" id="category">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-5">
<div class="styled-heading">
<h3>Our providers</h3>
</div>
</div>
</div>
<div class="row">';

while ($row = mysqli_fetch_assoc($result)) {
 echo "<div class='col-md-4 featured-responsive'>
                    <div class='featured-place-wrap'>
 <a href='single_pro.php?provider_id={$row["provider_id"]}' class='category-wrap'>";
 echo "<img src='admin/upload/{$row['provider_image']}' class='img-fluid' alt='#' height='100'>";
 echo "<span class='featured-rating-orange'>{$row['provider_name']}</span>";
 echo "<div class='featured-title-box'>
                                <p>Clich to see details</p> 
                               
                            </div> </a>
                    </div> </div>
                "; }
?>


</div>
</div>
</section>

<?php include('includes/public_footer.php'); ?>