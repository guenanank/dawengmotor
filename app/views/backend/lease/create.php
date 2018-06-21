<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('lease') ?>" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i>&nbsp;Kembali
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-plus">&nbsp;</i>Tambah Leasing Pembayaran
  </div>
  <div class="card-body">
    <?php echo form_open('lease/insert/', 'class="form-horizontal" role="form"') ?>
    <div class="form-group">
      <?php echo form_label('Nama', 'lease-name', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-6">
        <?php echo form_input(['name' => 'name', 'id' => 'lease-name', 'class' => 'form-control', 'placeholder' => 'Nama Leasing Pembayaran', 'value' => set_value('name')]) ?>
      </div>
      <div class="col-xs-12 col-lg-4">
        <div class="small text-danger"><?php echo form_error('name') ?></div>
      </div>
    </div>

    <div class="form-group">
      <?php echo form_label('Keterangan', 'lease-description', ['class' => 'control-label col-xs-12 col-lg-2']) ?>
      <div class="col-xs-12 col-lg-6">
        <?php echo form_textarea(['name' => 'description', 'id' => 'lease-description', 'class' => 'form-control', 'placeholder' => 'Keterangan Leasing Pembayaran', 'value' => set_value('description')]) ?>
      </div>
      <div class="col-xs-12 col-lg-4">
        <div class="small text-danger"><?php echo form_error('description') ?></div>
      </div>
    </div>

    <hr />
    <div class="form-group">
      <div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-10 col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-save"></i>&nbsp;Simpan
        </button> &nbsp;
        <a href="<?php current_url() ?>" class="btn btn-secondary">
          <i class="fa fa-refresh"></i>&nbsp;Batal
        </a>
      </div>
    </div>
    <?php echo form_close() ?>
  </div>
</div>
