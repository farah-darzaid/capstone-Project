<?php 
session_start();
include('includes/public_header.php'); ?>
<!-- SLIDER -->
<section class="slider d-flex align-items-center" id="main">
    <!-- <img src="images/slider.jpg" class="img-fluid" alt="#"> -->
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="slider-title_box">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12">
                            <form class="form-wrap mt-4" action="show.php" method="get">
                                <div class="btn-group" role="group" aria-label="Basic example">

                                    <select class="btn-group2" id='cat_id' name="cat_id" required>
                                        <?php 
                                        $result = mysqli_query($conn, "SELECT * FROM category");
                                        echo "<option disabled selected >Where do you need service</option>";
                                        while ($row = mysqli_fetch_assoc($result)){
                                            echo "<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
                                        }
                                        echo "</select>";
                                        ?>

                                        <select class="btn-group2" id='ser_id' name="ser_id" required="">
                                            echo "<option disabled selected >Waht service do you want?</option>";
                                        </select>
                                        <button type='submit' class='btn-form' name="search"><span class='icon-magnifier search-icon'></span>SEARCH<i class='pe-7s-angle-right'></i></button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SLIDER -->
   <!--============================= CATEGORIES =============================-->
    <section class="main-block" id="category">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Browse Categories</h3>
                    </div>
                </div>
            </div>
            <div class="row">
            	<?php 
                    	$query = "SELECT * FROM category";
                $result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($result)){
                	echo "<div class='col-md-3 category-responsive' >
                    <a href='show_ser.php?cat_id={$row["cat_id"]}' class='category-wrap'>";
                         echo "<div class='category-block' >";
                            echo "<img src='admin/upload/{$row['cat_image']}' width='100' height='100'>";
                           echo " <h6>{$row['cat_name']}</h6>
                        </div> </a></div>
                        "; }?>
                    
               
                </div>
</div>
    </section>
    <!--============================= FEATURED PLACES =============================-->
    <section class="main-block light-bg" id="how">
        <div class="container how">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="styled-heading">
                        <h3>The simplest way to find services</h3>
                    </div>
                </div>
            </div>
                <ul class="row  process-area">
                    <li class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <img src="images/process1.png" alt="process" class="counter mb20-auto--md">
                        <h6>Search for your service</h6>
                    </li>
                    <li class="line col-lg-4 col-md-4 col-sm-4 col-12">
                        <img src="images/process2.png" alt="process" class="counter mb20-auto--md">
                        <h6>Choose provider and contact with him</h6>
                    </li>
                    <li class="line col-lg-4 col-md-4 col-sm-4 col-12">
                        <img src="images/process3.png" alt="process" class="counter mb20-auto--md">
                        <h6>Serve yourself in the fastest way</h6>
                    </li>
                </ul>
            </div>
            </section>
    <!--//END FEATURED PLACES -->
    <!--============================= Rating =============================-->

    <section class="main-block light-bg count">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                    	<div>
                                <img src="images/counter4.png" alt="counter" class="counter mb20-auto--md" >
                            </div>
                            <div>
                                <div class="counter counter-title" data-num="100000">
                                	<?php
                                		$q1 = "SELECT COUNT(*) c FROM category";
                                		$result = mysqli_query($conn,$q1);
                                		$row = mysqli_fetch_assoc($result);
                                		echo str_repeat('&nbsp;', 5);
                                		echo $row['c'];
                                	 ?>
                                </div>
                                <h3 class="title-regular-light">Our Services</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                            <div>
                                <img src="images/counter5.png" alt="counter" class="counter mb20-auto--md">
                            </div>
                            <div>
                                <div class="counter counter-title" data-num="500000">
                                <?php  
                                		$q2 = "SELECT COUNT(*) p FROM customer";
                                		$result = mysqli_query($conn,$q2);
                                		$row = mysqli_fetch_assoc($result);
                                		echo str_repeat('&nbsp;', 5);
                                		echo $row['p'];
                                	 ?>
                                	 	
                                	 </div>
                                <h3 class="title-regular-light">Our Happy Customers</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                            <div>
                                <img src="images/counter6.png" alt="counter" class="counter mb20-auto--md">
                            </div>
                            <div>
                                <div class="counter counter-title" data-num="200000">
                                <?php
                                		$q2 = "SELECT COUNT(*) p FROM provider";
                                		$result = mysqli_query($conn,$q2);
                                		$row = mysqli_fetch_assoc($result);
                                		echo str_repeat('&nbsp;', 5);
                                		echo $row['p'];
                                	 ?>
                                	 	
                                	 </div>
                                <h3 class="title-regular-light">Verified Providers</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--//END RATING -->

    <!--//END CATEGORIES -->
    <!--============================= ADD LISTING =============================-->
    <section class="main-block light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="add-listing-wrap">
                        <h2>Join us as provider</h2>
                        <p>Add your Business infront of millions and earn 3x profits from our Requests</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="join.php" class="btn btn-danger"><span class="ti-plus"></span> ADD SERVICE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END ADD LISTING -->
<?php include('includes/public_footer.php'); ?>