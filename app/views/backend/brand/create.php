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

    <div class="form-row">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Nama', 'brand-name') ?>
        <?php echo form_input(['name' => 'name', 'id' => 'brand-name', 'class' => 'form-control', 'placeholder' => 'Nama Merek Kendaraan', 'value' => set_value('name')]) ?>
        <div class="small text-danger">
          <?php echo form_error('name') ?>
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Sub Dari Merek', 'brand-sub_from') ?>
        <?php echo form_dropdown('sub_from', $parents, null, ['class' => 'form-control selectpicker', 'title' => 'Pilih Merek Kendaraan']) ?>
        <div class="small text-danger">
          <?php echo form_error('sub_from') ?>
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Tipe', 'brand-type') ?>
        <?php echo form_dropdown('type', $types, null, ['class' => 'form-control selectpicker', 'title' => 'Pilih Tipe Merek Kendaraan']) ?>
        <div class="small text-danger">
          <?php echo form_error('type') ?>
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
