<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('debtor') ?>" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i>&nbsp;Kembali
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-plus">&nbsp;</i>Ubah Debitur
  </div>
  <div class="card-body">
    <?php echo form_open('debtor/update/' . $debtor->id) ?>

    <div class="form-row mb-3">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Nama Lengkap', 'debtor-fullname') ?>
        <?php echo form_input(['name' => 'fullname', 'id' => 'debtor-fullname', 'class' => 'form-control', 'placeholder' => 'Nama Lengkap Debitur', 'value' => $debtor->fullname]) ?>
        <div class="small text-danger">
          <?php echo form_error('fullname') ?>
        </div>
      </div>
    </div>

    <div class="form-row mb-3">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Alamat', 'debtor-address') ?>
        <?php echo form_textarea(['name' => 'address', 'id' => 'debtor-address', 'class' => 'form-control', 'placeholder' => 'Alamat Sesuai KTP', 'value' => $debtor->address]) ?>
        <div class="small text-danger">
          <?php echo form_error('address') ?>
        </div>
      </div>
    </div>

    <div class="form-row mb-3">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Email', 'debtor-email') ?>
        <?php echo form_input(['name' => 'email', 'id' => 'debtor-email', 'class' => 'form-control', 'placeholder' => 'Email Debitur', 'value' => $debtor->email]) ?>
        <div class="small text-danger">
          <?php echo form_error('email') ?>
        </div>
      </div>
    </div>

    <div class="form-row mb-3">
      <div class="col-md-10 mb-2">
        <?php echo form_label('No Telepon', 'debtor-phone') ?>
        <?php echo form_input(['name' => 'phone', 'id' => 'debtor-phone', 'class' => 'form-control', 'placeholder' => 'Nomer Telepon Debitur', 'value' => $debtor->phone]) ?>
        <div class="small text-danger">
          <?php echo form_error('phone') ?>
        </div>
      </div>
    </div>

    <div class="form-row mb-3">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Domisili', 'debtor-domicile') ?>
        <?php echo form_textarea(['name' => 'domicile', 'id' => 'debtor-domicile', 'class' => 'form-control', 'placeholder' => 'Alamat Domisili', 'value' => $debtor->domicile]) ?>
        <div class="small text-danger">
          <?php echo form_error('domicile') ?>
        </div>
      </div>
    </div>

    <div class="form-row mb-3">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Status Rumah', 'debtor-home_status') ?>
        <?php echo form_dropdown('home_status', $home_status, [$debtor->home_status], ['class' => 'form-control selectpicker', 'id' => 'debtor-home_status', 'title' => 'Pilih Status Tempat Tinggal/Rumah']) ?>
        <div class="small text-danger">
          <?php echo form_error('home_status') ?>
        </div>
      </div>
    </div>

    <div class="form-row mb-3">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Pekerjaan', 'debtor-work') ?>
        <?php echo form_dropdown('work', $work, [$debtor->work], ['class' => 'form-control selectpicker', 'id' => 'debtor-work', 'title' => 'Pilih Pekerjaan Debitur']) ?>
        <div class="small text-danger">
          <?php echo form_error('work') ?>
        </div>
      </div>
    </div>

    <div class="form-row mb-3">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Lama Bekerja', 'debtor-work_experience') ?>
        <?php echo form_input(['name' => 'work_experience', 'id' => 'debtor-work_experience', 'class' => 'form-control', 'placeholder' => 'Lama Bekerja/Usaha Debitur', 'value' => $debtor->work_experience]) ?>
        <div class="small text-danger">
          <?php echo form_error('work_experience') ?>
        </div>
      </div>
    </div>

    <div class="form-row mb-3">
      <div class="col-md-10 mb-2">
        <?php echo form_label('Pemasukan', 'debtor-income') ?>
        <?php echo form_dropdown('income', $income, [$debtor->income], ['class' => 'form-control selectpicker', 'id' => 'debtor-income', 'title' => 'Pilih Pemasukan Debitur']) ?>
        <div class="small text-danger">
          <?php echo form_error('income') ?>
        </div>
      </div>
    </div>

    <hr />
    <button type="submit" class="btn btn-primary">
      <i class="fa fa-save"></i>&nbsp;Simpan
    </button>&nbsp;
    <a href="<?php echo current_url() ?>" class="btn btn-secondary">
      <i class="fa fa-refresh"></i>&nbsp;Batal
    </a>
    <?php echo form_close() ?>
  </div>
</div>
