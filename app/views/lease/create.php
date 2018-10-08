<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('lease') ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="<?php echo sprintf('Kembali ke Daftar %s', $title) ?>">
        <i class="fa fa-arrow-left"></i>&nbsp;Kembali
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-plus"></i>Tambah&nbsp;<?php echo $title ?>
  </div>
  <div class="card-body">
    <?php echo form_open('lease/insert/', ['class' => 'ajaxform', 'data-module' => 'lease']) ?>
      <div class="form-group">
        <?php echo form_label('Nama', 'lease-name', ['class' => 'col-form-label']) ?>
        <?php echo form_input([
              'name' => 'name',
              'id' => 'lease-name',
              'class' => 'form-control',
              'placeholder' => sprintf('Nama %s', $title),
              'value' => set_value('name')
            ])
          ?>
        <div id="feedback-name"></div>
      </div>
      <div class="form-group">
        <?php echo form_label('Keterangan', 'lease-description', ['class' => 'col-form-label']) ?>
        <?php echo form_textarea([
              'name' => 'description',
              'id' => 'lease-description',
              'class' => empty(form_error('description')) ? 'form-control' : 'form-control is-invalid',
              'placeholder' => sprintf('Keterangan %s', $title),
              'value' => set_value('description')
            ])
          ?>
        <div id="feedback-description"></div>
      </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
