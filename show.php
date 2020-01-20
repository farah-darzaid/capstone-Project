<?php
session_start();
include ('includes/public_header.php');
if (isset($_GET['search'])) {
    if (isset($_GET['cat_id'])) {
      $cat_id = $_GET['cat_id'];  
      
    }
    if (isset($_GET['ser_id'])) {
        $ser_id = $_GET['ser_id'];
    }
	
	if(!empty($cat_id) && (!empty($ser_id))) {
		
		$result = mysqli_query($conn,"SELECT * FROM provider WHERE ser_id={$_GET['ser_id']}");
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
                          echo "<img src='admin/upload/{$row['provider_image']}' class='img-fluid' alt='#'>";
                           echo " <span class='featured-rating-orange'>{$row['provider_name']}</span>";
                           echo "<div class='featured-title-box'>
                                <p>3 Click to see details</p> <span> • </span>
                                
                            </div> </a>
                    </div> </div>
                "; }
                         
	} elseif(empty($ser_id)) {
		$result = mysqli_query($conn,"SELECT * FROM service WHERE cat_id={$_GET['cat_id']}");
		echo ' <section class="main-block" id="category">
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
	}
}
	 
	 
 ?>
                    
               
                </div>
</div>
    </section>

    <?php include('includes/public_footer.php'); ?>