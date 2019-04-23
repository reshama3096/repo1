<?php
session_start();
 
	if($_SESSION['sausername']==''|| $_SESSION['sapassword']=='')
{

header("location:./index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Agroshopee</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/logo.png" type="image/x-icon">
  <!--Select Plugins-->
  <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
  <!--inputtags-->
  <link href="assets/plugins/inputtags/css/bootstrap-tagsinput.css" rel="stylesheet" />
  <!--multi select-->
  <link href="assets/plugins/jquery-multi-select/multi-select.css" rel="stylesheet" type="text/css">
  <!--Bootstrap Datepicker-->
  <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
  <!--Touchspin-->
  <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css">
  <!-- jquery steps CSS-->
  <link rel="stylesheet" type="text/css" href="assets/plugins/jquery.steps/css/jquery.steps.css">
  <!-- simplebar CSS-->
   <link rel="stylesheet" href="assets/plugins/summernote/dist/summernote-bs4.css"/>
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  <!--Data Tables -->
  <link href="assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <script src="assets/js/angular.js"></script>
</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo" style="background: white;">
      <a href="dashboard.php">
       <img src="assets/images/logo.png" class="logo-icon" alt="logo icon">
     </a>
	 </div>
	 <ul class="sidebar-menu do-nicescrol">
      <li>
        <a href="dashboard.php" class="waves-effect">
          <i class="icon-home"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
      </li>
	    <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-users"></i> <span>Employee</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
    		  <li><a href="all-employee.php"><i class="fa fa-circle-o"></i>All Employee</a></li>
    		  <li><a href="add-new-employee.php"><i class="fa fa-circle-o"></i>Add New Employee</a></li>
			  <li><a href="#"><i class="fa fa-circle-o"></i>Assign Role</a></li>
			  <li><a href="#"><i class="fa fa-circle-o"></i>Assign Employment</a></li>


		</ul>
      </li>
	  <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-th-large"></i><span>Zone</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
    		  <li><a href="all-zone.php"><i class="fa fa-circle-o"></i>All Zone</a></li>
    		  <li><a href="add-new-zone.php"><i class="fa fa-circle-o"></i>Add New Zone</a></li>
			  <li><a href="#"><i class="fa fa-circle-o"></i>Stock Managment</a></li>
			  <li><a href="#"><i class="fa fa-circle-o"></i>Payment Managment</a></li>

        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-cubes"></i> <span>Franchise</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
    		  <li><a href="#"><i class="fa fa-circle-o"></i>All Franchise</a></li>
    		  <li><a href="#"><i class="fa fa-circle-o"></i>Add New Franchise</a></li>
        </ul>
      </li>
	   <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-street-view"></i> <span>Farmers</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
    		  <li><a href="#"><i class="fa fa-circle-o"></i>All Farmers</a></li>
    		  <li><a href="#"><i class="fa fa-circle-o"></i>Add New Farmers</a></li>
        </ul>
      </li>
	   <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-handshake-o"></i> <span>Buyers</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
    		  <li><a href="#"><i class="fa fa-circle-o"></i>All Buyers</a></li>
    		  <li><a href="#"><i class="fa fa-circle-o"></i>Add New Buyers</a></li>
        </ul>
      </li>
	  <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-ship"></i> <span>Vendors</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
    		  <li><a href="#"><i class="fa fa-circle-o"></i>All Vendors</a></li>
    		  <li><a href="#"><i class="fa fa-circle-o"></i>Add New Vendors</a></li>
        </ul>
      </li>
	  <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-truck"></i> <span>Logistics</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
    		  <li><a href="#"><i class="fa fa-circle-o"></i>All Logistics</a></li>
    		  <li><a href="#"><i class="fa fa-circle-o"></i>Add New Logistics</a></li>
        </ul>
      </li>
	   <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-database"></i> <span>Payments</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
    		  <li><a href="#"><i class="fa fa-circle-o"></i>Received Payments</a></li>
    		  <li><a href="#"><i class="fa fa-circle-o"></i>Sent Payments</a></li>
			  <li><a href="#"><i class="fa fa-circle-o"></i>Expenses</a></li>
			  <li><a href="#"><i class="fa fa-circle-o"></i>Pending Payment</a></li>
			  <li><a href="#"><i class="fa fa-circle-o"></i>Dues Payment</a></li>
			  <li><a href="#"><i class="fa fa-circle-o"></i>Make A Payment</a></li>
        </ul>
      </li>
	  <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-bell"></i> <span>Notifications</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
    		  <li><a href="#"><i class="fa fa-circle-o"></i>Zone Notification</a></li>
    		  <li><a href="#"><i class="fa fa-circle-o"></i>Franchise Notification</a></li>
			  <li><a href="#"><i class="fa fa-circle-o"></i>Farmers Notification</a></li>
			  <li><a href="#"><i class="fa fa-circle-o"></i>Vendors Notification</a></li>
    		  <li><a href="#"><i class="fa fa-circle-o"></i>Logistics Notification</a></li>
    		  <li><a href="#"><i class="fa fa-circle-o"></i>Payment Notification</a></li>
			  <li><a href="#"><i class="fa fa-circle-o"></i>Employee Notification</a></li>
		</ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-envelope"></i>
          <span>Message</span>
           <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
    		<li><a href="message-compose.php"><i class="fa fa-circle-o"></i>New Message</a></li>
    	    <li><a href="#"><i class="fa fa-circle-o"></i>Sent Message</a></li>
    	    <li><a href="#"><i class="fa fa-circle-o"></i>Received Message</a></li>
		</ul>
      </li>
      <li class="sidebar-header"></li>
      <li><a href="javaScript:void();" class="waves-effect"> <span></span></a></li>
      <li><a href="javaScript:void();" class="waves-effect"> <span></span></a></li>
      <li><a href="javaScript:void();" class="waves-effect"><span></span></a></li>
      <li><a href="javaScript:void();" class="waves-effect"> <span></span></a></li>
      <li><a href="javaScript:void();" class="waves-effect"><span></span></a></li>
    </ul>
	 
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top gradient-scooter">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
    </li>
  </ul>
     <?php

        /*$curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://control.msg91.com/api/balance.php?type=4&authkey="",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
} */?>
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
	    <i class="icon-envelope-open"></i><span class="badge badge-danger badge-up" style="padding: 0.7em 0.5em;line-height: 0;">100</span></a>
    </li>
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
	  <i class="icon-bell"></i><span class="badge badge-primary badge-up" style="padding: 0.7em 0.5em;line-height: 0;">10</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="assets/images/logo-icon.png" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets/images/logo-icon.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title">AgroShopee</h6>
            <p class="user-subtitle">agroshopee@gmail.com</p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Message</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><a href="./database/logout.php"><i class="icon-power mr-2"></i> Logout</a></li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->