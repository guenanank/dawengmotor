<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('credit') ?>" class="btn btn-secondary">
      <i class="fa fa-arrow-left"></i>&nbsp;Kembali
    </a> &nbsp;
    <a href="<?php echo base_url('lease/create') ?>" class="btn btn-success">
      <i class="fa fa-plus"></i>&nbsp;Tambah
    </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-table">&nbsp;</i>Daftar Leasing Pembayaran</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($leases as $lease) {
              ?>
            <tr>
              <td>
                <?php echo $lease->name ?>
              </td>
              <td>
                <?php echo $lease->description ?>
              </td>
              <td class="text-center">
                <a href="<?php echo base_url('lease/edit/' . $lease->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Ubah <?php echo $lease->name ?>">
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
                <a href="<?php echo base_url('lease/delete/' . $lease->id) ?>" class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Hapus <?php echo $lease->name ?>">
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
