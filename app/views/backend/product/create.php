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
    <?php echo form_open_multipart('product/insert/', 'class="form-horizontal" role="form"') ?>

    <div class="form-group">
      <?php echo form_label('Merek', 'product-brand_id', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-6">
        <?php echo form_dropdown('brand_id', $brands, null, ['class' => 'form-control']) ?>
      </div>
      <div class="col-xs-12 col-lg-3">
        <div class="small text-danger">
          <?php echo form_error('brand_id') ?>
        </div>
      </div>
    </div>

    <div class="form-group">
      <?php echo form_label('Harga', 'product-price', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-6">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Rp. </span>
          </div>
          <?php echo form_input(['name' => 'price', 'data-mask' => '000.000.000.000.000', 'data-mask-reverse' => 'true', 'id' => 'product-price', 'class' => 'form-control', 'placeholder' => 'Harga Unit Kendaraan', 'value' => set_value('price')]) ?>
          <div class="input-group-append">
            <span class="input-group-text">.-</span>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-lg-4">
        <div class="small text-danger"><?php echo form_error('price') ?></div>
      </div>
    </div>

    <div class="form-group">
      <?php echo form_label('Keterangan', 'product-description', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-6">
        <?php echo form_textarea(['name' => 'description', 'id' => 'product-description', 'class' => 'form-control wysihtml5', 'placeholder' => 'Keterangan Unit Kendaraan (Berkas, Plat Nomer, Kondisi, Tahun, dll)', 'value' => set_value('description')]) ?>
      </div>
      <div class="col-xs-12 col-lg-4">
        <div class="small text-danger"><?php echo form_error('description') ?></div>
      </div>
    </div>

    <div class="form-group">
      <?php echo form_label('Foto', 'product-photos', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-6">
        <?php echo form_upload(['name' => 'photos[]', 'id' => 'product-photos', 'class' => 'form-control krajee', 'multiple' => 'true']) ?>
      </div>
      <div class="col-xs-12 col-lg-4">
        <div class="small text-danger"><?php echo form_error('photos') ?></div>
      </div>
    </div>



<!--
    <div class="m-5">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <?php
          foreach($leases as $k => $lease) {
            $active = $k == 0 ? 'active' : null;
            ?>
            <li class="nav-item">
              <a class="nav-link <?php echo $active ?>" id="<?php echo camelize($lease->name) ?>-tab" data-toggle="tab" href="#<?php echo camelize($lease->name) ?>" role="tab" aria-controls="<?php echo camelize($lease->name) ?>" aria-selected="false"><?php echo $lease->name ?></a>
            </li>
            <?php
          }
        ?>
      </ul>
      <div class="tab-content" id="myTabContent">
        <?php
          foreach($leases as $k => $lease) {
            $show = $k == 0 ? 'show active' : null;
            ?>
            <div class="tab-pane fade <?php echo $show ?>" id="<?php echo camelize($lease->name) ?>" role="tabpanel" aria-labelledby="<?php echo camelize($lease->name) ?>-tab">
              <div class="table-responsive">
                <table class="table table-condensed table hover">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Uang Muka</th>
                      <th>Tenor</th>
                      <th>Persentase</th>
                      <th>Pajak</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($lease->credits as $credit) {
                        ?>
                        <tr>
                          <td></td>
                          <td><?php echo number_format($credit->down_payment, 1) ?>%</td>
                          <td><?php echo $credit->tenor ?> Bulan</td>
                          <td><?php echo number_format($credit->percentage, 1) ?>%</td>
                          <td><?php echo number_format($credit->tax, 1) ?>%</td>
                        </tr>
                        <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>

            </div>
            <?php
          }
        ?>
      </div>
    </div> -->

    <hr />
    <div class="form-group">
      <div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-10 col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-save"></i>&nbsp;Simpan
        </button> &nbsp;
        <a href="<?php echo current_url() ?>" class="btn btn-secondary">
          <i class="fa fa-refresh"></i>&nbsp;Batal
        </a>
      </div>
    </div>
    <?php echo form_close() ?>
  </div>
</div>
