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
      <div class="form-group col-md-10">
        <?php echo form_label('Nama Leasing', 'credit-lease_id') ?>
        <?php echo form_dropdown('lease_id', $leases, [$credit->lease->id], ['class' => empty(form_error('lease_id')) ? 'form-control selectpicker' : 'form-control selectpicker is-invalid', 'id' => 'credit-lease_id', 'title' => 'Pilih Leasing Pembayaran']) ?>
        <div class="invalid-feedback">
          <?php echo form_error('lease_id') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-10">
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

    <!-- <div class="form-row mb-2">
      <div class="form-group col-md-10">
        <?php echo form_label('Persentase', 'credit-percentage') ?>
        <div class="input-group">
          <?php echo form_input(['name' => 'percentage', 'data-mask' => '00.00', 'id' => 'credit-percentage', 'class' => empty(form_error('percentage')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Persentase Kredit', 'value' => $credit->percentage]) ?>
          <div class="input-group-append">
            <span class="input-group-text">%</span>
          </div>
          <div class="invalid-feedback">
          <?php echo form_error('percentage') ?>
        </div>
        </div>
      </div>
    </div> -->

    <!-- <div class="form-row mb-2">
      <div class="form-group col-md-10">
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
      <div class="form-group col-md-10">
        <?php echo form_label('Asuransi', 'credit-insurance') ?>
        <div class="input-group">
          <?php echo form_input(['name' => 'insurance', 'data-mask' => '00.00', 'id' => 'credit-insurance', 'class' => empty(form_error('insurance')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Asuransi Kredit', 'value' => $credit->insurance]) ?>
          <div class="input-group-append">
            <span class="input-group-text">%</span>
          </div>
          <div class="invalid-feedback">
            <?php echo form_error('insurance') ?>
          </div>
        </div>
      </div>
    </div>
    <?php include APPPATH . 'views/backend/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
