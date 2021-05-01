<section class="content">
  <div class="row">
  	<div class="col-md-8">
	    <div class="box box-success">
        <div class="box-body">
        	<table id="galleytab" class="table table-striped table-bordered">
            <thead>
                <tr>
    							<th>Category</th>
    							<th>Picture</th>
    							<th>Posted at</th>
    							<th>status</th>
    							<th style="width: 90px; text-align: center;">More</th>
                </tr>
            </thead>
		        <tbody>
		        <?php foreach($gallery as $row) : ?>
		          <tr>
          			<td><?php echo $row['pacatName']; ?></td>
	            	<td style="width: 150px;"><img class="img-responsive tableborder" src='<?php echo base_url('assets/images/upload/'.$row['pic'])?>' style="width: 150px; height: 120px;">
                </td>
	            	<td><?php echo $row['posted_at'];?></td>
	            	<td><?php if ($row['pammision'] == 1): ?>
				            	<span class="badge bg-green">active</span>
				            <?php else: ?>
				            	<span class="badge bg-red">Disabled</span>
				            <?php endif;?>
	            	</td>
	            	<td>

                   <a href="#" class="edit_gallery" id="<?php echo $row['galleryID'];?>"><i class="fa fa-edit text-blue" data-toggle="tooltip" title="Edit"></i></a>&nbsp;

	                <a href="#" class="delete_gallery" id="<?php echo $row['galleryID'];?>"><i class="fa fa-trash text-red" data-toggle="tooltip" title="Remove"></i></a>&nbsp;

	                <?php if ($row['pammision'] == 1): ?>
	                	<a href="#" class="block_gallery" id="<?php echo $row['galleryID'];?>"><i class="fa fa-close text-red" data-toggle="tooltip" title="Block"></i></a>
	                <?php else: ?>
	                	<a href="#" class="allow_gallery" id="<?php echo $row['galleryID'];?>"><i class="fa fa-check text-green" data-toggle="tooltip" title="allow"></i></a>&nbsp;
	                <?php endif;?>
	              </td>
        		  </tr>
		        <?php endforeach;?>
		        </tbody>
	        </table>
	    	</div>
      </div>
	  </div><!-- /.Left div-->
	  <div class="col-md-4">
	    <div class="box box-success">
        <div class="content">
          <label>ADD NEW IMAGE</label>
          <form action="<?php echo base_url('admins/gallery/add_gallery');?>" enctype="multipart/form-data" class="form-horizontal" method="post">
            <div class="form-group">
              <label class="col-sm-2 control-label">Image</label>
              <div class="col-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-file-picture-o text-green"></i></span>
                  <input type="file" class="form-control" name="file_name" id="file_name">
                </div>
              </div>
            </div>
            <label><strong>Note</strong><br>This will add image in gallery but by default will disabled until you allow it!!</label>
            <div class="box-footer">
              <input type="submit" class="btn btn-success pull-right add_gallery" value="Submit" name="addimage">
            </div>
          </form>
        </div> 
      </div>
      
      <?php if($gallerybyID != false):?>
        <div class="box box-success" id="edit_gallery_div">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Image</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div> 
          </div>
          <form action="<?php echo base_url('admins/gallery/edit_gallery/'.$this->uri->segment(4).'/upload');?>" enctype="multipart/form-data" class="form-horizontal" method="post">
            <div class="box-body">
              <div class="col-sm-4 margin-bottom">
                <img class="img-responsive tableborder" src='<?php echo base_url('assets/images/upload/'.$gallerybyID);?>' style="width: 250px; height: 80px;">
              </div>
              <div class="col-sm-8 margin-bottom ">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-file-picture-o text-green"></i></span>
                    <input type="file" class="form-control" name="file_name" id="file_name">
                  </div>
                </div>
                <div class="box-footer">
                <input type="submit" class="btn btn-info pull-right" value="Update" name="Update">
              </div>
            </div>
          </form>
        </div>
      <?php endif;?>
      

      <div class="box box-info">
        <div class="content">
          
        </div>
      </div>
	  </div><!-- /.right div-->
  </div><!-- /.row one-->
</section>


<script>
  $(document).ready(function(){

    $('#galleytab').DataTable({
      'paging'      : true,
      'ordering'    : false,
    });

    //edit_gallery
    $('.edit_gallery').click(function () {
      var galleryID = $(this).attr("id");
      window.location="<?php //echo base_url();?>admins/gallery/edit_gallery/"+galleryID;
    });


	 //delete_gallery
    $('.delete_gallery').click(function () {
      var galleryID = $(this).attr("id");
      if(confirm("Are you sure you want to delete this Picture ?")){
        window.location="<?php echo base_url();?>admins/gallery/delete_gallery/"+galleryID;
      }else{
        return false;
      }
    });

    //block galley
    $('.block_gallery').click(function (){
      var galleryID = $(this).attr("id");
      if (confirm("Do you want to Disanable This picture ?")) {
        window.location="<?php echo base_url();?>admins/gallery/block_gallery/"+galleryID;
      }else{
        return false;
      }
    });

    //allow galley
    $('.allow_gallery').click(function (){
      var galleryID = $(this).attr("id");
      if (confirm("Do you want to Enable This picture ?")) {
        window.location="<?php echo base_url();?>admins/gallery/allow_gallery/"+galleryID;
      }else{
        return false;
      }
    });

   




  });
</script>