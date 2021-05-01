<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $all['title'] , $title_active;?></title>
<link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/system/favicon.png')?>">

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css');?>">

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css');?>">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css');?>">

  <!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js');?>"></script>
<!-- CK Editor -->
<script src="<?php echo base_url('assets/bower_components/ckeditor/ckeditor.js');?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js');?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>

<!-- Region_district Adress -->
<script src="<?php echo base_url('assets/deesynertz/counrty_district_script.js');?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js');?>"></script>


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
    .color-palette {
      height: 35px;
      line-height: 35px;
      text-align: center;
    }

    .color-palette-set {
      margin-bottom: 15px;
    }

    .color-palette span {
      display: none;
      font-size: 12px;
    }

    .color-palette:hover span {
      display: block;
    }

    .color-palette-box h4 {
      position: absolute;
      top: 100%;
      left: 25px;
      margin-top: -40px;
      color: rgba(255, 255, 255, 0.8);
      font-size: 12px;
      display: block;
      z-index: 7;
    }
  </style>
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<?php if($this->session->userdata('logged_in') === TRUE): ?>
<body class="hold-transition fixed skin-red sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <header class="main-header">
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Blood</b>BMS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url('assets/images/users/'.$this->session->userdata('userPic')); ?>" class="img-circle">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu" id="notification_id"></li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-primary">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/images/users/'.$this->session->userdata('userPic')); ?>" class="user-image">
              <span class="hidden-xs"><?php echo $this->session->userdata('username');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/images/users/'.$this->session->userdata('userPic')); ?>" class="img-circle">

                <p>
                  <?php echo $this->session->userdata('lastname').', '. $this->session->userdata('firstname').' '. $this->session->userdata('midlename');?> - (<?php echo $this->session->userdata('actyName');?>)
                  <small> 
                    <?php if($this->session->userdata('usereg_at') == 'today'): ?>
                        You registered <?php echo $this->session->userdata('usereg_at');?>
                    <?php else: ?>
                        Member since <?php echo $this->session->userdata('usereg_at');?>
                    <?php endif; ?>
                  </small>
                </p>
              </li>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                <?php if($this->session->userdata('actyID') == 1):?>
                  <a href="<?php echo base_url('admin_prof');?>" class="btn btn-default btn-flat">Profile</a>
                <?php elseif($this->session->userdata('actyID') == 2):?>
                  <a href="<?php echo base_url('doctor_prof');?>" class="btn btn-default btn-flat">Profile</a>
                <?php elseif($this->session->userdata('actyID') == 3):?>
                  <a href="<?php echo base_url('labtech_prof');?>" class="btn btn-default btn-flat">Profile</a>
                <?php elseif($this->session->userdata('actyID') == 4):?>
                  <a href="<?php echo base_url('nurse_prof');?>" class="btn btn-default btn-flat">Profile</a>
                <?php else:?>
                  <a href="<?php echo base_url('donar_prof');?>" class="btn btn-default btn-flat">Profile</a>
                <?php endif;?>
                 
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('logout');?>" class="btn btn-default btn-flat">Sign Out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
<?php endif; ?>

 


