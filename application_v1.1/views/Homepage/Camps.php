<section class="content">
  <div class="container"> <h1>
        <?php 
          if($title_active !== $all['main_p']): ?>
            <?php echo $title_active; ?>
        <?php endif; ?>
      </h1>
    <div class="row">
     
      <?php foreach ($fetch_Camps as $camp) : ?>
        <div class="col-md-4">
          <div class="info-box bg-red">
            <span class="info-box-icon widget-user-image"><img class="img-circle img-bordered-sm" src="<?php echo base_url()?>/assets/images/upload/<?php echo $camp['camppic']; ?>" alt="Camp Avatar"></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $camp['campTitle']; ?></span>
              <span class="text text-black"><?php echo $camp['campaddress'];?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description"><a href="<?php echo site_url('pages/camps_view/'.$camp['campID'])?>" class="pull-right text-gray">More info <i class="fa fa-arrow-circle-right"></i></a></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>





