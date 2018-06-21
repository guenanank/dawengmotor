<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('product') ?>" class="btn btn-secondary">
      <i class="fa fa-arrow-left"></i>&nbsp;Kembali
    </a>&nbsp;
    <a href="<?php echo base_url('lease') ?>" class="btn btn-dark">
      <i class="fa fa-list"></i>&nbsp;Daftar Leasing
    </a>&nbsp;
    <a href="<?php echo base_url('credit/create') ?>" class="btn btn-success">
      <i class="fa fa-plus"></i>&nbsp;Tambah
    </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-table">&nbsp;</i>Daftar Simulasi Angsuran</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama Leasing</th>
            <th>Uang Muka</th>
            <th>Tenor</th>
            <th>Persentase</th>
            <th>Pajak</th>
            <th width="20%">Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nama Leasing</th>
            <th>Uang Muka</th>
            <th>Tenor</th>
            <th>Persentase</th>
            <th>Pajak</th>
            <th>Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($credits as $credit) {
              ?>
            <tr>
              <td>
                <?php echo $credit->lease->name ?>
              </td>
              <td class="text-center">
                <?php echo number_format($credit->down_payment, 1) ?>%
              </td>
              <td class="text-center">
                <?php echo $credit->tenor ?> Bulan
              </td>
              <td class="text-center">
                <?php echo number_format($credit->percentage, 1) ?>%
              </td>
              <td class="text-center">
                <?php echo number_format($credit->tax, 1) ?>%
              </td>
              <td class="text-center">
                <a href="<?php echo base_url('credit/edit/' . $credit->id) ?>" class="btn btn-info">
                  <i class="fa fa-pencil"></i>&nbsp;Ubah
                </a>
                <a href="<?php echo base_url('credit/delete/' . $credit->id) ?>" class="btn btn-danger">
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
