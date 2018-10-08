<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('debtor') ?>"
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
    <i class="fa fa-plus"></i>&nbsp;Tambah&nbsp;<?php echo $title ?>
  </div>
  <div class="card-body">
    <?php echo form_open('debtor/insert', [
          'class' => 'ajaxform',
          'data-module' => 'debtor'
        ], ['number' => $number])
      ?>
    <div class="form-row">
      <div class="form-group col-md-9">
        <?php echo form_label('Nama Lengkap', 'debtor-fullname', ['class' => 'col-form-label']) ?>
        <?php echo form_input([
              'name' => 'fullname',
              'id' => 'debtor-fullname',
              'class' => 'form-control',
              'placeholder' => sprintf('Nama Lengkap %s', $title),
              'value' => set_value('fullname')
            ])
          ?>
        <div id="feedback-fullname"></div>
      </div>
      <div class="form-group col-md-3">
        <?php echo form_label('Jenis Kelamin', 'debtor-gender', ['class' => 'col-form-label']) ?>
        <select name="gender"
            class="form-control selectpicker"
            id="debtor-gender"
            title="<?php echo sprintf('Pilih Jenis Kelamin %s', $title) ?>">
            <?php
              foreach($gender as $key => $value) {
                ?>
                  <option value="<?php echo $key ?>" <?php echo set_select('gender', $key) ?>>
                    <?php echo $value ?>
                  </option>
                <?php
              }
            ?>
          </select>
        <div id="feedback-gender"></div>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('Alamat', 'debtor-address', ['class' => 'col-form-label']) ?>
      <?php echo form_textarea([
            'name' => 'address',
            'id' => 'debtor-address',
            'class' => 'form-control',
            'placeholder' => sprintf('Alamat Sesuai KTP %s', $title),
            'value' => set_value('address')
          ])
        ?>
      <div id="feedback-address"></div>
    </div>
    <div class="form-group">
      <?php echo form_label('Email', 'debtor-email', ['class' => 'col-form-label']) ?>
      <?php echo form_input([
            'name' => 'email',
            'id' => 'debtor-email',
            'class' => 'form-control',
            'placeholder' => sprintf('Email %s', $title),
            'value' => set_value('email')
          ])
        ?>
      <div id="feedback-email"></div>
    </div>
    <div class="form-group">
      <?php echo form_label('No Telepon', 'debtor-phone', ['class' => 'col-form-label']) ?>
      <?php echo form_input([
            'name' => 'phone',
            'id' => 'debtor-phone',
            'class' => 'form-control',
            'placeholder' => sprintf('Nomer Telepon %s', $title),
            'value' => set_value('phone')
          ])
        ?>
      <div id="feedback-phone"></div>
    </div>
    <div class="form-group">
      <?php echo form_label('Domisili', 'debtor-domicile', ['class' => 'col-form-label']) ?>
      <?php echo form_textarea([
            'name' => 'domicile',
            'id' => 'debtor-domicile',
            'class' => 'form-control',
            'placeholder' => sprintf('Alamat Domisili %s', $title),
            'value' => set_value('domicile')
          ])
        ?>
      <div id="feedback-domicile"></div>
    </div>
    <div class="form-group">
      <?php echo form_label('Status Rumah', 'debtor-home_status', ['class' => 'col-form-label']) ?>
      <select name="home_status"
          class="form-control selectpicker"
          id="debtor-home_status"
          title="Pilih Status Tempat Tinggal/Rumah">
          <?php
            foreach($home_status as $key => $value) {
              ?>
                <option value="<?php echo $key ?>" <?php echo set_select('home_status', $key) ?>>
                  <?php echo $value ?>
                </option>
              <?php
            }
          ?>
        </select>
      <div id="feedback-home_status"></div>
    </div>
    <div class="form-group">
      <?php echo form_label('Pekerjaan', 'debtor-work', ['class' => 'col-form-label']) ?>
      <select name="work"
        class="form-control selectpicker"
        id="debtor-work"
        title="Pilih Pekerjaan Debitur">
          <?php
            foreach($works as $key => $value) {
              ?>
                <option value="<?php echo $key ?>" <?php echo set_select('work', $key) ?>>
                  <?php echo $value ?>
                </option>
              <?php
            }
          ?>
        </select>
      <div id="feedback-work"></div>
    </div>
    <div class="form-group">
      <?php echo form_label('Lama Bekerja', 'debtor-work_experience', ['class' => 'col-form-label']) ?>
      <?php echo form_input([
            'name' => 'work_experience',
            'id' => 'debtor-work_experience',
            'class' => 'form-control',
            'placeholder' => sprintf('Lama Bekerja/Usaha %s, Contoh: 1 Tahun', $title),
            'value' => set_value('work_experience')
          ])
        ?>
      <div id="feedback-work_experience"></div>
    </div>
    <div class="form-group">
      <?php echo form_label('Pemasukan', 'debtor-income', ['class' => 'col-form-label']) ?>
      <select name="income"
          class="form-control selectpicker"
          id="debtor-income"
          title="Pilih Pemasukan Debitur">
          <?php
            foreach($incomes as $key => $value) {
              ?>
                <option value="<?php echo $key ?>" <?php echo set_select('income', $key) ?>>
                  <?php echo $value ?>
                </option>
              <?php
            }
          ?>
        </select>
      <div id="feedback-income"></div>
    </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
