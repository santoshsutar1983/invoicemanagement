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
    
    <link rel='stylesheet' href='<?php echo base_url(); ?>/assets/lib/jquery.steps/jquery.steps.css'>

    <script src='<?php echo base_url(); ?>/assets/lib/jquery.steps/jquery.steps.js ?>'></script>
    <script src='<?php echo base_url(); ?>/assets/lib/jquery.steps/jquery.steps.js ?>'></script>

 
   <!--  <script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script> -->


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
           <ul class="nav-sub">
            <li class="nav-item"><a href="<?php echo site_url('invoice/index') ?>"" class="nav-link">Generate Invoice</a></li>
           </ul> 
        </li><!-- nav-item -->
        
        <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-filing-outline"></i>
            <span>Payment</span>
          </a>
           <ul class="nav-sub">
            <li class="nav-item"><a href="<?php echo site_url('payment/index') ?>" class="nav-link">Payment</a></li>
             
          </ul> 
        </li> <!-- nav-item -->
         <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-analytics-outline"></i>
            <span>HRM</span>
          </a>
           <ul class="nav-sub">
            <li class="nav-item"><a href="<?php echo site_url('employee/index') ?>" class="nav-link" class="nav-link">Employee Attendance</a></li>
           </ul> 
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
            <li class="nav-item"><a href="<?php echo site_url('maintanance') ?>" class="nav-link">Maintanance Log</a></li>
          </ul>
        </li><!-- nav-item -->

      </ul>
    </div><!-- sh-sideleft-menu -->