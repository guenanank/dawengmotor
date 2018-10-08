<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('product') ?>"
        class="btn btn-secondary"
        data-toggle="tooltip"
        data-placement="left"
        title="Kembali ke Unit Produk">
      <i class="fa fa-arrow-left"></i>&nbsp;Kembali
    </a> &nbsp;
      <a href="<?php echo base_url('brand/create') ?>"
        class="btn btn-success"
        data-toggle="tooltip"
        data-placement="top"
        title="Tambah&nbsp;<?php echo $title ?>">
      <i class="fa fa-plus"></i>&nbsp;Tambah
    </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-table"></i>&nbsp;Daftar&nbsp;<?php echo $title ?>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Sub Dari Merek</th>
            <th>Jenis</th>
            <th>Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nama</th>
            <th>Sub Dari Merek</th>
            <th>Jenis</th>
            <th>Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($brands as $brand) {
              ?>
          <tr>
            <td>
              <?php echo $brand->name ?>
            </td>
            <td class="text-center">
              <?php echo isset($brand->parent) ? $brand->parent->name : null ?>
            </td>
            <td class="text-center">
              <?php echo ucwords($brand->type) ?>
            </td>
            <td class="text-center">
              <a href="<?php echo base_url('brand/edit/' . $brand->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Ubah <?php echo $brand->name ?>">
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
              <a href="<?php echo base_url('brand/delete/' . $brand->id) ?>" class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Hapus <?php echo $brand->name ?>?">
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