<?php if($this->session->userdata('logged_in') !== TRUE): ?>
  <style type="text/css">
    .h_btm_bg {
        background: url('<?php echo base_url('assets/images/system/h_btm_bg.png'); ?>');
    }
      /*-- contact --*/
    section.contact-w3ls {
      background-color: #082A46;background-position:center;background-attachment:fixed;background-size:100% 100%;
      -webkit-background-size:100% 100%;-moz-background-size:100% 100%;-o-background-size:100% 100%;
      -ms-background-size:100% 100%;
    }
    section.contact-w3ls p.contact-agile1 {
        font-size: 15px;letter-spacing: 1px;font-weight: normal;padding-bottom: 10px;line-height: 29px;
        color: #ffffff;
    }
    section.contact-w3ls p.contact-agile1 strong {
      font-family: 'Federo', sans-serif;
      letter-spacing: 1.5px;color: #ffce14!important;
      font-size: 16px;
    }
    section.contact-w3ls p.contact-agile1 a {
      color:#fff;
    }
    section.contact-w3ls .contact-agileits,.contact-w3-agile1 {
      background-color: rgba(0, 0, 0, 0.40);
      padding: 10px 10px;
    }

    section.contact-w3ls h2{
      font-size:35px;letter-spacing: 1.5px;font-weight:normal;color:#ffffff;padding-bottom:20px;
      font-family: 'Federo', sans-serif;text-align:left;
    }

    section.contact-w3ls h3{
      font-size:35px;letter-spacing: 1.5px;font-weight:normal;color:#ffffff;padding-bottom:2px;
      font-family: 'Federo', sans-serif;text-align:left;
    }

    section.contact-w3ls h4{
      font-size:35px;letter-spacing: 1.5px;font-weight:normal;color:#ffffff;padding-bottom:20px;
      font-family: 'Federo', sans-serif;text-align:center;
    }

    section.contact-w3ls h5{
      font-size:16px;font-weight:normal;color:#ffffff;padding-bottom:10px;
      font-family: 'Federo', sans-serif;text-align:left;
    }

    section.contact-w3ls p.contact-agile2 {
      font-size:16px;font-weight:normal;padding-bottom:20px;
      line-height:30px;color:#ffce14;text-align:center;
    }

    section.contact-w3ls label.contact-p1 {
      font-size: 17px;letter-spacing: 1px;font-weight: 300;color:#ffffff;padding-bottom: 5px;
      font-family: 'Federo', sans-serif;
    }

    section.contact-w3ls .transparent-field {
      font-size:17px; font-weight:normal;
      color:#BCBABA;background-color:transparent;
      border-radius:0;border-color:#fff;
      font-family: 'Lato', sans-serif;
    }

    .contact-agileits {
        background-color: rgba(0, 0, 0, 0.40);
        padding: 10px 10px;
    }
  </style>
    
<body class="hold-transition fixed sidebar-mini skin-red layout-top-nav">
  <div class="wrapper h_btm_bg">
    <div class="content-wrapper">
      <header class="main-header">
        <nav class="navbar navbar-static-top layout-navbar-fixed">
          <div class="container">
            <div class="navbar-header">
              <a href="<?php echo base_url(); ?>" class="navbar-brand"><b>BB</b>MS</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="<?php if($title_active == 'Home'){ echo $all['active_class'];};?>"><a href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a></li>
                <li class="<?php if($title_active == 'Camps'){ echo $all['active_class'];};?>"><a href="<?php echo base_url('camps'); ?>">Camps</a></li>

                <li class="<?php if($title_active == 'Description'){ echo $all['active_class'];};?>"><a href="<?php echo base_url('description'); ?>">Description</a></li>


                <!-- <li class="dropdown <?php //if($title_active == 'Description'){ echo $all['active_class'];};?>">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php //echo base_url('description'); ?>">Description</a></li>
                    <li class="divider"></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#cus">Contact us</a></li>
                  </ul>
                </li> -->
              </ul>
            </div><!-- /.navbar-collapse -->
            
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <li class="dropdown tasks-menu">
                  <a href="<?php echo base_url('login') ;?>">Sign In</a>
                </li>
              </ul>
            </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper h_btm_bg">
            
        <!-- Content Header (Page header) -->
        <div class="container">
          <section class="content-header">
            <ol class="breadcrumb">
              <?php if($title_active == $all['main_p']):?>
                <li class="active"><i class="fa fa-dashboard"></i> <?= $title_active;?></li>
              <?php else: ?>
                <li class=""><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> <?= $all['main_p'];?></a></li>
                  <li class="active"><?= $title_active;?></li>
              <?php endif; ?>
            </ol>
          </section>
        </div>
  <?php endif; ?>

