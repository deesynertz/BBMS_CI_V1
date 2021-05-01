<div class="modal fade" id="username" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-remove text-danger"></i>
          </button>
          <h4 class="card-title">Edit <?php echo $this->session->userdata('actyName');?> Username</h4>
      </div>
        
      <div class="box-body">
        <form class="form-horizontal" action="<?php echo base_url('admins/editusername/'.$this->session->userdata('userID'));?>" method="post">
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

<div class="modal fade" id="catshow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="card-title">Categories</h4>
      </div>
        
      <div class="box-body">
        <label for="inputEmail3" class="col-sm-6 control-label">ADD NEW CATEGORY</label>
        <form class="form-horizontal" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
              <div class="col-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-folder-open text-green"></i></span>
                  <input type="text" class="form-control" name="category" id="category" placeholder="Enter category name">
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-info pull-right add_cat" name="add_cat">Submit</button>
          </div>
        </form>
        <hr>
        <label for="inputEmail3" class="col-sm-6 control-label">CATEGORY PRESENT</label>
        <table id="categorytable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>State</th>
              <th style="width: 80px; text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pages_category as $row): ?>  
            <tr>
              <td><?php echo $row['pacatID'];?></td>
              <td><?php echo $row['pacatName'];?></td>
              <td><span class="badge bg-green">active</span></td>
              <td>
                <a href="#" class=""><i class="fa fa-edit text-blue" data-toggle="tooltip" title="Edit"></i></a>&nbsp;

                <a href="#" class="delete_cat" id="<?php echo $row['pacatID'];?>"><i class="fa fa-trash text-red" data-toggle="tooltip" title="Remove"></i></a>&nbsp;

                <a href="#" class=""><i class="fa fa-check text-green" data-toggle="tooltip" title="allow"></i></a>&nbsp;

                <a href="#" class=""><i class="fa fa-close text-red" data-toggle="tooltip" title="Block"></i></a>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
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
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('admins/editimage/'.$this->session->userdata('userID'));?>">
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
            <input type="submit" class="btn btn-info pull-right" value="Submit" name="uploadimg" id="up_locationbtn">
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
          <a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
        <?php if($title_active == 'Profile'):?>
        <li class="<?php if($title_active == 'Profile'){ echo $all['active_class'];};?>">
          <a href="<?php echo base_url('admin_prof');?>"><i class="fa fa-user"></i> <span>Profile</span></a>
        </li>
        <?php endif;?>
        <li class="treeview <?php if($title_active == 'User_list' || $title_active == 'Adduser'){ echo $all['active_class'];};?>">
          <a href="">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($title_active == 'User_list'){ echo $all['active_class'];};?>"><a href="<?php echo base_url('user_list');?>"><i class="glyphicon glyphicon-user text-green"></i> All user</a></li>
            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-edit text-aqua"></i> Modify user
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="glyphicon glyphicon-ban-circle text-blue"></i> Disable</a></li>
                <li><a href="#"><i class="fa fa-trash text-red"></i> Delete</a></li>
              </ul>
            </li>
            <li><a href="#"><i class="glyphicon glyphicon-repeat text-yellow"></i> Restore</a></li>
          </ul>
        </li>
        <li class="treeview <?php if($title_active == 'Content' || $title_active == 'Category' || $title_active =='Edit_Content'  || $title_active == 'Gallery'){ echo $all['active_class'];};?>">
          <a href="#">
            <i class="fa fa-desktop"></i> <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($title_active == 'Category'){ echo $all['active_class'];};?>">
              <a href="#" data-toggle="modal" data-target="#catshow"><i class="glyphicon glyphicon-folder-open text-green"></i> <span> Category</span>
                <span class="pull-right-container">
              <!-- <small class="label pull-right bg-yellow" data-toggle="tooltip" title="Disabled">12</small> -->
              <!-- <small class="label pull-right bg-green" data-toggle="tooltip" title="Up">16</small> -->
                  <small class="label pull-right bg-blue" data-toggle="tooltip" title="active"><?php echo $countTotal['tpcategory'];?></small>
                </span>
              </a>
            </li>
            <li class="<?php if($title_active == 'Content' || $title_active =='Edit_Content'){ echo $all['active_class'];};?>">
              <a href="<?php echo base_url('content');?>"><i class="fa fa-files-o text-yellow"></i> <span> Content</span>
                <span class="pull-right-container">
                  <!-- <small class="label pull-right bg-yellow">12</small> -->
                  <small class="label pull-right bg-green" data-toggle="tooltip" title="active"><?php if($countTotal['taContent'] != 0){
                    echo $countTotal['taContent'];
                  }else{
                    echo 0;
                  }?></small>
                  <small class="label pull-right bg-red" data-toggle="tooltip" title="blocked"><?php if($countTotal['tbContent'] != 0){
                    echo $countTotal['tbContent'];
                  }else{
                    echo 0;
                  }?></small>
                </span>
              </a>
            </li>
            <li class="<?php if($title_active == 'Gallery'){ echo $all['active_class'];};?>">
              <a href="<?php echo base_url('gallery');?>"><i class="fa fa-file-picture-o text-aqua"></i> <span> Gallery</span>
                <span class="pull-right-container">
                  <!-- <small class="label pull-right bg-yellow">12</small> -->
                  <small class="label pull-right bg-green" data-toggle="tooltip" title="active"><?php if($countTotal['taGalley'] != 0){
                    echo $countTotal['taGalley'];
                  }else{
                    echo 0;
                  }?></small>
                  <small class="label pull-right bg-red" data-toggle="tooltip" title="blocked"><?php if($countTotal['tbGalley'] != 0){
                    echo $countTotal['tbGalley'];
                  }else{
                    echo 0;
                  }?></small>
                </span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="">
            <i class="fa fa-envelope text-green"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
       <li class="header">TOOLS</li>
       
        <li><a href="#"><i class="fa fa-question text-aqua"></i> <span>FAQ</span></a></li>
        <li><a href="#"><i class="fa fa-gear text-yellow"></i> <span>Setting</span></a></li>
        <li><a href="<?php echo base_url('lock');?>"><i class="fa fa-lock text-green"></i> <span>Lock screen</span></a></li>
        <li><a href="<?php echo base_url('logout');?>"><i class="fa fa-power-off text-red"></i> <span>Sign Out</span></a></li>
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
          <li class=""><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active"><?= $title_active;?></li>
        <?php } ?>
      </ol>
      <div style="padding-top: 10px">
        <?php $this->load->View('templates/session_msg');?>
      </div>
    </section>



<script>
 $(function(){

    //add category
    $('.add_cat').click(function (){
      var category = $('#category').val();
      window.location="<?php echo base_url();?>admins/content/add_category/"+category;
    });

    //Delete category
    $('.delete_cat').click(function (){
     var pacatID = $(this).attr("id");
      if (confirm("Do you want to Remove Category ?")) {
        window.location="<?php echo base_url();?>admins/content/delete_cat/"+pacatID;
      }else{
        return false;
      }
    });



 });
</script>
    