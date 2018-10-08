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
    <i class="fa fa-plus"></i>&nsp;Ubah&nbsp;<?php echo $title ?>
  </div>
  <div class="card-body">
    <?php echo form_open('lease/update/' . $lease->id, ['class' => 'ajaxform', 'data-module' => 'lease']) ?>
      <div class="form-group">
        <?php echo form_label('Nama', 'lease-name', ['class' => 'col-form-label']) ?>
        <?php echo form_input([
              'name' => 'name',
              'id' => 'lease-name',
              'class' => 'form-control',
              'placeholder' => sprintf('Nama %s', $title),
              'value' => $lease->name
            ])
          ?>
        <div id="feedback-name"></div>
      </div>
      <div class="form-group">
        <?php echo form_label('Keterangan', 'lease-description', ['class' => 'col-form-label']) ?>
        <?php echo form_textarea([
              'name' => 'description',
              'id' => 'lease-description',
              'class' => 'form-control',
              'placeholder' => sprintf('Keterangan %s', $title),
              'value' => $lease->description
            ])
          ?>
        <div id="feedback-description"></div>
      </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
