 </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>V</b> 1.1
    </div>
    <strong>
        &copy; 2018 - <script> document.write(new Date().getFullYear()) </script> </strong>All Rights Reserved by <a href="https://bloodbankMS.co.tz">BBMS</a>.
        </p><!--<p class="title">Design by Dee'synerTz LTD Co</p>-->
      
  </footer>

<!-- HUSIFUTE -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
<!-- /. HUSIFUTE -->

</div>
<!-- ./wrapper -->


<!--//////////////////////////-->

<!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li> -->
                <!-- inner menu: contains the actual data -->
               <!--  <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul> -->
<!--/////////////////////////-->


<script>
  $(document).ready(function(){
    //call function

    setInterval(function(){
      remove_alert();
    }, 4000);

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true, format: 'yyyy-mm-d'
    })

     //Initialize Select2 Elements
    $('.select2').select2()
    $('[data-mask]').inputmask()


    $('#categorytable').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    })


    function remove_alert(){
         $(".alert").fadeTo(250,0).slideDown(250, function(){
            $(this).remove();
        }); 
    }


    function shownotfication(actyID) {
      $.ajax({
        url: '<?php echo base_url()?>admins/shownotfication',
        method:"POST",
        data:{action:actyID},
        success: function(data) {
          $('#notification_id').html(data); 
        },
        error: function() {
          alert('Could not get data from the database');
        }

      });
    }
  })
</script>
<script>
  $(function () {
    // Replace the <textarea id="editor"> with a CKEditor
    CKEDITOR.replace('editor',{
      height: 400,
      filebrowserUploadUrl: '<?php echo site_url('admins/upload_CKeditor') ?>'
    })
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
</body>
</html>
