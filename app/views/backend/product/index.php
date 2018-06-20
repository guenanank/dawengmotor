<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('brand') ?>" class="btn btn-info">
        <i class="fa fa-tag"></i>&nbsp;Merek Kendaraan
      </a>&nbsp;
      <a href="<?php echo base_url('credit') ?>" class="btn btn-info">
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
            <th>Berkas</th>
            <th>Harga</th>
            <th width="20%">Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Foto</th>
            <th>Unit</th>
            <th>Berkas</th>
            <th>Harga</th>
            <th>Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($products as $product) {
              ?>
            <tr>
              <td></td>
              <td>
                <strong>
                    <?php echo sprintf('%s %s %s', ucwords($product->brand->type), $product->brand->name, $product->name) ?>
                 </strong>
                <div>Tahun: <?php echo $product->year ?> </div>
                <div>Warna: <?php echo $product->color ?></div>
                <div>No Mesin: <?php echo $product->engine_number ?></div>
                <div>No Rangka: <?php echo $product->frame_number ?></div>
              </td>
              <td>
                <div>No Polisi: <strong><?php echo $product->vehicle_id ?></strong></div>
                <div>Lokasi: <?php echo $product->vehicle_location ?></div>
                <div>BPKB: <?php echo $product->vehicle_book_owners ?></div>
                <div>STNK: <?php echo $product->vehicle_registration ?></div>
                <div>Pajak: <?php echo $product->vehicle_tax ?></div>
              </td>
              <td class="text-right" style="vertical-align: middle">
                <strong class="text-primary">Rp. <?php echo number_format($product->price) ?></strong>
              </td>
              <td class="text-center" style="vertical-align: middle">
                <a href="<?php echo base_url('product/edit/' . $product->id) ?>" class="btn btn-info">
                      <i class="fa fa-pencil"></i>&nbsp;Ubah
                    </a><br /><br />
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
