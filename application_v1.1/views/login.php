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

  <style type="text/css">
    body {
    font-family: 'Varela Round', sans-serif;
    background-color: #CCC;
  }
  .modal-login {    
    color: #636363;
    width: 350px;
  }
  .modal-login .modal-content {
    padding: 20px;
    border-radius: 5px;
    border: none;
  }
  .modal-login .modal-header {
    border-bottom: none;   
        position: relative;
        justify-content: center;
  }
  .modal-login h4 {
    text-align: center;
    font-size: 26px;
    margin: 30px 0 -15px;
  }
  .modal-login .form-control:focus {
    border-color: #70c5c0;
  }
  .modal-login .form-control, .modal-login .btn {
    min-height: 40px;
    border-radius: 3px; 
  }
  .modal-login .close {
        position: absolute;
    top: -5px;
    right: -5px;
  } 
  .modal-login .modal-footer {
    background: #ecf0f1;
    border-color: #dee4e7;
    text-align: center;
        justify-content: center;
    margin: 0 -20px -20px;
    border-radius: 5px;
    font-size: 13px;
  }
  .modal-login .modal-footer a {
    color: #999;
  }   
  .modal-login .avatar {
    position: absolute;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: -70px;
    width: 95px;
    height: 95px;
    border-radius: 50%;
    z-index: 9;
    background: #60c7c1;
    padding: 15px;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
  }
  .modal-login .avatar img {
    width: 100%;
  }
  .modal-login.modal-dialog {
    margin-top: 80px;
  }
    .modal-login .btn {
        color: #fff;
        border-radius: 4px;
    background: #60c7c1;
    text-decoration: none;
    transition: all 0.4s;
        line-height: normal;
        border: none;
    }
  .modal-login .btn:hover, .modal-login .btn:focus {
    background: #45aba6;
    outline: none;
  }
  .trigger-btn {
    display: inline-block;
    margin: 100px auto;
  }
</style>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="modal-dialog modal-login">
    <div class="modal-content">
      <div class="modal-header">
        <div class="avatar">
          <img src="<?php echo base_url().'assets/images/system/favicon.png';?>">
        </div>        
        <h4 class="modal-title">Start Session</h4> 
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'auth/loginfunction';?>" method="post">
           <div class="form-group">
            <?php $this->load->view('templates/session_msg')?>
          </div>
          <div class="form-group">
            <span class="text text-danger"><?php echo form_error('user_name'); ;?></span>
            <input type="text" value="<?php echo set_value('user_name');?>" class="form-control" name="user_name" placeholder="Username">   
          </div>
          <div class="form-group">
            <span class="text text-danger"><?php echo form_error('user_password'); ;?></span>
            <input type="password" value="<?php echo set_value('user_password');?>" class="form-control" name="user_password" placeholder="Password"> 
          </div>        
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Sign In</button>
            <br>
            <td>Alison1&nbsp;&nbsp;&nbsp;123456&nbsp;&nbsp;Admin</td>
            <br>
            <td>Audax4&nbsp;&nbsp;&nbsp;123456&nbsp;&nbsp;Donar</td>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <a href="#">Forgot Password?</a>
      </div>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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
  $(document).ready(function(){

    setInterval(function(){
      remove_alert();
    }, 4000);

    function remove_alert(){
         $(".alert").fadeTo(250,0).slideDown(250, function(){
            $(this).remove();
        }); 
    }
  });
</script>
</body>