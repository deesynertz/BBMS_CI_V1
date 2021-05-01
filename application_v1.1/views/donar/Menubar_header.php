<div class="modal fade" id="username" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-remove text-danger"></i>
          </button>
          <h4 class="card-title">Edit <?php echo $this->session->userdata('actyName');?> Username</h4>
      </div>
        
      <div class="box-body">
        <form class="form-horizontal" action="<?php echo base_url('donar/editusername/'.$this->session->userdata('userID'));?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-4 control-label">Current Username</label>
              <div class="col-sm-8">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user text-yellow"></i></span>
                  <input type="text" value="<?php echo $this->session->userdata('username');?>" class="form-control" name="curr_username">
                  <span class="text text-danger"><?php echo form_error('curr_username');?></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">New Username</label>
              <div class="col-sm-8">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user text-green"></i></span>
                  <input type="text" class="form-control" name="new_username" id="new_username" placeholder="Enter new username">
                  <span class="text text-danger"><?php echo form_error('new_username');?></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Your Password</label>
              <div class="col-sm-8">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock text-green"></i></span>
                  <input type="password" name="currpassword" class="form-control" placeholder="current Password">
                  <span class="text text-danger"><?php echo form_error('currpassword');?></span>
                </div>
              </div>
            </div>
          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right" name="" id="">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editimage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-remove"></i>
          </button>
          <h4 class="card-title">Update <?php echo $this->session->userdata('actyName');?> Image</h4>
      </div>
      <div class="box-body">
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('donar/editimage/'.$this->session->userdata('userID'));?>">
          <div class="box-body">
            <div class="form-group">
               <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <label>Upload Image</label>
                    <input type="file" name="userimage" id="userimage">
                  </div>
                </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right" name="up_locationbtn" id="up_locationbtn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header info-box-text"><?= $this->session->userdata('actyName');?> menu</li>
        <li class="<?php if($title_active == 'Dashboard'){ echo $all['active_class'];};?>">
          <a href="<?php echo base_url('donar');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
        <?php if($title_active == 'Profile'):?>
        <li class="<?php if($title_active == 'Profile'){ echo $all['active_class'];};?>">
          <a href="<?php echo base_url('donar_prof');?>"><i class="fa fa-user"></i> <span>Profile</span></a>
        </li>
        <?php endif;?>
        <li class="<?php if($title_active == 'Donation'){ echo $all['active_class'];};?>">
          <a href="<?php echo base_url('donation');?>"><i class="glyphicon glyphicon-tint"></i> <span>Donation</span></a>
        </li>
        <li class="<?php if($title_active == 'Request'){ echo $all['active_class'];};?>">
          <a href="<?php echo base_url('request');?>"><i class="fa fa-plus"></i> <span>Request</span></a>
        </li>
        <li><a href="#">
            <i class="fa fa-envelope text-green"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a></li>
        <li class="header">TOOLS</li>
        
        <li><a href="#"><i class="fa fa-question text-aqua"></i> <span>FAQ</span></a></li>
        <li><a href="<?php echo base_url('lock');?>"><i class="fa fa-lock text-green"></i> <span>Lock screen</span></a></li>
        <li><a href="<?php echo base_url('logout');?>"><i class="fa fa-power-off text-red"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php 
          if($title_active !== $all['main_p']): ?>
            <?php echo $title_active; ?><small>Panel</small>
          <?php endif; ?>
      </h1>
      <ol class="breadcrumb">
        <?php if($title_active == 'Dashboard'){ ?>
          <li class="active"><i class="fa fa-dashboard"></i> <?= $title_active;?></li>
        <?php } else{ ?>
          <li class=""><a href="<?php echo base_url('donar'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active"><?= $title_active;?></li>
        <?php } ?>
      </ol>
      <div style="padding-top: 10px">
        <?php $this->load->View('templates/session_msg');?>
      </div>
    </section>