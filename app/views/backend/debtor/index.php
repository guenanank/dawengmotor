<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('submission') ?>" class="btn btn-secondary">
      <i class="fa fa-arrow-left"></i>&nbsp;Kembali
    </a>&nbsp;
    <a href="<?php echo base_url('debtor/create') ?>" class="btn btn-success">
      <i class="fa fa-plus"></i>&nbsp;Tambah
    </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-table">&nbsp;</i>Daftar Debitur</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama Lengkap</th>
            <th>Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nama Lengkap</th>
            <th>Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($debtors as $debtor) {
              ?>
                <tr>
                  <td><?php echo $debtor->fullname ?></td>
                </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
