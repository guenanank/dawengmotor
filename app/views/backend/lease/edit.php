<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('lease') ?>" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i>&nbsp;Kembali
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-plus">&nbsp;</i>Ubah Leasing Pembayaran
  </div>
  <div class="card-body">
    <?php echo form_open('lease/update/' . $lease->id) ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-10">
        <?php echo form_label('Nama', 'lease-name') ?>
        <?php echo form_input(['name' => 'name', 'id' => 'lease-name', 'class' => empty(form_error('name')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Nama Leasing Pembayaran', 'value' => $lease->name]) ?>
        <div class="invalid-feedback">
          <?php echo form_error('name') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-10">
        <?php echo form_label('Keterangan', 'lease-description') ?>
        <?php echo form_textarea(['name' => 'description', 'id' => 'lease-description', 'class' => empty(form_error('description')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Keterangan Leasing Pembayaran', 'value' => $lease->description]) ?>
        <div class="invalid-feedback">
          <?php echo form_error('description') ?>
        </div>
      </div>
    </div>
    <?php include APPPATH . 'views/backend/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
