<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('credit') ?>" class="btn btn-secondary">
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
    <?php echo form_open('credit/update/' . $credit->id, 'class="form-horizontal" role="form"') ?>
    <div class="form-group">
      <?php echo form_label('Nama Leasing', 'credit-lease_id', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-8">
        <?php echo form_dropdown('lease_id', $leases, $credit->lease_id, ['class' => 'form-control selectpicker', 'id' => 'credit-lease_id']) ?>
      </div>
      <div class="col-xs-12 col-lg-4">
        <div class="small text-danger"><?php echo form_error('lease_id') ?></div>
      </div>
    </div>

    <div class="form-group">
      <?php echo form_label('DP', 'credit-down_payment', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-8">
        <div class="input-group mb-3">
          <?php echo form_input(['name' => 'down_payment', 'data-mask' => '00.00', 'id' => 'credit-down_payment', 'class' => 'form-control', 'placeholder' => 'Uang Muka', 'value' => $credit->down_payment]) ?>
          <div class="input-group-append">
            <span class="input-group-text">%</span>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-lg-4">
        <div class="small text-danger"><?php echo form_error('down_payment') ?></div>
      </div>
    </div>

    <div class="form-group">
      <?php echo form_label('Tenor', 'credit-tenor', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-8">
        <div class="input-group mb-3">
          <?php echo form_input(['name' => 'tenor', 'data-mask' => '00', 'id' => 'credit-tenor', 'class' => 'form-control', 'placeholder' => 'Tenor Kredit', 'value' => $credit->tenor]) ?>
          <div class="input-group-append">
            <span class="input-group-text">Bulan</span>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-lg-4">
        <div class="small text-danger"><?php echo form_error('tenor') ?></div>
      </div>
    </div>

    <div class="form-group">
      <?php echo form_label('Persentase', 'credit-percentage', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-8">
        <div class="input-group mb-3">
          <?php echo form_input(['name' => 'percentage', 'data-mask' => '00.00', 'id' => 'credit-percentage', 'class' => 'form-control', 'placeholder' => 'Persentase Kredit', 'value' => $credit->percentage]) ?>
          <div class="input-group-append">
            <span class="input-group-text">%</span>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-lg-4">
        <div class="small text-danger"><?php echo form_error('percentage') ?></div>
      </div>
    </div>

    <div class="form-group">
      <?php echo form_label('Pajak', 'credit-tax', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-8">
        <div class="input-group mb-3">
          <?php echo form_input(['name' => 'tax', 'data-mask' => '00.00', 'id' => 'credit-tax', 'class' => 'form-control', 'placeholder' => 'Pajak Kredit', 'value' => $credit->tax]) ?>
          <div class="input-group-append">
            <span class="input-group-text">%</span>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-lg-4">
        <div class="small text-danger"><?php echo form_error('tax') ?></div>
      </div>
    </div>

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
