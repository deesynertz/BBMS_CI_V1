
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title , $title_active;?></title>

  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/system/favicon.png')?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/deesynertz/css/deesynertz_style.css') ?>">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css') ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.flexslider.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>

<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>

<!-- InputMask -->
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    $('[data-mask]').inputmask()
 });
</script>

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition fixed sidebar-mini skin-red layout-top-nav ">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top layout-navbar-fixed">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url(); ?>" class="navbar-brand"><b>Blood</b>MS</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url('camps'); ?>">Camps</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url('description'); ?>">Description</a></li>
                <li class="divider"></li>
                <li><a href="#about">About</a></li>
                <li><a href="#cus">Contact us</a></li>
                <li><a href="<?php echo base_url('register'); ?>">Register</a></li>
                <li><a href="<?php echo base_url('donar'); ?>">Profile</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="">register</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
              </ul>
            </li>
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="" data-toggle='modal' data-target='#myModal' id="logbtn">Login</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper h_btm_bg">
    <div class="container">

      <?php $this->load->view('templates/login_session')?>

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <!-- Top Navigation
        <small>Example 2.0</small> -->
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> <?php echo $title_active;?></a></li>
          <!-- <li class="active">Top Navigation</li> -->
        </ol>
      </section>
      </div><!-- /.container -->

      <div class="container">
        <?php if($this->session->set_flashdata('user_registered')) : ?>
          <?php echo '<p class="alert alert-success">'.$this->session->set_flashdata('user_registered').'</p>'; ?>
        <?php endif; ?>
      <?php echo validation_errors(); ?>

      <?php echo form_open('pages/register'); ?>
        
         <div class="modal-body">
          <div class="form_group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" autocomplete="off">
          </div>

          <div class="form_group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" autocomplete="off">
          </div>

          <div class="form_group">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control" autocomplete="off">
          </div>

          <div class="form_group">
            <label>Password</label>
            <input type="Password" name="password" class="form-control" autocomplete="off">
          </div>

          <div class="form_group">
            <label>Confirm Password</label>
            <input type="Password" name="cpassword" class="form-control" autocomplete="off">
          </div>

          <div class="form_group">
            <label>Select Country </label>
            <select name="region" id="regionsel" size="1" class="form-control">
              <option value="" selected="selected">Select Region</option>
            </select>
          </div>
          <div class="form_group">
            <label>Select District </label>
            <select name="district" id="districtsel" size="1" class="form-control">
              <option value="" selected="selected">Please select Region first</option>
            </select>
          </div>
        </div>

        <button class="btn btn-primary pull-right" type="submit">Submit</button>
        
       
      <?php echo form_close(); ?>

       </div>

    </div><!-- /.content-wrapper .h_btm_bg-->
    <!-- FOOTER -->
    <?php  $this->load->view('templates/footer'); ?>
  </div><!-- ./wrapper -->

  <script type="text/javascript">

