
    
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url()?>/assets/images/upload/<?php echo $fetch_Camp['camppic']; ?>" alt="Camp Avatar">

              <h3 class="profile-username text-center"><?php echo $fetch_Camp['campTitle']; ?></h3>
              <p class="text-muted text-center"><?php echo $fetch_Camp['campaddress']; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Organised by</b> <a class="pull-right"><?php echo $fetch_Camp['organised_by']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>District</b> <a class="pull-right"><?php //echo $fetch_Camp['campaddress'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Total Donar</b> <a class="pull-right">13,287</a>
                </li>
                 <li class="list-group-item">
                  <b>More:</b> <a class="pull-right"><?php $detail = explode(',',$fetch_Camp['campDetail']); 
                  if(!$detail[0] == '')
                  {
                      if(!$detail[1] == "")
                      {
                        if (!$detail[2] == "") 
                        {
                          $data = $detail[0]."<br>".$detail[1]."<br>";
                        }else{
                         $data = $detail[0]."<br>".$detail[1];
                        }
                      }else{
                        $data = $detail[0]."<br>";
                      }
                    }else{
                        "&nbsp;";
                    }

                    echo $data;
                    ?>
                    </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php //echo $fetch_Camp['campTitle']; ?> Camp</h3>
            </div>
            <div class="box-body">
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
              <p class="text-muted"></p>
              <hr>
            </div>
          </div> -->
        </div>

        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">

              </div>

              <div class="tab-pane" id="timeline">

              </div>

              <div class="tab-pane" id="settings">

              </div>
            </div><!-- /.tab-content -->
          </div><!-- /.nav-tabs-custom -->
        </div> <!-- /.col-md-8-->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.content-wrapper .h_btm_bg-->
      <!-- FOOTER -->

