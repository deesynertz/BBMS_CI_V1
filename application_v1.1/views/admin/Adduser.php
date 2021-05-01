<section class="content">
  <div class="row">
    <div class="col-md-12" style="margin-bottom: 10px">
      <div class="pull-left">
         <a href="<?php echo base_url('user_list');?>"><button type="button" class="btn btn-primary">
         	<i class="glyphicon glyphicon-arrow-left"></i> Back</button></a>  
      </div>
    </div>
  </div>
  <div class="box">
    <div class="box-body">
  		<form class="" action="<?php echo base_url('add_user');?>" method="POST">
  			<label><h4>Basic Information </h4></label>
			<div class="form-group ">
				<div class="col-sm-12 margin-bottom">
				  	<div class="row">
					    <div class="col-sm-4">
					    	<label>Firstname <small><i class="glyphicon glyphicon-asterisk text-red"></i></small></label>
					      	<input type="text" name="firstname" class="form-control" value="<?php echo set_value('firstname');?>" placeholder="Firstname">
					      	<span class="text text-danger"><?php echo form_error('firstname');?></span>
					    </div>
					    <div class="col-sm-4">
					    	<label>Middlename </label>
					      <input type="text" name="midlename" class="form-control" value="<?php echo set_value('midlename');?>" placeholder="Middlename">
					      <span class="text text-danger"><?php echo form_error('midlename');?></span>
					    </div>
					    <div class="col-sm-4">
					    	<label>Lastname <small><i class="glyphicon glyphicon-asterisk text-red"></i></small></label>
					      <input type="text" name="lastname" class="form-control" value="<?php echo set_value('lastname');?>" placeholder="Lastname">
					      <span class="text text-danger"><?php echo form_error('lastname');?></span>
					    </div>
				  </div>
				</div>
			</div>


			<div class="form-group">
				<div class="col-sm-12 margin-bottom">
				  	<div class="row">
					    <div class="col-sm-4">
					    	<label>Gender <small><i class="glyphicon glyphicon-asterisk text-red"></i></small></label>
					      	<select name="gender" class="form-control select2" style="width: 100%;" value="<?php echo set_value('gender');?>">
	                     		<option value="none">Select gender </option>
	                     		<option value="M">Male</option>
	                     		<option value="F">Female</option>
	                        </select>
					    </div>
				    	<div class="col-sm-4">
			                <label>DOB </label>

			                <div class="input-group date">
			                  <div class="input-group-addon">
			                    <i class="fa fa-calendar"></i>
			                  </div>
			                  <input type="text" value="<?php echo set_value('DOB');?>" name="DOB" class="form-control pull-right" id="datepicker">
			                  <span class="text text-danger"><?php echo form_error('DOB');?></span>
			                </div>
                        </div>
					 
					</div>
				</div>
			</div>
			<hr>

			<label><h4>Contact Information </h4></label>

			<div class="form-group">
				<div class="col-sm-12 margin-bottom">
				  	<div class="row">
				    	<div class="col-sm-3">
				    		<label>Mobile </label>
				    		<div class="input-group">
					    		<div class="input-group-addon">
				                    <i class="fa fa-phone"></i>
				                  </div>
						    	
						      	<input type="text" name="mobile" class="form-control" value="<?php echo set_value('mobile');?>" data-inputmask='"mask": "9999-999-999"' data-mask>
					      </div>
                        </div>
					    <div class="col-sm-3">
					    	<label>Email <small><i class="glyphicon glyphicon-asterisk text-red"></i></small></label>
					      	<input type="text" name="email" value="<?php echo set_value('userEmail');?>" class="form-control" id="inputEmail" placeholder="Email Address">
                      		<span class="text text-danger"><?php echo form_error('email');?></span>
					    </div>
					    <div class="col-sm-3">
					    	<label>Region <small><i class="glyphicon glyphicon-asterisk text-red"></i></small></label>
					      	<select name="region" value="<?php echo set_value('region');?>" id="regionsel" size="1" class="form-control select2" style="width: 100%;">
				              <option value="S" selected="selected">Select Region</option>
				            </select>
                      		<span class="text text-danger"><?php echo form_error('region');?></span>
					    </div>
					    <div class="col-sm-3">
					    	<label>District </label>
					      	<select name="district" value="<?php echo set_value('district');?>" id="districtsel" size="1" class="form-control select2" style="width: 100%;">
				              <option value="S" selected="selected">select Region first</option>
				            </select>
                        </div>
					</div>
				</div>
			</div>

			<label><h4>Other </h4></label>
			<div class="form-group">
				<div class="col-sm-12 margin-bottom">
				  	<div class="row">
				    	<div class="col-sm-4">
					    	<label>User access Type </label>
					      	<select name="actyID" value="<?php echo set_value('district');?>" id="districtsel" size="1" class="form-control select2" style="width: 100%;">
					      		<option value="S" selected="selected">select</option>
					      		<?php foreach($accatype as $row):?>
					      		<option value="<?php echo $row['actyID'];?>"><?php echo $row['actyName'];?></option>
					      		<?php endforeach;?>
				            </select>
                        </div>
					</div>
				</div>
			</div>

			<div class="form-group">
			<div class="col-sm-12">
				<label>Note any field have <small><i class="glyphicon glyphicon-asterisk text-red"></i></small> must be field before send data to the database </br>
				Then check the box below</label>
			  <div class="checkbox">
			    <label>
			      <input type="checkbox" required><a href="#">Please fill all required field</a>
			    </label>
			  </div>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-10">
			  <button type="submit" class="btn btn-danger">Submit</button>
			</div>
			</div>
		</form>
    </div>
    <div class="box-footer">

    </div>
    
  </div>
</section>