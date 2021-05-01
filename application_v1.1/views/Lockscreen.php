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
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<style>
    .lockscreen{
        background-image: url(<?php echo base_url('assets/images/system/background_o1.jpg');?>);
        
        color: #CECED0;
    }
    .logo_screen a{
        color: #CECED0;
    }
</style>
<body class="hold-transition lockscreen" style="height: 300px">
<div class="lockscreen-wrapper"><br><br>
  
    <?php $this->load->view('templates/session_msg');?>
  
  <div class="lockscreen-logo logo_screen">
    <a class="text-white"><?=$all['title_full'];?></a>
    <!-- <p><small><i class="fa fa-lock text-center text-green"></i></small></p> -->
  </div>
  <div class="lockscreen-name"><?php echo $this->session->userdata('firstname').'&nbsp;'. $this->session->userdata('midlename').'&nbsp;'.$this->session->userdata('lastname');?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?php echo base_url('assets/images/users/'.$this->session->userdata('userPic')); ?>" alt="User Image">
    </div>

    <form class="lockscreen-credentials" method="post" action="<?php echo base_url('lock');?>">
       
      <div class="input-group">
        <input type="password" name="user_password" class="form-control" placeholder="password">
        <div class="input-group-btn">
          <?php if(form_error('user_password')):?>
            <button type="submit" class="btn" name="unlock_btn" value="submit"><i class="fa fa-unlock text-muted text-danger" data-toggle="tooltip" title="password required"></i></button>
          <?php else:?>
            <button type="submit" class="btn" name="unlock_btn" value="submit"><i class="fa fa-unlock-alt text-green"></i></button>
          <?php endif;?>
        </div>
      </div> 
    </form>

  </div>
  <div class="help-block text-center">
  
   <!--   message -->
  
  </div>
  <div class="text-center">
    <a href="<?php echo base_url('login');?>">Or sign in as a different user</a>
  </div>
  <div class="lockscreen-footer text-center">
   <strong>
        &copy; 2018 - <script> document.write(new Date().getFullYear()) </script> </strong>&nbsp;<b class="text-black">All Rights Reserved by</b><a href="https://bloodbankMS.co.tz">&nbsp;BBMS</a><br>
  </div>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url('bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>

</body>
</html>

