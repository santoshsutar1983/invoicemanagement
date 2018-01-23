<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Invoice System</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/Ionicons/css/ionicons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/perfect-scrollbar/css/perfect-scrollbar.css">
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/select2/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/spectrum/spectrum.css">


	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/shamcey.css">

    <script type='text/javascript' src="<?php echo base_url(); ?>assets/lib/jquery/jquery.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/lib/popper.js/popper.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/lib/bootstrap/bootstrap.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/lib/jquery-ui/jquery-ui.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/lib/moment/moment.js"></script>

    <!--  <script type='text/javascript' src="<?php echo base_url(); ?>assets/lib/Flot/jquery.flot.js"></script> -->
    <!-- <script type='text/javascript' src="<?php echo base_url(); ?>assets/lib/Flot/jquery.flot.resize.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/lib/flot-spline/jquery.flot.spline.js"></script> -->
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/shamcey.js"></script>
    <!-- <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
 -->
     <script type='text/javascript' src="<?php echo base_url(); ?>assets/lib/select2/js/select2.min.js"></script>
     <script type='text/javascript' src="<?php echo base_url(); ?>assets/lib/moment/moment.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css'>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/lib/datatables/jquery.dataTables.css">

    <script type='text/javascript' src="<?php echo base_url(); ?>assets/lib/datatables/jquery.dataTables.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/lib/datatables-responsive/dataTables.responsive.js"></script>

    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/validate-js/2.0.1/validate.js'></script> -->
    <script src='http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js'></script>


</head>

<div class="sh-logopanel">
      <a href="" class="sh-logo-text">Invoice System</a>
      <a id="navicon" href="" class="sh-navicon d-none d-xl-block"><i class="icon ion-navicon"></i></a>
      <a id="naviconMobile" href="" class="sh-navicon d-xl-none"><i class="icon ion-navicon"></i></a>
    </div><!-- sh-logopanel -->

    <div class="sh-sideleft-menu">
      <label class="sh-sidebar-label">Navigation</label>
      <ul class="nav">
        <!-- <li class="nav-item">
          <a href="index.html" class="nav-link active">
            <i class="icon ion-ios-home-outline"></i>
            <span>Dashboard</span>
          </a>
        </li> --><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-bookmarks-outline"></i>
            <span>Invoice</span>
          </a>
          <!-- <ul class="nav-sub">
            <li class="nav-item"><a href="blank.html" class="nav-link">Add Masters</a></li>
            <li class="nav-item"><a href="blank.html" class="nav-link">Masters List</a></li>
            <li class="nav-item"><a href="page-mailbox.html" class="nav-link">Mailbox</a></li>
            <li class="nav-item"><a href="page-chat.html" class="nav-link">Chat Page</a></li>
            <li class="nav-item"><a href="page-calendar.html" class="nav-link">Calendar</a></li>
            <li class="nav-item"><a href="page-edit-profile.html" class="nav-link">Edit Profile</a></li>
            <li class="nav-item"><a href="page-file-manager.html" class="nav-link">File Manager</a></li>
            <li class="nav-item"><a href="page-invoice.html" class="nav-link">Invoice Page</a></li>
            <li class="nav-item"><a href="page-forum-list.html" class="nav-link">Forum List Page</a></li>
            <li class="nav-item"><a href="page-forum-topic.html" class="nav-link">Forum Topic View</a></li>
            <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
            <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li>
            <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li>
          </ul> -->
        </li><!-- nav-item -->
        
        <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-filing-outline"></i>
            <span>Payment</span>
          </a>
          <!-- <ul class="nav-sub">
            <li class="nav-item"><a href="accordion.html" class="nav-link">Accordion</a></li>
            <li class="nav-item"><a href="alerts.html" class="nav-link">Alerts</a></li>
            <li class="nav-item"><a href="buttons.html" class="nav-link">Buttons</a></li>
            <li class="nav-item"><a href="cards.html" class="nav-link">Cards</a></li>
            <li class="nav-item"><a href="icons.html" class="nav-link">Icons</a></li>
            <li class="nav-item"><a href="modal.html" class="nav-link">Modal</a></li>
            <li class="nav-item"><a href="navigation.html" class="nav-link">Navigation</a></li>
            <li class="nav-item"><a href="pagination.html" class="nav-link">Pagination</a></li>
            <li class="nav-item"><a href="popups.html" class="nav-link">Tooltip &amp; Popover</a></li>
            <li class="nav-item"><a href="progress.html" class="nav-link">Progress</a></li>
            <li class="nav-item"><a href="spinners.html" class="nav-link">Spinners</a></li>
            <li class="nav-item"><a href="typography.html" class="nav-link">Typography</a></li>
          </ul> -->
        </li> <!-- nav-item -->
         <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-analytics-outline"></i>
            <span>HRM</span>
          </a>
          <!-- <ul class="nav-sub">
            <li class="nav-item"><a href="chart-morris.html" class="nav-link">Morris Charts</a></li>
            <li class="nav-item"><a href="chart-flot.html" class="nav-link">Flot Charts</a></li>
            <li class="nav-item"><a href="chart-chartjs.html" class="nav-link">Chart JS</a></li>
            <li class="nav-item"><a href="chart-rickshaw.html" class="nav-link">Rickshaw</a></li>
            <li class="nav-item"><a href="chart-sparkline.html" class="nav-link">Sparkline</a></li>
          </ul> -->
        </li> <!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-navigate-outline"></i>
            <span>Reports</span>
          </a>
          <!-- <ul class="nav-sub">
            <li class="nav-item"><a href="map-google.html" class="nav-link">Google Maps</a></li>
            <li class="nav-item"><a href="map-vector.html" class="nav-link">Vector Maps</a></li>
          </ul> -->
        </li> <!-- nav-item -->
        <!-- <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-list-outline"></i>
            <span>Tables</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="table-basic.html" class="nav-link">Basic Table</a></li>
            <li class="nav-item"><a href="table-datatable.html" class="nav-link">Data Table</a></li>
          </ul>
        </li> --><!-- nav-item -->

         <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-gear-outline"></i>
            <span>Settings</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="<?php echo site_url('mastersetting/index') ?>" class="nav-link">Products Master</a></li>
            <li class="nav-item"><a href="<?php echo site_url('mastersetting/services_master_view') ?>" class="nav-link">Services Master</a></li>
            <li class="nav-item"><a href="<?php echo site_url('mastersetting/productservice_mapping_master_view') ?>" class="nav-link">Product-Service Mapping</a></li>
            <li class="nav-item"><a href="<?php echo site_url('mastersetting/attributes_master_view') ?>" class="nav-link">Attributes Master</a></li>
            <li class="nav-item"><a href="<?php echo site_url('mastersetting/customer_master_view') ?>" class="nav-link">Customer Master</a></li>
            <li class="nav-item"><a href="<?php echo site_url('mastersetting/employee_master_view') ?>" class="nav-link">Employee Master</a></li>
            <li class="nav-item"><a href="<?php echo site_url('mastersetting/smstemplate_master_view') ?>" class="nav-link">SMS Template</a></li>
          </ul>
        </li><!-- nav-item -->

         <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-gear-outline"></i>
            <span>Maintanance</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="form-elements.html" class="nav-link">Maintanance Log</a></li>
          </ul>
        </li><!-- nav-item -->

      </ul>
    </div><!-- sh-sideleft-menu -->