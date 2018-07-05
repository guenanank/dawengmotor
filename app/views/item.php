<div class="card mt-4">
  <?php
      $photo = $product->photos[array_rand($product->photos)];
      echo img(['src' => $this->image->crop($photo, 900, 400), 'class' => 'card-img-top img-fluid']);
  ?>
  <div class="card-body">
    <h3 class="card-title">
      <?php echo $product->brand->name ?>
    </h3>
    <h4>Rp. <?php echo $product->price ?></h4>
    <p class="card-text"><?php echo $product->description ?></p>
    <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
    4.0 stars
  </div>
</div>
<!-- /.card -->
<div class="mb-10">&nbsp;</div>
<!-- <div class="card card-outline-secondary my-4">
  <div class="card-header">
    Product Reviews
  </div>
  <div class="card-body">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
    <small class="text-muted">Posted by Anonymous on 3/1/17</small>
    <hr>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
    <small class="text-muted">Posted by Anonymous on 3/1/17</small>
    <hr>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
    <small class="text-muted">Posted by Anonymous on 3/1/17</small>
    <hr>
    <a href="#" class="btn btn-success">Leave a Review</a>
  </div>
</div> -->
<!-- /.card -->
