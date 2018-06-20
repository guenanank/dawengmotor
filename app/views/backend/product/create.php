<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('product') ?>" class="btn btn-warning">
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
    <?php echo form_open('product/insert/', 'class="form-horizontal" role="form"') ?>

    <div class="form-group">
      <?php echo form_label('Merek', 'product-brand_id', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-3">
        <?php echo form_dropdown('brand_id', $brands, null, ['class' => 'form-control']) ?>
      </div>
      <div class="col-xs-12 col-lg-3">
        <div class="small text-danger">
          <?php echo form_error('brand_id') ?>
        </div>
      </div>
    </div>

    <div class="form-group">
      <?php echo form_label('Nama', 'product-name', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-6">
        <?php echo form_input(['name' => 'name', 'id' => 'product-name', 'class' => 'form-control', 'placeholder' => 'Nama Unit Produk', 'value' => set_value('name')]) ?>
      </div>
      <div class="col-xs-12 col-lg-4">
        <div class="small text-danger">
          <?php echo form_error('name') ?>
        </div>
      </div>
    </div>

    <div class="form-group">
      <?php echo form_label('Nopol', 'product-vehicle_id', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-6">
        <?php echo form_input(['name' => 'vehicle_id', 'id' => 'product-vehicle_id', 'class' => 'form-control', 'placeholder' => 'Nomor Polisi Unit Kendaraan', 'value' => set_value('vehicle_id')]) ?>
      </div>
      <div class="col-xs-12 col-lg-4">
        <div class="small text-danger">
          <?php echo form_error('vehicle_id') ?>
        </div>
      </div>
    </div>

    <div class="form-group">
      <?php echo form_label('No Mesin', 'product-engine_number', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-6">
        <?php echo form_input(['name' => 'engine_number', 'id' => 'product-engine_number', 'class' => 'form-control', 'placeholder' => 'Nomor Mesin Unit Kendaraan', 'value' => set_value('engine_number')]) ?>
      </div>
      <div class="col-xs-12 col-lg-4">
        <div class="small text-danger">
          <?php echo form_error('engine_number') ?>
        </div>
      </div>
    </div>

    <div class="form-group">
      <?php echo form_label('No Rangka', 'product-frame_number', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-6">
        <?php echo form_input(['name' => 'frame_number', 'id' => 'product-frame_number', 'class' => 'form-control', 'placeholder' => 'Nomor Rangka Unit Produk', 'value' => set_value('frame_number')]) ?>
      </div>
      <div class="col-xs-12 col-lg-4">
        <div class="small text-danger">
          <?php echo form_error('frame_number') ?>
        </div>
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
        <a href="<?php echo current_url() ?>" class="btn btn-default">
          <i class="fa fa-refresh"></i>&nbsp;Batal
        </a>
      </div>
    </div>
    <?php echo form_close() ?>
  </div>
</div>
