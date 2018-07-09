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
    <i class="fa fa-pencil">&nbsp;</i>Ubah Merek Kendaraan
  </div>
  <div class="card-body">
    <?php echo form_open('brand/update/' . $brand->id) ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Nama', 'brand-name') ?>
        <?php echo form_input(['name' => 'name', 'id' => 'brand-name', 'class' => empty(form_error('name')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Nama Merek Kendaraan', 'value' => $brand->name]) ?>
        <div class="invalid-feedback">
          <?php echo form_error('name') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Sub Dari Merek', 'brand-sub_from') ?>
        <select name="sub_from" class="form-control selectpicker<?php echo empty(form_error('sub_from')) ? null : ' is-invalid' ?>" id="brand-sub_from" title="Pilih Merek Kendaraan">
        <?php
          foreach ($parents as $key => $value) {
            ?>
              <option value="<?php echo $key ?>" <?php echo set_select('sub_from', $key, $key == $brand->sub_from ? true : false) ?>>
                <?php echo $value ?>
              </option>
            <?php
          }
        ?>
        </select>
        <div class="invalid-feedback">
          <?php echo form_error('sub_from') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Tipe', 'brand-type') ?>
        <select name="type" class="form-control selectpicker<?php echo empty(form_error('type')) ? null : ' is-invalid' ?>" id="brand-type" title="Pilih Tipe Merek Kendaraan">
        <?php
          foreach ($types as $key => $value) {
            ?>
              <option value="<?php echo $key ?>" <?php echo set_select('type', $key, $key == $brand->type ? true : false) ?>>
                <?php echo $value ?>
              </option>
            <?php
          }
        ?>
        </select>
        <div class="invalid-feedback">
          <?php echo form_error('type') ?>
        </div>
      </div>
    </div>
    <?php include APPPATH . 'views/backend/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
