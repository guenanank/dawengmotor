<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('product') ?>"
        class="btn btn-secondary"
        data-toggle="tooltip"
        data-placement="left"
        title="<?php echo sprintf('Kembali ke Daftar %s', $title) ?>">
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
    <?php echo form_open_multipart('product/insert', ['class' => 'ajaxform']) ?>

    <div class="form-row">
      <div class="form-group col-md-9">
        <?php echo form_label('Merek', 'product-brand_id', ['class' => 'col-form-label']) ?>
        <select name="brand_id"
            class="form-control selectpicker"
            id="product-brand_id"
            data-live-search="true"
            title="Pilih Unit Merek Kendaraan">
          <?php
            foreach ($brands as $parent => $brand) {
              ?>
              <optgroup label="<?php echo $parent ?>">
              <?php
              foreach($brand as $k => $v) {
                ?>
                <option value="<?php echo $k ?>" <?php echo set_select('brand_id', $k) ?>>
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
        <div id="feedback-brand_id"></div>
      </div>
      <div class="form-group col-md-3">
        <?php echo form_label('Tahun', 'product-year', ['class' => 'col-form-label']) ?>
        <select name="year"
            class="form-control selectpicker"
            id="product-year"
            data-live-search="true"
            title="Pilih Unit Tahun">
        <?php
          foreach ($years as $key => $value) {
            ?>
              <option value="<?php echo $key ?>" <?php echo set_select('year', $key) ?>>
                <?php echo $value ?>
              </option>
            <?php
          }
        ?>
        </select>
        <div id="feedback-year"></div>
      </div>
    </div>

      <div class="form-group">
        <?php echo form_label('Keterangan', 'product-description', ['class' => 'col-form-label']) ?>
        <?php echo form_textarea([
              'name' => 'description',
              'id' => 'product-description',
              'class' => 'form-control',
              'placeholder' => 'Keterangan Unit Kendaraan (Berkas, Plat Nomer, Kondisi, Tahun, dll)',
              'value' => set_value('description')
            ])
          ?>
        <div id="feedback-description"></div>
      </div>

      <div class="form-group">
        <?php echo form_label('Foto', 'product-photos', ['class' => 'col-form-label']) ?>
        <?php echo form_upload([
              'name' => 'photos[]',
              'id' => 'product-photos',
              'class' => 'form-control krajee',
              'multiple' => 'true'
            ])
          ?>
        <div id="feedback-photos"></div>
      </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <?php echo form_label('Harga', 'product-price', ['class' => 'col-form-label']) ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-price">Rp. </span>
          </div>
          <?php echo form_input([
                'name' => 'price',
                'data-mask' => '000,000,000,000,000',
                'data-mask-reverse' => 'true',
                'id' => 'product-price',
                'class' => 'form-control rounded-right',
                'placeholder' =>
                'Harga Unit Kendaraan',
                'value' => set_value('price')
              ])
            ?>
          <div id="feedback-price"></div>
        </div>
      </div>
      <div class="form-group col-md-6">
        <?php echo form_label('Uang Muka', 'product-down_payment', ['class' => 'col-form-label']) ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-down_payment">Rp. </span>
          </div>
          <?php echo form_input([
                'name' => 'down_payment',
                'data-mask' => '000,000,000,000,000',
                'data-mask-reverse' => 'true',
                'id' => 'product-down_payment',
                'class' => 'form-control rounded-right',
                'placeholder' => 'Uang Muka Unit Kendaraan',
                'value' => set_value('down_payment')
              ])
            ?>
          <div id="feedback-down_payment"></div>
        </div>
      </div>
    </div>

      <div class="form-group">
        <?php echo form_label('Leasing', 'product-leases', ['class' => 'col-form-label']) ?>
        <select name="leases"
            class="form-control selectpicker"
            id="product-leases"
            title="Pilih Leasing Pembayaran">
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

    <div class="card mb-4">
      <div class="card-body" id="leases"></div>
    </div>

    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
