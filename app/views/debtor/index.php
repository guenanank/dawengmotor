<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('submission') ?>"
        class="btn btn-secondary"
        data-toggle="tooltip"
        data-placement="left"
        title="Kembali ke Daftar Pengajuan Kredit">
      <i class="fa fa-arrow-left"></i>&nbsp;Kembali
    </a>&nbsp;
    <a href="<?php echo base_url('debtor/create') ?>"
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
      <table class="table table-bordered table-sm table-hover" id="dataTable">
        <thead class="thead-light text-center">
          <tr>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Kontrol</th>
          </tr>
        </thead>
        <tfoot class="thead-light text-center">
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
                  <td class="text-center">
                    <a href="<?php echo base_url('debtor/edit/' . $debtor->id) ?>"
                      class="btn btn-info btn-sm"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Ubah <?php echo $debtor->fullname ?>">
                        <i class="fa fa-edit"></i>
                      </a>&nbsp;
                    <a href="<?php echo base_url('debtor/delete/' . $debtor->id) ?>"
                      class="btn btn-danger btn-sm delete"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Hapus <?php echo $debtor->fullname ?>?">
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
