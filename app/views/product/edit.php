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
    <i class="fa fa-plus"></i>&nbsp;Ubah&nbsp;
    <?php echo $title ?>
  </div>
  <div class="card-body">
    <?php echo form_open_multipart('product/update/' . $product->id, ['class' => 'ajaxform', 'data-module' => 'product']) ?>

    <div class="form-row">
      <div class="form-group col-md-9">
        <?php echo form_label('Merek', 'product-brand_id', ['class' => 'col-form-label']) ?>
        <select name="brand_id"
            class="form-control selectpicker"
            id="product-brand_id"
            data-live-search="true"
            title="<?php echo sprintf('Pilih Merek %s', $title) ?>">
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
        <div id="feedback-brand_id"></div>
      </div>
      <div class="form-group col-md-3">
        <?php echo form_label('Tahun', 'product-year', ['class' => 'col-form-label']) ?>
        <select name="year"
            class="form-control selectpicker"
            id="product-year"
            data-live-search="true"
            title="<?php echo sprintf('Pilih Tahun %s', $title) ?>">
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
        <div id="feedback-year"></div>
      </div>
    </div>


    <div class="form-group">
      <?php echo form_label('Keterangan', 'product-description', ['class' => 'col-form-label']) ?>
      <?php echo form_textarea([
              'name' => 'description',
              'id' => 'product-description',
              'class' => 'form-control',
              'placeholder' => sprintf('Keterangan %s Kendaraan (Berkas, Plat Nomer, Kondisi, dll)', $title),
              'value' => $product->description
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
                'placeholder' => sprintf('Harga %s', $title),
                'value' => $product->price,
                'aria-describedby' => 'addon-price'
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
                'placeholder' => sprintf('Uang Muka %s', $title),
                'value' => $product->down_payment,
                'aria-describedby' => 'addon-down_payment'
              ])
            ?>
          <div id="feedback-down_payment"></div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <?php echo form_label('Leasing', 'product-leases', ['class' => 'col-form-label']) ?>
      <select name="lease_id"
            class="form-control selectpicker"
            id="product-lease_id"
            title="<?php echo sprintf('Pilih Leasing %s', $title) ?>">
          <?php
            foreach($leases as $k => $v) {
              ?>
                <option value="<?php echo $k ?>"><?php echo $v ?></option>
              <?php
            }
          ?>
        </select>
      <div id="feedback-lease_id"></div>
    </div>

    <div class="row justify-content-center">
      <div class="col-10">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-sm">
            <caption>Daftar Simulasi Angsuran</caption>
            <thead class="text-center thead-light">
              <th scope="col">Tenor</th>
              <th scope="col">Angsuran</th>
              <th scope="col">Bunga</th>
            </thead>
            <tbody id="leases"></tbody>
          </table>
        </div>
      </div>
    </div>

    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
