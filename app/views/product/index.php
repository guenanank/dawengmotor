<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('brand') ?>"
        class="btn btn-dark"
        data-toggle="tooltip"
        data-placement="left"
        title="Daftar Merek Kendaraan">
        <i class="fa fa-tag"></i>&nbsp;Merek Kendaraan
      </a>&nbsp;
      <a href="<?php echo base_url('credit') ?>"
        class="btn btn-dark"
        data-toggle="tooltip"
        data-placement="bottom"
        title="Daftar Simulasi Angsuran">
        <i class="fa fa-area-chart"></i>&nbsp;Simulasi Angsuran
      </a>&nbsp;
      <a href="<?php echo base_url('product/create') ?>"
        class="btn btn-success"
        data-toggle="tooltip"
        data-placement="bottom"
        title="Tambah&nbsp;<?php echo $title ?>">
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
      <table class="table table-bordered table-sm table-hover" id="dataTable">
        <thead class="thead-light text-center">
          <tr>
            <th scope="col">Foto</th>
            <th scope="col">Unit</th>
            <th scope="col">Uang Muka</th>
            <th scope="col">Harga</th>
            <th scope="col">Kontrol</th>
          </tr>
        </thead>
        <tfoot class="thead-light text-center">
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
                  $photo = empty($product->photos) ? 'assets/img/no-image.jpg' : $product->photos[0]['caption'];
                  echo img(['src' => $this->image->thumbnail($photo, 130), 'class' => 'img-fluid rounded mx-auto d-block']);
                ?>
              </td>
              <td>
                <strong><?php echo sprintf('%s %s', $parent_brand[$product->brand->sub_from], $product->brand->name) ?></strong><br />
                <?php echo word_limiter($product->description, 13) ?>
              </td>
              <td class="text-right">
                <strong class="text-primary">Rp. <?php echo $product->down_payment ?>.-</strong>
              </td>
              <td class="text-right">
                <strong class="text-primary">Rp. <?php echo $product->price ?>.-</strong>
              </td>
              <td class="text-center">
                <a href="<?php echo base_url('product/edit/' . $product->id) ?>"
                  class="btn btn-info btn-sm"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="Ubah <?php echo $product->brand->name ?>">
                      <i class="fa fa-edit"></i>
                    </a>&nbsp;
                <a href="<?php echo base_url('product/delete/' . $product->id) ?>"
                  class="btn btn-danger btn-sm delete"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="Hapus <?php echo $product->brand->name ?>?">
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
