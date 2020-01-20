<?php include('connection.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Colorlib">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Page Title -->
    <title>Listing &amp; Directory Website Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="css/set1.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/swiper.min.css">

<!--<link rel="stylesheet" type="text/css" href="../admin/css/join.css">-->
 <!-- <link href="../admin/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
</head>

<body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#add").submit(function(){
            alert("Form submitted");
        });
    });
    </script>
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
        <!--============================= HEADER =============================-->

        <div class="nav-menu">
            <div class="bg transition">
                <div class="container-fluid fixed">
                    <div class="row">
                        <div class="col-md-12">

                            <nav class="navbar navbar-expand-lg navbar-light">

                                <a class="navbar-brand" href="index.php">LISTING
                                    </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-menu"></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="index.php"  >
                                             Home
                                         </a>
                                     </li>
                                     <li class="nav-item dropdown">
                                        <a class="nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Categories
                                            <span class="icon-arrow-down"></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <?php
                                            $query = "SELECT * FROM category";
                                            $result =mysqli_query($conn,$query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                             echo "<a class='dropdown-item' href='show_ser.php?cat_id={$row["cat_id"]}'>{$row['cat_name']}</a>";
                                         } 

                                         ?>
                                     </div>
                                 </li>
                                 <li class="nav-item active">
                                    <a class="nav-link" href="detail.php">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact_admin.php">Contact us</a>
                                </li>
                                <?php if (isset($_SESSION['customer_id'])) {
                                    echo "<li><a href='customer_logout.php' class='btn btn-outline-light top-btn'><span class='ti-unlock'></span>   Logout</a>
                                <a href='provider_login.php' class='btn btn-outline-light top-btn'><span class='ti-lock'></span> provider</a></li>";
                                } else {
                                    echo "<li><a href='customer_login.php' class='btn btn-outline-light top-btn'><span class='ti-lock'></span>   customer</a>
                                <a href='provider_login.php' class='btn btn-outline-light top-btn'><span class='ti-lock'></span> provider</a></li>";
                                } ?>
                                
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--//END HEADER -->