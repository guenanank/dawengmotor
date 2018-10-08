<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('product') ?>"
        class="btn btn-secondary"
        data-toggle="tooltip"
        data-placement="left"
        title="Kembali ke Daftar Produk">
      <i class="fa fa-arrow-left"></i>&nbsp;Kembali
    </a>&nbsp;
    <a href="<?php echo base_url('lease') ?>"
      class="btn btn-dark"
      data-toggle="tooltip"
      data-placement="top"
      title="Tambah Daftar Leasing">
      <i class="fa fa-list"></i>&nbsp;Daftar Leasing
    </a>&nbsp;
    <a href="<?php echo base_url('credit/create') ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Tambah&nbsp;<?php echo $title ?>">
      <i class="fa fa-plus"></i>&nbsp;Tambah
    </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-table">&nbsp;</i>Daftar&nbsp;<?php echo $title ?>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama Leasing</th>
            <th>Tenor</th>
            <th>Administrasi</th>
            <!-- <th>Pajak</th> -->
            <th>Asuransi</th>
            <th>Rata-rata Efektif</th>
            <th>Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nama Leasing</th>
            <th>Tenor</th>
            <th>Administrasi</th>
            <!-- <th>Pajak</th> -->
            <th>Asuransi</th>
            <th>Rata-rata Efektif</th>
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
                <?php echo $credit->tenor ?> Bulan
              </td>
              <td class="text-right">
                Rp. <?php echo $credit->administration ?>
              </td>
              <!-- <td class="text-center">
                <?php echo number_format($credit->tax, 2) ?>%
              </td> -->
              <td class="text-center">
                <?php echo number_format($credit->insurance, 2) ?>%
              </td>
              <td class="text-center">
                <?php echo number_format($credit->effective_rate, 2) ?>%
              </td>
              <td class="text-center">
                <a href="<?php echo base_url('credit/edit/' . $credit->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Ubah <?php echo $credit->lease->name ?>">
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
                <a href="<?php echo base_url('credit/delete/' . $credit->id) ?>" class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Hapus <?php echo $credit->lease->name ?>?">
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
