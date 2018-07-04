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
    <i class="fa fa-plus">&nbsp;</i>Tambah Debitur
  </div>
  <div class="card-body">
    <?php echo form_open('debtor/insert/', null, ['number' => $number]) ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-7">
        <?php echo form_label('Nama Lengkap', 'debtor-fullname') ?>
        <?php echo form_input(['name' => 'fullname', 'id' => 'debtor-fullname', 'class' => empty(form_error('fullname')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Nama Lengkap Debitur', 'value' => set_value('fullname')]) ?>
        <div class="invalid-feedback">
          <?php echo form_error('fullname') ?>
        </div>
      </div>
      <div class="form-group col-md-3">
        <?php echo form_label('Jenis Kelamin', 'debtor-gender') ?>
        <?php echo form_dropdown('gender', $gender, null, ['class' => empty(form_error('gender')) ? 'form-control selectpicker' : 'form-control selectpicker is-invalid', 'id' => 'debtor-gender', 'title' => 'Pilih Jenis Kelamin Debitur']) ?>
        <div class="invalid-feedback">
          <?php echo form_error('gender') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-10">
        <?php echo form_label('Alamat', 'debtor-address') ?>
        <?php echo form_textarea(['name' => 'address', 'id' => 'debtor-address', 'class' => empty(form_error('address')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Alamat Sesuai KTP', 'value' => set_value('address')]) ?>
        <div class="invalid-feedback">
          <?php echo form_error('address') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-10">
        <?php echo form_label('Email', 'debtor-email') ?>
        <?php echo form_input(['name' => 'email', 'id' => 'debtor-email', 'class' => empty(form_error('email')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Email Debitur', 'value' => set_value('email')]) ?>
        <div class="invalid-feedback">
          <?php echo form_error('email') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-10">
        <?php echo form_label('No Telepon', 'debtor-phone') ?>
        <?php echo form_input(['name' => 'phone', 'id' => 'debtor-phone', 'class' => empty(form_error('phone')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Nomer Telepon Debitur', 'value' => set_value('phone')]) ?>
        <div class="invalid-feedback">
          <?php echo form_error('phone') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-10">
        <?php echo form_label('Domisili', 'debtor-domicile') ?>
        <?php echo form_textarea(['name' => 'domicile', 'id' => 'debtor-domicile', 'class' => empty(form_error('domicile')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Alamat Domisili', 'value' => set_value('domicile')]) ?>
        <div class="invalid-feedback">
          <?php echo form_error('domicile') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-10">
        <?php echo form_label('Status Rumah', 'debtor-home_status') ?>
        <?php echo form_dropdown('home_status', $home_status, null, ['class' => empty(form_error('home_status')) ? 'form-control selectpicker' : 'form-control selectpicker is-invalid', 'id' => 'debtor-home_status', 'title' => 'Pilih Status Tempat Tinggal/Rumah']) ?>
        <div class="invalid-feedback">
          <?php echo form_error('home_status') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-10">
        <?php echo form_label('Pekerjaan', 'debtor-work') ?>
        <?php echo form_dropdown('work', $works, null, ['class' => empty(form_error('work')) ? 'form-control selectpicker' : 'form-control selectpicker is-invalid', 'id' => 'debtor-work', 'title' => 'Pilih Pekerjaan Debitur']) ?>
        <div class="invalid-feedback">
          <?php echo form_error('work') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-3">
      <div class="form-group col-md-10">
        <?php echo form_label('Lama Bekerja', 'debtor-work_experience') ?>
        <?php echo form_input(['name' => 'work_experience', 'id' => 'debtor-work_experience', 'class' => empty(form_error('work_experience')) ? 'form-control' : 'form-control is-invalid', 'placeholder' => 'Lama Bekerja/Usaha Debitur, Contoh: 1 Tahun', 'value' => set_value('work_experience')]) ?>
        <div class="invalid-feedback">
          <?php echo form_error('work_experience') ?>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-10">
        <?php echo form_label('Pemasukan', 'debtor-income') ?>
        <?php echo form_dropdown('income', $incomes, null, ['class' => empty(form_error('income')) ? 'form-control selectpicker' : 'form-control selectpicker is-invalid', 'id' => 'debtor-income', 'title' => 'Pilih Pemasukan Debitur']) ?>
        <div class="invalid-feedback">
          <?php echo form_error('income') ?>
        </div>
      </div>
    </div>
    <?php include APPPATH . 'views/backend/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
