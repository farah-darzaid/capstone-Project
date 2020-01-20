<?php 
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header("Location:admin_login.php");
        exit;//to prevent hacking
    }
include_once('connection.php');
        $q = "SELECT * FROM admin WHERE admin_id={$_SESSION['admin_id']}";
        $result = mysqli_query($conn,$q);
        $row = mysqli_fetch_assoc($result); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
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

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="#" class="logo"><b>DASH<span>IO</span></b></a>
      
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
              <!-- inbox dropdown start-->
              <li id="header_inbox_bar" class="dropdown" >
                <a  class="dropdown-toggle" href="messages.php">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-theme">
                    <?php
                        $q1 = "SELECT COUNT(*) c FROM contact_admin WHERE  admin_id={$_SESSION['admin_id']}";
                        $result1 = mysqli_query($conn,$q1);
                        $row1 = mysqli_fetch_assoc($result1);
                        echo $row1['c'];
                       ?>
                    </span>
                </a>
              </li>
              <!-- inbox dropdown end -->
            </ul>
            <!--  notification end -->
          </div>
          <!-- inbox dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="admin_logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="#"> <?php  echo " <img src='../admin/upload/{$row['admin_image']}' width='100' height='100'>"; ?> </a></p>
          <h5 class="centered"><?php  echo $row['fullname'];  ?></h5>
           <li class="mt">
            <a href="manage_admin.php">
             <i class="fa fa-cogs"></i>
              <span>Manage Admin</span>
              </a>
          </li>
           <li class="mt">
            <a href="manage_category.php">
             <i class="fa fa-cogs"></i>
              <span>Manage Categories</span>
              </a>
          </li>
           <li class="mt">
            <a href="manage_service.php">
             <i class="fa fa-shirtsinbulk"></i>
              <span>Manage Services</span>
              </a>
          </li>
          <li class="mt">
            <a href="manage_provider.php">
             <i class="fa fa-briefcase"></i>
              <span>Manage Providers</span>
              </a>
          </li>
          <li class="mt">
            <a href="messages.php">
             <i class="fa fa-envelope-open"></i>
              <span>See messages</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
