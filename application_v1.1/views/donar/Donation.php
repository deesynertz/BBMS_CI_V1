 <section class="content">
     <div class="box">
      	<div class="box-header with-border">
          <h3 class="box-title"><?=$title_active;?> Details</h3>
        </div>
        <div class="box-body">
        	<table id="donationtab" class="table table-striped table-bordered">
            <thead>
                <tr>
                  <th>Camp</th>
                  <th>At</th>
                  <th>Progress</th>
                  <th>Detail</th>
                  <th style="width: 10px; text-align: center;">More</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach($fetch_donation as $row) : ?>
                <tr>
                  <td><?php echo $row['campTitle']; ?></td>
                  <td><?php $DOB = explode('-', $row['donated_at']);
                      echo $DOB[2].'/'.$DOB[1].'/'.$DOB[0];
                   ?></td>
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
         <div class="box-footer">

         </div>
    </div>
</section>


<script>
  $(document).ready(function(){

    $('#donationtab').DataTable({
      'paging'      : true,
      'ordering'    : false,
    });

  });
</script>