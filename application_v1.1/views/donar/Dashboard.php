 <section class="content">
      <div class="box">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#Request_Details" data-toggle="tab">Request Details</a></li>
            <li><a href="#Donation_Details" data-toggle="tab">Donation Details</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="Request_Details">
              <div class="box-header">
                <h3 class="box-title">Request Details</h3>
              </div>
              <div class="box-body">
                <table id="requesttab" class="table table-striped">
                  <thead>
                    <tr>
                      <th>Fullname</th>
                      <th>Gender</th>
                      <th>Age</th>
                      <th>BGroup</th>
                      <th>Unit</th>
                      <th>Req at</th>
                      <th>Detail</th>
                      <th style="width: 10px; text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($fetch_request as $row) : ?>
                        <tr>
                          <td><?php echo $row['firstname'].' '.$row['midlename'].' '.$row['lastname']; ?></td>
                          <td><?php echo $row['gender']; ?></td>
                          <td><?php $DOB = $row['DOB'];
                                    $yearDOB = explode("-", $DOB);
                                    $year     = date('Y')-$yearDOB[0];
                              echo $year; ?></td>
                          <td><?php echo $row['bgroupName']; ?></td>
                          <td><?php echo $row['units']; ?></td>
                          <td>
                           <?php echo $row['requestes_at']; ?></td>
                          <td><?php echo $row['request_detail']; ?></td>
                          <td> <a href=""><div class="text-blue color-palette"><span class="btn btn-primary"><i class="fa fa-eye"></i></span></div></a></i></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Fullname</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>BGroup</th>
                        <th>Unit</th>
                        <th>Req at</th>
                        <th>Detail</th>
                        <th style="width: 10px; text-align: center;">Action</th>
                      </tr>
                    </tfoot>
                </table>
              </div>
            </div><!-- # Request_Details -->

            <div class="tab-pane" id="Donation_Details">
              <div class="box-header">
                <h3 class="box-title">Donation Details</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <table id="donationtab" class="table table-striped">
                  <thead>
                      <tr>
                        <th>Camp</th>
                        <th>At</th>
                        <th>Progress</th>
                        <th>Detail</th>
                        <th>More</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php foreach($fetch_donation as $row) : ?>
                      <tr>
                        <td><?php echo $row['campTitle']; ?></td>
                        <td><?php echo $row['donated_at']; ?></td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <?php $prog = ($row['units']*20);
                              if($prog <= 20) { ?>
                                <div class="progress-bar progress-bar-yellow" style="width: <?php echo $prog;?>%"><span class="badge bg-yellow"><?php echo $prog;?>%</span></div>
                            <?php }else if($prog <= 60)
                              { ?>
                                <div class="progress-bar progress-bar-primary" style="width: <?php echo $prog;?>%"></div>
                              <?php }else{ ?>
                              <div class="progress-bar progress-bar-success" style="width: <?php echo $prog;?>%"></div>
                            <?php } ?>
                          </div>
                        </td>
                        <td><?php echo $row['blood_detail']; ?></td>
                        <td><i class="btn btn-primary fa fa-eye"></i></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
 </section>