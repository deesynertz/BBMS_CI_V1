
<?php if ($fetch_data->num_rows() > 0) : ?>
  <div class="container">
    <div class="row">
      <?php foreach ($fetch_data->result() as $row) : ?>
        <?php if($row->pacatID == 1) : ?>
          <h1><img src='<?php echo base_url('assets/images/system/'.$row->pacontPic);?>'/></h1>   
          <div class="clear"></div> 
        <?php endif; ?>
      <?php endforeach; ?>
    </div> 

    <div class="col-md-12">
      <div class="row">
        <?php 
          foreach ($fetch_data->result() as $row) 
          {
            if($row->pacatID == 1)
            {
              echo $row->pacontDetails;
            } 
          } ?>
      </div>
    </div>  
    <div class="clear"></div>         
  </div><!-- /.container -->
 <?php endif; ?> 

  <!-- <div class="container main_cont">
    <section class="slider">
        <div style="font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">
          <?php //$this->load->view('templates/slides'); ?>
        </div>
    </section>
  </div> -->

  <div style="margin-bottom: 50px;"></div>
         
  <section class="content">
    <div class="container">
      <?php if ($fetch_data->num_rows() > 0) : ?>
        <div class="row">
          <div class="col-md-8 contact-w3-agile2 contact-agileits">
            <?php foreach ($fetch_data->result() as $row) : ?>
              <?php if($row->pacatID == 5) : ?>
                <h2 class="card-title bold"><?php echo $row->pacontTitle; ?></h2>
                  <?php echo $row->pacontDetails; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>

          <div class="col-md-4" data-aos="flip-right" id="cus">
            <?php foreach ($fetch_data->result() as $row) : ?>
                <?php if($row->pacatID == 2) : ?>
                  <!-- <div class="overlay"><i class="fa fa-user fa-spin"></i></div> -->
                  <h2 class="card-title bold"><?php echo $row->pacontTitle; ?></h2>
                  <!-- Info Boxes Style 2 -->
                  <marquee direction='up' scrolldelay='300'>
                    <table >
                      <div class='blog_desc'>
                        <div class='blog_heading'>
                          <?php echo $row->pacontDetails; ?>
                        </div>
                      </div>
                    </table>
                  </marquee>
                <?php endif; ?>
              <?php endforeach; ?>     
            </div> 
          </div>
        <?php endif; ?>
        
        <div class="clear"></div>

        <div class="row">
          <div class="col-md-8 contact-w3-agile2 contact-agileits">
            <h2>ABOUT US</h2>
              <?php if($fetch_data->num_rows() > 0) : ?>
                <?php foreach ($fetch_data->result() as $row) : ?>
                  <?php if($row->pacatID == 6) : ?>
                    <h2 class="card-title bold"><?php echo $row->pacontTitle; ?></h2>
                    <p style="text-align:justify"><img src='<?php echo base_url('assets/images/upload/'.$row->pacontPic);?>' height='150' style='margin-bottom:35px &quot' <strong>&#39;
                        <?php echo $row->pacontDetails; ?>
                    </p>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php endif; ?>
          </div>

          <div class="col-md-4" data-aos="flip-right" id="cus">
            <h3>Connect With Us</h3>
              <!-- Info Boxes Style 2 -->
              <?php if($fetch_galley->num_rows() >0) : ?>
                <?php foreach($fetch_galley->result() as $row) : ?>
                  <?php if($row->pacatID == 2) : ?>
                    <?php if($row->pammision == 1) : ?>
                      <div class="info-box mb-3 bg-info">
                        <div class="content">
                          <img src='<?php echo base_url('assets/images/upload/'.$row->pic);?>' width='300px' height='180px' class='tableborder'/>
                          <br/><br/>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php endif; ?>
            <!-- /.info-box --> 
          </div>
        </div>   
    </div>
  </section> <!-- /.row -->


    <!-- ================================================================================== -->

    <section class="content contact-w3ls">
      <div class="container">
        <div class="row">
          <div class="col-md-5 contact-w3-agile2 contact-agileits">
            <h2>Contact Us</h2>
            <form method="POST" action="<?php echo base_url()?>pages/form_validation?>">
              <!-- will show the message of sucess or error -->
              <?php 
                if ($this->uri->segment(0) == "inserted") 
                {
                  // base url - http://http://localhost/CI/
                  //redirect url - http://localhost/CI/main/inserted
                      //main - segment(1)
                      //inserted - segment(2)

                  echo '<p class="text-success"> Data Inserted </p>';

                } 
              ?>
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

          <div class="col-lg-2"></div>

          <div class="col-md-5" data-aos="flip-right" id="cus">
            <h3>Connect With Us</h3>
              <?php if ($connect_us->num_rows() > 0) : ?>
                <?php foreach ($connect_us->result() as $row) : ?>  
                  <?php if($row->pacatID == 4) : ?>
                    <h5 class='top'><?php echo $row->contusTitle;?></h5>
                    <p class='contact-agile1'><strong>Tel :</strong><?php echo $row->contusTitle;?></p>
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
              <?php endif; ?>
          </div>
        </div>
      </div>
    </section> <!-- /.row -->
    </div><!-- /.content-wrapper .h_btm_bg-->

