<section class="content">
  <div class="row">
    <div class="col-md-12" style="margin-bottom: 10px">
      <div class="pull-right">
        <button type="button" class="btn btn-primary">Request</button> 
      </div>
    </div>
  </div>
  
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"><?=$title_active;?> Details</h3>
    </div>
    <div class="box-body">
      <table id="requesttab" class="table table-striped table-bordered">
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
                      echo $year; ?>        
                </td>
                <td><?php echo $row['bgroupName']; ?></td>
                <td><?php echo $row['units']; ?></td>
                 <td><?php $DOB = explode('-', $row['requestes_at']);
                      echo $DOB[2].'/'.$DOB[1].'/'.$DOB[0];
                   ?></td>
                <td><?php echo $row['request_detail']; ?></td>
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

    $('#requesttab').DataTable({
      'paging'      : true,
      'ordering'    : false,
    });

  });
</script>