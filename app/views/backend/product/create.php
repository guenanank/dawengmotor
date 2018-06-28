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

    <div class="form-row">
      <div class="col-md-8 mb-2">
        <?php echo form_label('Merek', 'product-brand_id') ?>
        <?php echo form_dropdown('brand_id', $brands, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'title' => 'Pilih Unit Merek Kendaraan']) ?>
        <div class="small text-danger">
          <?php echo form_error('brand_id') ?>
        </div>
      </div>
      <div class="col-md-2 mb-2">
        <?php echo form_label('Tahun', 'product-year') ?>
        <?php echo form_dropdown('year', $years, null, ['class' => 'form-control selectpicker', 'title' => 'Pilih Unit Tahun']) ?>
        <div class="small text-danger">
          <?php echo form_error('year') ?>
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-5 mb-2">
        <?php echo form_label('Harga', 'product-price') ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Rp. </span>
          </div>
          <?php echo form_input(['name' => 'price', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'id' => 'product-price', 'class' => 'form-control', 'placeholder' => 'Harga Unit Kendaraan', 'value' => set_value('price')]) ?>
        </div>
        <div class="small text-danger">
          <?php echo form_error('price') ?>
        </div>
      </div>
      <div class="col-md-5 mb-2">
        <?php echo form_label('Uang Muka', 'product-down_payment') ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Rp. </span>
          </div>
          <?php echo form_input(['name' => 'down_payment', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'id' => 'product-down_payment', 'class' => 'form-control', 'placeholder' => 'Uang Muka Unit Kendaraan', 'value' => set_value('down_payment')]) ?>
        </div>
        <div class="small text-danger">
          <?php echo form_error('down_payment') ?>
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Keterangan', 'product-description') ?>
        <?php echo form_textarea(['name' => 'description', 'id' => 'product-description', 'class' => 'form-control wysihtml5', 'placeholder' => 'Keterangan Unit Kendaraan (Berkas, Plat Nomer, Kondisi, Tahun, dll)', 'value' => set_value('description')]) ?>
        <div class="small text-danger">
          <?php echo form_error('description') ?>
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Foto', 'product-photos') ?>
        <?php echo form_upload(['name' => 'photos[]', 'id' => 'product-photos', 'class' => 'form-control krajee', 'multiple' => 'true']) ?>
        <div class="small text-danger">
          <?php echo form_error('photos') ?>
        </div>
      </div>
    </div>

    <hr />
    <button type="submit" class="btn btn-primary">
      <i class="fa fa-save"></i>&nbsp;Simpan
    </button> &nbsp;
    <a href="<?php echo current_url() ?>" class="btn btn-secondary">
      <i class="fa fa-refresh"></i>&nbsp;Batal
    </a>
    <?php echo form_close() ?>
  </div>
</div>
