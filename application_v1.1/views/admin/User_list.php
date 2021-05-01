<section class="content">
  <div class="row">
    <div class="col-md-12" style="margin-bottom: 10px">
      <div class="pull-right">
        <a href="<?php echo base_url('add_user');?>"><button type="button" class="btn btn-primary" data-toggle="tooltip" title="Add User"><i class="fa fa-user-plus"></i></button></a> 
      </div>
    </div>
  </div>
  <div class="box">
    <div class="box-body">
         <table id="userall" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Fullname</th>
              <th>Role</th>
              <th>Username</th>
              <th>Detail</th>
              <th style="width: 80px; text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($userlist as $row): ?>
            <tr>
              <td><?php echo $row['lastname'].',&nbsp;'.$row['firstname'].'&nbsp;&nbsp;'.$row['midlename'];?>
              </td>
              <td><?php if ($row['pammision'] == 1):?> 
                    <span class="text-green"><?php echo $row['actyName'];?> </span>
                  <?php else :?>
                    <span class="text-red" data-toggle="tooltip" title="Blocked"><?php echo $row['actyName'];?> </span>
                  <?php endif; ?>
              </td>
              <td><?php echo $row['username']; ?></td>
              
              <td></td>
              <td>
                <div class="color-palette">
                  <span class="bg-4">
                    <!-- <a href="" data-toggle="modal" data-target="#Authentication"><i class="fa fa-user text-green" data-toggle="tooltip" title="Authentication"></i></a>&nbsp; -->

                    <a href="#" class="reset_user" id="<?php echo $row['userID'];?>"><i class="glyphicon glyphicon-repeat text-blue" data-toggle="tooltip" title="Reset User"></i></a>&nbsp;

                    <a href="#" class="delete_record" id="<?php echo $row['userID'];?>"><i class="fa fa-trash-o text-red" data-toggle="tooltip" title="Delete"></i></a>&nbsp;

                    <?php if ($row['pammision'] == 1): ?> 
                        <a href="#" class="block_user" id="<?php echo $row['userID'];?>"><i class="fa fa-close text-red" data-toggle="tooltip" title="Block"></i></a>&nbsp;
                    <?php else : ?>
                        <a href="#" class="allow_user" id="<?php echo $row['userID'];?>"><i class="fa fa-check text-green" data-toggle="tooltip" title="allow"></i></a>
                    <?php endif; ?>
                  </span>
                </div>
              </td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>   
    </div>
    <div class="box-footer">

    </div>
  </div>
</section>




<script>
  $(document).ready(function(){

    $('#userall').DataTable({
      'paging'      : true,
      'ordering'    : false,
    });

     //reset_user cridential
    $('.reset_user').click(function () {
      var userID = $(this).attr("id");

      if(confirm("Are you sure you want to reset this ?")){

        window.location="<?php echo base_url();?>admins/reset_user/"+userID;
      }else{
        return false;
      }
    });

    //delete_record
    $('.delete_record').click(function () {
      var userID = $(this).attr("id");

      if(confirm("Are you sure you want to delete this?")){

        window.location="<?php echo base_url();?>admins/delete_user/"+userID;
      }else{
        return false;
      }
    });

    $('.block_user').click(function (){
      var userID = $(this).attr("id");
      if (confirm("Do you want to Block user?")) {
        window.location="<?php echo base_url();?>admins/block_user/"+userID;
      }else{
        return false;
      }
    });

    $('.allow_user').click(function (){
      var userID = $(this).attr("id");
      if (confirm("Do you want to Allow user?")) {
        window.location="<?php echo base_url();?>admins/allow_user/"+userID;
      }else{
        return false;
      }
    });

  });
</script>

