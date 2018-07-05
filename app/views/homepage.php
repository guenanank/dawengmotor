<div id="carouselIndicators" class="carousel slide my-4" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <?php
      foreach ($products as $index => $product) {
        ?>
      <div class="carousel-item <?php echo $index == 0 ? 'active' : null ?>">
        <?php
                $photo = $product->photos[array_rand($product->photos)];
                echo img(['src' => $this->image->crop($photo, 900, 350), 'class' => 'd-block img-fluid']);
            ?>
      </div>
      <?php
        if($index == 2) {
          break;
        }
      }
    ?>

  </div>
  <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
  <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
</div>

<div class="row">

  <?php
        foreach ($products as $product) {
          ?>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <a href="<?php echo base_url('item/preview/' . $product->id) ?>">
          <?php
                      $photo = $product->photos[array_rand($product->photos)];
                      echo img(['src' => $this->image->crop($photo, 700, 400), 'class' => 'card-img-top']);
                ?>
        </a>
        <div class="card-body">
          <h4 class="card-title">
                  <a href="<?php echo base_url('item/preview/' . $product->id) ?>">
                    <?php echo $product->brand->name ?>
                  </a>
                </h4>
          <h5>Rp. <?php echo $product->price ?></h5>
          <p class="card-text">
            <?php echo $product->description ?>
          </p>
        </div>
        <div class="card-footer">
          <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>
      </div>
    </div>
    <?php
        }
      ?>
</div>
<!-- /.row -->
