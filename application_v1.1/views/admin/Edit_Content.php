<section class="content">
  <div class="row">
    <div class="col-md-12" style="margin-bottom: 10px">
       <div class="pull-left">
        <a href="<?php echo base_url('content');?>"><button type="button" class="btn btn-primary">
          <i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>
       </div>
      <div class="pull-right">
        <a href="" data-toggle="modal" data-target="#catshow"><button type="button" class="btn btn-success">Category</button></a>
      </div>
    </div>
  </div>
  <div class="box">
    <div class="box-body">
      <div class="box box-info">
        <div class="box-body pad">
          <form method="post" action="<?php echo base_url('admins/editcontent/'.$this->uri->segment(3));?>">
            <div class="form-group">   
              <label>Please select Category first <small><i class="glyphicon glyphicon-asterisk text-red"></i></small></label>
              <select name="pacatID" value="" id="districtsel" size="1" class="form-control select2" style="width: 100%;">
                <option value="S" selected="selected">Select Category</option>
                <?php foreach($pages_category as $row):?>
                    <option value="<?php echo $row['pacatID'];?>"><?php echo $row['pacatName'];?></option>
                <?php endforeach;?>
              </select>
            </div>
           
            <?php foreach ($pagecontbyID as $row) : ?>
              <div class="form-group">
                <label>Tittle <small><i class="glyphicon glyphicon-asterisk text-red"></i></small></label>
                <input type="text" name="pacontTitle" value="<?php echo $row['pacontTitle'];?>" class="form-control" placeholder="Page Title">
                <span class="text text-red"><?php echo form_error('pacontTitle');?>
              </div>
              <div class="form-group">
                <textarea id="editor" class="form-control" name="pacontDetails" rows="10" cols="80">
                  <?php echo $row['pacontDetails']?>
                </textarea>
              </div>
              <span class="text text-red"><?php echo form_error('pacontDetails');?></span>
            <?php endforeach;?>
            <div class="box-footer clearfix">
              <button type="Submit" class="pull-right btn btn-primary" name="pacontID">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="box-footer">

    </div>
  </div>
</section>