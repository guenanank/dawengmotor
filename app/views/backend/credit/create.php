<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('credit') ?>" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i>&nbsp;Kembali
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-plus">&nbsp;</i>Tambah Merek Kendaraan
  </div>
  <div class="card-body">
    <?php echo form_open('credit/insert/') ?>

    <div class="form-row">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Nama Leasing', 'credit-lease_id') ?>
        <?php echo form_dropdown('lease_id', $leases, null, ['class' => 'form-control selectpicker', 'id' => 'credit-lease_id', 'title' => 'Pilih Leasing Pembayaran']) ?>
        <div class="small text-danger">
          <?php echo form_error('lease_id') ?>
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Tenor', 'credit-tenor') ?>
        <div class="input-group mb-3">
          <?php echo form_input(['name' => 'tenor', 'data-mask' => '00', 'id' => 'credit-tenor', 'class' => 'form-control', 'placeholder' => 'Tenor Kredit', 'value' => set_value('tenor')]) ?>
          <div class="input-group-append">
            <span class="input-group-text">Bulan</span>
          </div>
        </div>
        <div class="small text-danger">
          <?php echo form_error('tenor') ?>
        </div>
      </div>
    </div>

    <!-- <div class="form-row">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Persentase', 'credit-percentage') ?>
        <div class="input-group mb-3">
          <?php echo form_input(['name' => 'percentage', 'data-mask' => '00.00', 'id' => 'credit-percentage', 'class' => 'form-control', 'placeholder' => 'Persentase Kredit', 'value' => set_value('percentage')]) ?>
          <div class="input-group-append">
            <span class="input-group-text">%</span>
          </div>
        </div>
        <div class="small text-danger">
          <?php echo form_error('percentage') ?>
        </div>
      </div>
    </div> -->

    <!-- <div class="form-row">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Pajak', 'credit-tax') ?>
        <div class="input-group mb-3">
          <?php echo form_input(['name' => 'tax', 'data-mask' => '00.00', 'id' => 'credit-tax', 'class' => 'form-control', 'placeholder' => 'Pajak Kredit', 'value' => set_value('tax')]) ?>
          <div class="input-group-append">
            <span class="input-group-text">%</span>
          </div>
        </div>
        <div class="small text-danger">
          <?php echo form_error('tax') ?>
        </div>
      </div>
    </div> -->

    <div class="form-row">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Asuransi', 'credit-insurance') ?>
        <div class="input-group mb-3">
          <?php echo form_input(['name' => 'insurance', 'data-mask' => '00.00', 'id' => 'credit-insurance', 'class' => 'form-control', 'placeholder' => 'Asuransi Kredit', 'value' => set_value('insurance')]) ?>
          <div class="input-group-append">
            <span class="input-group-text">%</span>
          </div>
        </div>
        <div class="small text-danger">
          <?php echo form_error('insurance') ?>
        </div>
      </div>
    </div>

    <hr />
    <button type="submit" class="btn btn-primary">
      <i class="fa fa-save"></i>&nbsp;Simpan
    </button>&nbsp;
    <a href="<?php echo current_url() ?>" class="btn btn-secondary">
      <i class="fa fa-refresh"></i>&nbsp;Batal
    </a>

    <?php echo form_close() ?>
  </div>
</div>
