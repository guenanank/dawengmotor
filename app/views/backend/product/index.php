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
            <th>Unit</th>
            <th>Keterangan</th>
            <th>Harga</th>
            <th width="20%">Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Unit</th>
            <th>Keterangan</th>
            <th>Harga</th>
            <th>Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($products as $product) {
              ?>
            <tr>
              <td>
                <strong>
                    <?php echo sprintf('%s %s', ucwords($product->brand->type), $product->brand->name) ?>
                 </strong>
              </td>
              <td><?php echo $product->description ?></td>
              <td class="text-right">
                <strong class="text-primary">Rp. <?php echo number_format($product->price) ?></strong>
              </td>
              <td class="text-center">
                <a href="<?php echo base_url('product/edit/' . $product->id) ?>" class="btn btn-info">
                      <i class="fa fa-pencil"></i>&nbsp;Ubah
                    </a>&nbsp;
                <a href="<?php echo base_url('product/delete/' . $product->id) ?>" class="btn btn-danger">
                      <i class="fa fa-trash"></i>&nbsp;Hapus
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
