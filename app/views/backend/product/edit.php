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
    <i class="fa fa-plus">&nbsp;</i>Ubah Unit Produk
  </div>
  <div class="card-body">
    <?php echo form_open_multipart('product/update/' . $product->id) ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-9">
        <?php echo form_label('Merek', 'product-brand_id') ?>
        <select name="brand_id" class="form-control selectpicker<?php echo empty(form_error('brand_id')) ? null : ' is-invalid' ?>" id="product-brand_id" data-live-search="true" title="Pilih Unit Merek Kendaraan">
          <?php
            foreach ($brands as $parent => $brand) {
              ?>
              <optgroup label="<?php echo $parent ?>">
              <?php
              foreach($brand as $k => $v) {
                ?>
                <option value="<?php echo $k ?>" <?php echo set_select('brand_id', $k, $k == $product->brand->id ? true : false) ?>>
                  <?php echo $v ?>
                </option>
                <?php
              }
              ?>
            </optgroup>
              <?php
            }
          ?>
        </select>
        <div class="invalid-feedback">
          <?php echo form_error('brand_id') ?>
        </div>
      </div>
      <div class="form-group col-md-3">
        <?php echo form_label('Tahun', 'product-year') ?>
        <select name="year" class="form-control selectpicker<?php echo empty(form_error('year')) ? null : ' is-invalid' ?>" id="product-year" data-live-search="true" title="Pilih Unit Tahun">
        <?php
          foreach ($years as $key => $value) {
            ?>
              <option value="<?php echo $key ?>" <?php echo set_select('year', $key, $key == $product->year ? true : false) ?>>
                <?php echo $value ?>
              </option>
            <?php
          }
        ?>
        </select>
        <div class="invalid-feedback">
          <?php echo form_error('year') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Keterangan', 'product-description') ?>
        <?php echo form_textarea(['name' => 'description', 'id' => 'product-description', 'class' => empty(form_error('description')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Keterangan Unit Kendaraan (Berkas, Plat Nomer, Kondisi, Tahun, dll)', 'value' => $product->description]) ?>
        <div class="invalid-feedback">
          <?php echo form_error('description') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-1">
      <div class="form-group col-md-12">
        <?php echo form_label('Foto', 'product-photos') ?>
        <?php echo form_upload(['name' => 'photos[]', 'id' => 'product-photos', 'class' => empty(form_error('photos')) ? 'form-control krajee' : 'form-control krajee is-invalid', 'multiple' => 'true']) ?>
        <div class="invalid-feedback">
          <?php echo form_error('photos') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-6">
        <?php echo form_label('Harga', 'product-price') ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-price">Rp. </span>
          </div>
          <?php echo form_input(['name' => 'price', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'id' => 'product-price', 'class' => empty(form_error('price')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Harga Unit Kendaraan', 'value' => $product->price]) ?>
          <div class="invalid-feedback">
            <?php echo form_error('price') ?>
          </div>
        </div>
      </div>
      <div class="form-group col-md-6">
        <?php echo form_label('Uang Muka', 'product-down_payment') ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-down_payment">Rp. </span>
          </div>
          <?php echo form_input(['name' => 'down_payment', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'id' => 'product-down_payment', 'class' => empty(form_error('down_payment')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Uang Muka Unit Kendaraan', 'value' => $product->down_payment]) ?>
          <div class="invalid-feedback">
            <?php echo form_error('down_payment') ?>
          </div>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Leasing', 'product-leases') ?>
        <select name="leases" class="form-control selectpicker<?php echo empty(form_error('leases')) ? null : ' is-invalid' ?>" id="product-leases" title="Pilih Leasing Pembayaran">
          <?php
            foreach($leases as $k => $v) {
              ?>
                <option value="<?php echo $k ?>"><?php echo $v ?></option>
              <?php
            }
          ?>
        </select>
        <div class="invalid-feedback">
          <?php echo form_error('leases') ?>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-body" id="leases"></div>
    </div>
    <?php include APPPATH . 'views/backend/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
