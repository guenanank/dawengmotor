<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('brand') ?>" class="btn btn-secondary">
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
    <?php echo form_open('brand/insert/') ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-10">
        <?php echo form_label('Nama', 'brand-name') ?>
        <?php echo form_input(['name' => 'name', 'id' => 'brand-name', 'class' => empty(form_error('name')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Nama Merek Kendaraan', 'value' => set_value('name')]) ?>
        <div class="invalid-feedback">
          <?php echo form_error('name') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-10">
        <?php echo form_label('Sub Dari Merek', 'brand-sub_from') ?>
        <?php echo form_dropdown('sub_from', $parents, null, ['class' => empty(form_error('sub_from')) ? 'form-control selectpicker' : 'form-control selectpicker is-invalid', 'id' => 'brand-sub_from', 'title' => 'Pilih Merek Kendaraan']) ?>
        <div class="invalid-feedback">
          <?php echo form_error('sub_from') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-10">
        <?php echo form_label('Tipe', 'brand-type') ?>
        <?php echo form_dropdown('type', $types, null, ['class' => empty(form_error('type')) ? 'form-control selectpicker' : 'form-control selectpicker is-invalid', 'id' => 'brand-type', 'title' => 'Pilih Tipe Merek Kendaraan']) ?>
        <div class="invalid-feedback">
          <?php echo form_error('type') ?>
        </div>
      </div>
    </div>
    <?php include APPPATH . 'views/backend/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
