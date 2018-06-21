<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('product') ?>" class="btn btn-secondary">
      <i class="fa fa-arrow-left"></i>&nbsp;Kembali
    </a> &nbsp;
      <a href="<?php echo base_url('brand/create') ?>" class="btn btn-success">
      <i class="fa fa-plus"></i>&nbsp;Tambah
    </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-table">&nbsp;</i>Daftar Merek Kendaraan</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Sub Dari Merek</th>
            <th>Jenis</th>
            <th width="20%">Kontrol</th>
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
                <a href="<?php echo base_url('brand/edit/' . $brand->id) ?>" class="btn btn-info">
                  <i class="fa fa-pencil"></i>&nbsp;Ubah
                </a>
                <a href="<?php echo base_url('brand/delete/' . $brand->id) ?>" class="btn btn-danger">
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
