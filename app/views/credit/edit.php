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
    <i class="fa fa-pencil">&nbsp;</i>Ubah Merek Kendaraan
  </div>
  <div class="card-body">
    <?php echo form_open('credit/update/' . $credit->id) ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Nama Leasing', 'credit-lease_id') ?>
        <?php echo form_dropdown('lease_id', $leases, [$credit->lease->id], ['class' => empty(form_error('lease_id')) ? 'form-control selectpicker' : 'form-control selectpicker is-invalid', 'id' => 'credit-lease_id', 'title' => 'Pilih Leasing Pembayaran']) ?>
        <div class="invalid-feedback">
          <?php echo form_error('lease_id') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Tenor', 'credit-tenor') ?>
        <div class="input-group">
          <?php echo form_input(['name' => 'tenor', 'data-mask' => '00', 'id' => 'credit-tenor', 'class' => empty(form_error('tenor')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Tenor Kredit', 'value' => $credit->tenor]) ?>
          <div class="input-group-append">
            <span class="input-group-text">Bulan</span>
          </div>
          <div class="invalid-feedback">
            <?php echo form_error('tenor') ?>
          </div>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Administrasi', 'credit-administration') ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Rp.</span>
          </div>
          <?php echo form_input(['name' => 'administration', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'id' => 'credit-administration', 'class' => empty(form_error('administration')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Administrasi Kredit', 'value' => $credit->administration]) ?>
          <div class="invalid-feedback">
          <?php echo form_error('administration') ?>
        </div>
        </div>
      </div>
    </div>

    <!-- <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Pajak', 'credit-tax') ?>
        <div class="input-group">
          <?php echo form_input(['name' => 'tax', 'data-mask' => '00.00', 'id' => 'credit-tax', 'class' => empty(form_error('tax')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Pajak Kredit', 'value' => $credit->tax]) ?>
          <div class="input-group-append">
            <span class="input-group-text">%</span>
          </div>
          <div class="invalid-feedback">
          <?php echo form_error('tax') ?>
        </div>
        </div>
      </div>
    </div> -->

    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Asuransi', 'credit-insurance') ?>
        <div class="input-group">
          <?php echo form_input(['name' => 'insurance', 'data-mask' => '00.00', 'data-mask-reverse' => 'true', 'id' => 'credit-insurance', 'class' => empty(form_error('insurance')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Asuransi Kredit', 'value' => $credit->insurance]) ?>
          <div class="input-group-append">
            <span class="input-group-text">%</span>
          </div>
          <div class="invalid-feedback">
            <?php echo form_error('insurance') ?>
          </div>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Rata-rata Efektif', 'credit-effective_rate') ?>
        <div class="input-group">
          <?php echo form_input(['name' => 'effective_rate', 'data-mask' => '00.00', 'data-mask-reverse' => 'true', 'id' => 'credit-effective_rate', 'class' => empty(form_error('effective_rate')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Rata-rata Efektif Kredit', 'value' => set_value('effective_rate')]) ?>
          <div class="input-group-append">
            <span class="input-group-text">%</span>
          </div>
          <div class="invalid-feedback">
            <?php echo form_error('effective_rate') ?>
          </div>
        </div>
      </div>
    </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
