<section class="content">
  <div class="row">
    <div class="col-md-12" style="margin-bottom: 10px">
      <div class="pull-right">
        <a href="" data-toggle="modal" data-target="#catshow"><button type="button" class="btn btn-success">Category</button></a>
        <a href="<?php echo base_url('addcontent');?>"><button type="button" class="btn btn-success">Add Content</button></a>
      </div>
    </div>
  </div>
  <div class="box">
    <div class="box-body">
         <table id="contentall" class="table table-striped table-bordered">
          <thead>
            <tr>
  <!-- pacatID pacontTitle pacontDetails pacontPic papamission posted_date -->
              <th>Category</th>
              <th>Tittle</th>
              <th>Details</th>
              <th>Image</th>
              <th>At</th>
              <th style="width: 100px;">Action</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($pages_content as $row): ?>
            <tr>
              <td><?php echo $row['pacatName'];?></td>
              <td><?php if ($row['papamission'] == 1):?> 
                    <span class="text-green"><?php echo $row['pacontTitle'];?> </span>
                  <?php else :?>
                    <span class="text-red" data-toggle="tooltip" title="Blocked"><?php echo $row['pacontTitle'];?> </span>
                  <?php endif; ?>
              </td>
              <td><?php echo $row['pacontDetails'];?></td>
              <td>image</td> 
              <td><?php echo $row['posted_date']; ?></td>
              <td>
                <div class="color-palette">
                  <span class="bg-4">
                    <a href="" data-toggle="modal" data-target="#"><i class="fa fa-eye text-green" data-toggle="tooltip" title="view"></i></a>&nbsp;

                    <a href="<?php echo base_url('admins/editcontent/'.$row['pacontID']);?>"><i class="fa fa-edit text-blue" data-toggle="tooltip" title="Update"></i></a>&nbsp;

                     <a href="" class="delete_content" id="<?php echo $row['pacontID'];?>"><i class="fa fa-trash text-red" data-toggle="tooltip" title="Delete"></i></a>&nbsp;

                    <?php if ($row['papamission'] == 1): ?> 
                        <a href="#" class="block_content" id="<?php echo $row['pacontID'];?>"><i class="fa fa-close text-red" data-toggle="tooltip" title="Block"></i></a>&nbsp;
                    <?php else : ?>
                        <a href="#" class="allow_content" id="<?php echo $row['pacontID'];?>"><i class="fa fa-check text-green" data-toggle="tooltip" title="allow"></i></a>
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

    $('#contentall').DataTable({
      'paging'      : true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    });

    //delete_record
    $('.delete_content').click(function () {
      var pacontID = $(this).attr("id");
      if(confirm("Are you sure you want to delete this?")){
        window.location="<?php echo base_url();?>admins/content/delete_content/"+pacontID;
      }else{
        return false;
      }
    });

    //block content
    $('.block_content').click(function (){
      var pacontID = $(this).attr("id");
      if (confirm("Do you want to Block content?")) {
        window.location="<?php echo base_url();?>admins/content/block_content/"+pacontID;
      }else{
        return false;
      }
    });

    //allow content
    $('.allow_content').click(function (){
      var pacontID = $(this).attr("id");
      if (confirm("Do you want to Allow content?")) {
        window.location="<?php echo base_url();?>admins/content/allow_content/"+pacontID;
      }else{
        return false;
      }
    });

  });
</script>