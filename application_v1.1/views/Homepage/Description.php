
<section class="content">
  <div class="container">
    <div class="row">
      <section class="col-lg-12">
        <?php foreach ($fetch_data->result() as $descRow) : ?>
          <?php if($descRow->pacatID == 7) : ?>
            <h1 style="text-transform: uppercase;"><?php echo $descRow->pacontTitle;?></h1>
            <?php echo $descRow->pacontDetails;?>
          <?php else: ?>

          <?php endif;?>
        <?php endforeach; ?>
        <!-- <div class="error-page">
              <h2 class="headline text-red">500</h2>

              <div class="error-content">
                <h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong.</h3>

                <p>
                  We will work on fixing that right away.
                  Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
                </p>

                <form class="search-form">
                  <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">

                    <div class="input-group-btn">
                      <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div> -->
      </section>
    </div>
  </div>
</section>

