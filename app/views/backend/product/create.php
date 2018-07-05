<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('product') ?>" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i>&nbsp;Kembali
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-plus">&nbsp;</i>Tambah Unit Produk
  </div>
  <div class="card-body">
    <?php echo form_open_multipart('product/insert') ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-8">
        <?php echo form_label('Merek', 'product-brand_id') ?>
        <?php echo form_dropdown('brand_id', $brands, set_select('brand_id'), ['class' => empty(form_error('brand_id')) ? 'form-control selectpicker' : 'form-control selectpicker is-invalid', 'data-live-search' => 'true', 'title' => 'Pilih Unit Merek Kendaraan']) ?>
        <div class="invalid-feedback">
          <?php echo form_error('brand_id') ?>
        </div>
      </div>
      <div class="form-group col-md-2">
        <?php echo form_label('Tahun', 'product-year') ?>
        <?php echo form_dropdown('year', $years, set_select('year'), ['class' => empty(form_error('year')) ? 'form-control selectpicker' : 'form-control selectpicker is-invalid', 'data-live-search' => 'true', 'title' => 'Pilih Unit Tahun']) ?>
        <div class="invalid-feedback">
          <?php echo form_error('year') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-5">
        <?php echo form_label('Harga', 'product-price') ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Rp. </span>
          </div>
          <?php echo form_input(['name' => 'price', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'id' => 'product-price', 'class' => empty(form_error('price')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Harga Unit Kendaraan', 'value' => set_value('price')]) ?>
          <div class="invalid-feedback">
            <?php echo form_error('price') ?>
          </div>
        </div>
      </div>
      <div class="form-group col-md-5">
        <?php echo form_label('Uang Muka', 'product-down_payment') ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Rp. </span>
          </div>
          <?php echo form_input(['name' => 'down_payment', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'id' => 'product-down_payment', 'class' => empty(form_error('down_payment')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Uang Muka Unit Kendaraan', 'value' => set_value('down_payment')]) ?>
          <div class="invalid-feedback">
            <?php echo form_error('down_payment') ?>
          </div>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-10">
        <?php echo form_label('Keterangan', 'product-description') ?>
        <?php echo form_textarea(['name' => 'description', 'id' => 'product-description', 'class' => empty(form_error('description')) ? 'form-control wysihtml5' : 'form-control wysihtml5 is-invalid', 'placeholder' => 'Keterangan Unit Kendaraan (Berkas, Plat Nomer, Kondisi, Tahun, dll)', 'value' => set_value('description')]) ?>
        <div class="invalid-feedback">
          <?php echo form_error('description') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-1">
      <div class="form-group col-md-10">
        <?php echo form_label('Foto', 'product-photos') ?>
        <?php echo form_upload(['name' => 'photos[]', 'id' => 'product-photos', 'class' => empty(form_error('photos')) ? 'form-control krajee' : 'form-control krajee is-invalid', 'multiple' => 'true']) ?>
        <div class="invalid-feedback">
          <?php echo form_error('photos') ?>
        </div>
      </div>
    </div>
    <?php include APPPATH . 'views/backend/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
