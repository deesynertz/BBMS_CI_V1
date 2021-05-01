
    <section class="content">
      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <a data-toggle="modal" data-target="#editimage"><small>
                  <span class="glyphicon glyphicon-edit pull-right" data-toggle="tooltip" title="image"></span>
              </small> </a>
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/images/users/'.$this->session->userdata('userPic'));?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $this->session->userdata('lastname').', '. $this->session->userdata('firstname').' '. $this->session->userdata('midlename');?></h3>


              <a data-toggle="modal" data-target="#username"><small>
                  <span class="glyphicon glyphicon-edit pull-right" data-toggle="tooltip" title="username"></span>
              </small> </a>
              <p class="text-muted text-center"><?php echo $this->session->userdata('username');?></p>

              <ul class="list-group list-group-unbordered">
                <?php if($this->session->userdata('userEmail') != ""): ?>
                  <li class="list-group-item">
                    <b><strong><i class="fa fa-envelope"></i> Email: </strong></b> <a class="pull-right"><?php echo $this->session->userdata('userEmail');?></a>

                  </li>
                <?php endif;?>
                <?php if($this->session->userdata('usermobile') != ""): ?>
                  <li class="list-group-item">
                    <b><strong><i class="fa fa-phone"></i> Phone: </strong></b> <a class="pull-right"><?php echo $this->session->userdata('usermobile');?></a>
                  </li>
                <?php endif; ?>

                <li class="list-group-item">
                  <b>Blood Group:</b> <a class="pull-right"><span class="badge bg-blue"><?= $this->session->userdata('bgroupName');?></span></a>
                </li>
                
                <li class="list-group-item">
                  <b>Total Blood Unit</b> <a class="pull-right"><?= $this->session->userdata('units');?> Bags</a>
                </li>
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-calendar margin-r-5"></i> Date of Birth</strong>
              <p class="text-muted">&nbsp;&nbsp;&nbsp;&nbsp;<?= $this->session->userdata('DOB');?>
              <hr>
              <?php if($this->session->userdata('usereg_at') == 'today'): ?>
                <strong><i class="fa fa-registered margin-r-5"></i> You registered</strong>
                <p class="text-muted">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('usereg_at');?></p>
              <?php else: ?>
                <strong><i class="fa fa-registered margin-r-5"></i> Member since</strong>
                <p class="text-muted">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->session->userdata('usereg_at');?> </p>
              <?php endif; ?>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                <?php if ($this->session->userdata('userdistrict') == false): ?>
                  <p class="text-muted"></p>
                <?php else:?>
                  <p class="text-muted">&nbsp;&nbsp;&nbsp;&nbsp;<?= $this->session->userdata('userdistrict');?>
                <?php endif; ?>

                <?php if ($this->session->userdata('userregion') == false): ?>
                  </p>
                <?php else:?>
                  <?= ', '.$this->session->userdata('userregion');?></p>
                <?php endif; ?>
              <hr>

              <!-- <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p> 
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>-->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url('assets/images/users/'.$this->session->userdata('userPic'));?>" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url('assets/images/users/'.$this->session->userdata('userPic'));?>" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <form class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9">
                        <input class="form-control input-sm" placeholder="Response">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url('assets/images/users/'.$this->session->userdata('userPic'));?>" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Posted 5 photos - 5 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
                    <div class="col-sm-6">
                      <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                          <br>
                          <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                          <br>
                          <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="<?php echo base_url('donar/editUsewImg');?>" method="POST">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-4">
                          <input type="text" name="firstname" class="form-control" value="<?php echo $this->session->userdata('firstname');?>" placeholder="Firstname">
                        </div>
                        <div class="col-sm-4">
                          <input type="text" name="midlename" class="form-control" value="<?php echo $this->session->userdata('midlename');?>" placeholder="Middlename">
                        </div>
                        <div class="col-sm-4">
                          <input type="text" name="lastname" class="form-control" value="<?php echo $this->session->userdata('lastname');?>" placeholder="Lastname">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Mobile</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-4">
                          <input type="text" name="phone" class="form-control" value="<?php echo $this->session->userdata('usermobile');?>" data-inputmask='"mask": "9999-999-999"' data-mask>
                        </div>
                        <label for="inputName" class="col-sm-2 control-label">Username</label>
                         <div class="col-sm-6">
                          <input type="text" name="username" class="form-control" value="<?php echo $this->session->userdata('username');?>">
                         </div>
                        </div> 
                      </div>
                    </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" name="email" value="<?php echo $this->session->userdata('userEmail');?>" class="form-control" id="inputEmail" placeholder="Email Address">
                      <span class="text text-danger"><?php echo form_error('email');?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Address <small><i class="glyphicon glyphicon-asterisk text-red"></i></small></label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-6">
                          <select name="region" value="<?php echo $this->session->userdata('userregion');?>" id="regionsel" size="1" class="form-control select2" style="width: 100%;">
                            <option><?php echo $this->session->userdata('userregion');?></option>
                          </select>
                        </div>
                        <div class="col-sm-6">
                          <select name="district" id="districtsel" size="1" class="form-control select2" style="width: 100%;">
                            <option><?php echo $this->session->userdata('userdistrict');?></option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-sm-2 control-label">Password to verify is you</label>
                    <div class="col-sm-10">
                      <input type="password" name="currpassword" class="form-control" placeholder="current Password">
                      <span class="text text-danger"><?php echo form_error('currpassword');?></span>
                    </div>
                  </div>
<!--                   <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div> -->
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <label><small><i class="glyphicon glyphicon-asterisk text-red"></i></small> Means Mandatory</label>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" required> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
