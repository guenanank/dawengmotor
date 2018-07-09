<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('brand') ?>" class="btn btn-dark">
        <i class="fa fa-tag"></i>&nbsp;Merek Kendaraan
      </a>&nbsp;
      <a href="<?php echo base_url('credit') ?>" class="btn btn-dark">
        <i class="fa fa-area-chart"></i>&nbsp;Simulasi Angsuran
      </a>&nbsp;
      <a href="<?php echo base_url('product/create') ?>" class="btn btn-success">
        <i class="fa fa-plus"></i>&nbsp;Tambah
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-table">&nbsp;</i>Daftar Unit Produk</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Foto</th>
            <th>Unit</th>
            <th>Uang Muka</th>
            <th>Harga</th>
            <th>Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Foto</th>
            <th>Unit</th>
            <th>Uang Muka</th>
            <th>Harga</th>
            <th>Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach ($products as $product) {
                ?>
            <tr>
              <td>
                <?php
                  if(empty($product->photos)) {
                      echo img(['src' => 'assets/img/no-image.jpg', 'width' => 130, 'class' => 'img-fluid rounded mx-auto d-block']);
                  } else {
                      $thumb = $product->photos[array_rand($product->photos)];
                      echo img(['src' => $this->image->thumbnail($thumb, 130), 'class' => 'img-fluid rounded mx-auto d-block']);
                  }
                ?>
              </td>
              <td>
                <strong><?php echo sprintf('%s %s', $parent_brand[$product->brand->sub_from], $product->brand->name) ?></strong><br />
                <?php echo word_limiter($product->description, 13) ?>
              </td>
              <td class="text-right">
                <h5><strong class="text-primary">Rp. <?php echo $product->down_payment ?>.-</strong></h5>
              </td>
              <td class="text-right">
                <h5><strong class="text-primary">Rp. <?php echo $product->price ?>.-</strong></h5>
              </td>
              <td class="text-center">
                <a href="<?php echo base_url('product/edit/' . $product->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Ubah <?php echo $product->brand->name ?>">
                      <i class="fa fa-edit"></i>
                    </a>&nbsp;
                <a href="<?php echo base_url('product/delete/' . $product->id) ?>" class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Hapus <?php echo $product->brand->name ?>?">
                      <i class="fa fa-trash"></i>
                    </a>
              </td>
            </tr>
            <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
