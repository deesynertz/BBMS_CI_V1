
<?php foreach ($fetch_data->result() as $row) : ?>
  <?php if($row->pacatID == 1) : ?>
    <section class="content">
      <div class="container">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <h2 class="card-title bold"><strong><?php echo $row->pacontTitle;?></strong></h2>
            <?php echo $row->pacontDetails; ?>
            <hr>
          </section>
        </div>
      </div>
    </section>
  <?php endif; ?>
<?php endforeach; ?>


  <section class="content">
    <div class="container">
      <div class="row">
        <section class="col-lg-8">
          <div class="row">
            <div class="col-md-12">
              <?php foreach ($fetch_data->result() as $row) : ?>
                <?php if($row->pacatID == 2) : ?>
                  <h2 class="card-title bold"><strong><?php echo $row->pacontTitle;?></strong></h2>
                    <?php echo $row->pacontDetails; ?>
                     <hr>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div> 

        <?php if($fetch_data->num_rows() > 0) : ?>
          <div class="row">
            <div class="col-md-12">
              <?php foreach ($fetch_data->result() as $row) : ?>
                <?php if($row->pacatID == 3) : ?> 
                 <h2 class="card-title bold"><strong><?php echo $row->pacontTitle;?></strong></h2>
                  <p style="text-align:justify"><img src='<?php echo base_url('assets/images/upload/'.$row->pacontPic);?>' height='150px'><?php echo $row->pacontDetails; ?>
                  </p>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
        </section>

        <section class="col-lg-4">
          <?php foreach ($fetch_data->result() as $row) : ?>
            <?php if($row->pacatID == 4) : ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-success contact-agileits" >
                     <div class="box-header">
                        <i class="fa fa-comments-o"></i>
                        <h2 class="box-title"><strong><?php echo $row->pacontTitle;?></strong></h2>
                      </div>
                      <div class="box-body" id="">
                        <div class="item">
                          <marquee direction='up' scrolldelay='300'>
                            <div class='blog_desc'>
                              <div class='blog_heading'>
                                <?php echo $row->pacontDetails; ?>
                              </div>
                            </div>
                          </marquee>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <hr>
            <?php endif; ?>
          <?php endforeach; ?> 
         
            <div class="row">
              <div class="col-md-12">
                <div class="post">
                  <h2 class="box-title"><strong>Gallery</strong></h2>
                  <div class="row margin-bottom">
                    <div class="col-sm-12">
                      <div class="row">
                        <?php foreach($fetch_galley->result() as $row) : ?>
                          <?php if($row->pacatID == 4) : ?>
                            <div class="col-sm-6 margin-bottom ">
                              <img class="img-responsive tableborder" src='<?php echo base_url('assets/images/upload/'.$row->pic);?>' style="width: 250px; height: 100px;">
                            </div>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
        </section>
      </div>
    </div>
  </section>

   <section class="content contact-w3ls">
    <div class="container">
      <div class="row">
        <section class="col-lg-6 contact-w3-agile2">
          <div class="box box-solid contact-agileits">
              <?php if ($connect_us->num_rows() > 0) : ?>
                 <div class="box-header">
                    <i class="fa fa-map-marker"></i> <h2 class="box-title">
                      Connect With Us
                    </h2>
                  </div>
                 <div class="box-body">
                <?php foreach ($connect_us->result() as $row) : ?>  
                  <?php if($row->pacatID == 6) : ?>
                    <h5 class='top'><?php echo $row->contusTitle;?></h5>
                    <p class='contact-agile1'><strong>Tel :</strong><?php echo $row->contusTell;?></p>
                    <p class='contact-agile1'><strong>Fax :</strong><?php echo $row->contusFax;?></p>
                    <p class='contact-agile1'><strong>Email :</strong><a href='#'><?php echo $row->contusEmail;?></a></p>
                    <p class='contact-agile1'><strong>Address :</strong><?php echo $row->contusMap;?></p>

                    <div class="mt-4 product-share">
                      <a href="<?php echo $row->contusFacebook;?>" class="text-gray"><i class="fab fa fa-facebook-square fa-2x"></i></a>
                      <a href="<?php echo $row->contusTwitter;?>" class="text-gray"><i class="fab fa fa-twitter-square fa-2x"></i></a>
                      <a href="<?php echo $row->contusInstagram;?>" class="text-gray"><i class="fas fa fa-instagram fa-2x"></i></a>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
              <?php endif; ?>
          </div>
        </section>

        <section class="col-lg-6 connectedSortable">
          <div class="row">
            <div class="col-md-12 contact-w3-agile2">
            
            <div class="box box-solid contact-agileits">
              <div class="box-header">
                    <i class="fa fa-envelope"></i> <h2 class="box-title">
                      Contact Us
                    </h2>
                  </div>
              <div class="box-body">
            <form method="POST" action="<?php echo base_url()?>pages/form_validation?>">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" name="full_name" class="form-control transparent-field" placeholder="full name" id="full_name">
                </div>
                <span class="text-danger"> <?php echo form_error("full_name"); ?></span>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" name="phonenumber" class="form-control transparent-field" placeholder="phonenumber">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <input type="email" name="email" class="form-control transparent-field" placeholder="email">
                </div>
              </div>
              <div class="form-group">
                <select class="form-control select2 transparent-field" style="width: 100%;" name="kind_of">
                  <option value="" selected="selected">select sategory</option>
                    <?php //if ($kind_content->num_rows() > 0) :?>
                      <?php //foreach ($kind_content->result() as $row): ?>
                        <option value="<?php //echo $row->kind_id;?>"><?php //echo $row->kind_type;?></option>
                      <?php //endforeach; ?>
                    <?php //endif;?> 
                </select>
              </div>
              <div class="form-group">
                <textarea name="subject" class="form-control transparent-field" rows="3" placeholder="Write to us ..."></textarea>
              </div>

              <input type="submit" name="addmessage" value="Send Now" class="btn btn-primary pull-right">
            </form>
          </div>
          </div>
          </div>
          </div>
        </section>


               

        
      </div>
    </div>
  </section>