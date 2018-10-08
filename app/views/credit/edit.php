<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('credit') ?>"
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
    <i class="fa fa-pencil"></i>&nbsp;Ubah&nbsp;<?php echo $title ?>
  </div>
  <div class="card-body">
    <?php echo form_open('credit/update/' . $credit->id, [
          'class' => 'ajaxform',
          'data-module' => 'credit'
        ])
      ?>
      <div class="form-group">
        <?php echo form_label('Nama Leasing', 'credit-lease_id', ['class' => 'col-form-label']) ?>
        <select name="lease_id"
            class="form-control selectpicker"
            id="credit-lease_id"
            title="Pilih Leasing <?php echo $title ?>">
        <?php
          foreach ($leases as $key => $lease) {
            ?>
              <option value="<?php echo $key ?>" <?php echo set_select('lease_id', $key, $key == $credit->lease_id ? true : false) ?>>
                <?php echo $lease ?>
              </option>
            <?php
          }
        ?>
        </select>
        <div id="feedback-lease_id"></div>
      </div>
      <div class="form-group">
        <?php echo form_label('Tenor', 'credit-tenor', ['class' => 'col-form-label']) ?>
        <div class="input-group">
          <?php echo form_input([
                'name' => 'tenor',
                'data-mask' => '00',
                'id' => 'credit-tenor',
                'class' => 'form-control',
                'placeholder' => sprintf('Tenor %s', $title),
                'value' => $credit->tenor,
                'aria-describedby' => 'addon-tenor'
              ])
            ?>
          <div class="input-group-append">
            <span class="input-group-text rounded-right" id="addon-tenor">Bulan</span>
          </div>
          <div id="feedback-tenor"></div>
        </div>
      </div>
      <div class="form-group">
        <?php echo form_label('Administrasi', 'credit-administration', ['class' => 'col-form-label']) ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-administration">Rp.</span>
          </div>
          <?php echo form_input([
                'name' => 'administration',
                'data-mask' => '000,000,000,000,000',
                'data-mask-reverse' => 'true',
                'id' => 'credit-administration',
                'class' => 'form-control rounded-right',
                'placeholder' => sprintf('Administrasi %s', $title),
                'value' => $credit->administration,
                'aria-describedby' => 'addon-administration'
              ])
            ?>
          <div id="feedback-administration"></div>
        </div>
      </div>

    <!--
      <div class="form-group">
        <?php echo form_label('Pajak', 'credit-tax', ['class' => 'col-form-label']) ?>
        <div class="input-group">
          <?php echo form_input([
                'name' => 'tax',
                'data-mask' => '00.00',
                'id' => 'credit-tax',
                'class' => 'form-control',
                'placeholder' => sprintf('Pajak %s', $title),
                'value' => $credit->tax,
                'aria-describedby' => 'addon-tax'
              ])
            ?>
          <div class="input-group-append">
            <span class="input-group-text rounded-right" id="addon-tax">%</span>
          </div>
          <div id="feedback-tax"></div>
        </div>
      </div> -->

      <div class="form-group">
        <?php echo form_label('Asuransi', 'credit-insurance', ['class' => 'col-form-label']) ?>
        <div class="input-group">
          <?php echo form_input([
                'name' => 'insurance',
                'data-mask' => '00.00',
                'data-mask-reverse' => 'true',
                'id' => 'credit-insurance',
                'class' => 'form-control',
                'placeholder' => sprintf('Asuransi %s', $title),
                'value' => $credit->insurance,
                'aria-describedby' => 'addon-insurance'
              ])
            ?>
          <div class="input-group-append">
            <span class="input-group-text rounded-right" id="addon-insurance">%</span>
          </div>
          <div id="feedback-insurance"></div>
        </div>
      </div>
      <div class="form-group">
        <?php echo form_label('Rata-rata Efektif', 'credit-effective_rate', ['class' => 'col-form-label']) ?>
        <div class="input-group">
          <?php echo form_input([
                'name' => 'effective_rate',
                'data-mask' => '00.00',
                'data-mask-reverse' => 'true',
                'id' => 'credit-effective_rate',
                'class' => 'form-control',
                'placeholder' => sprintf('Rata-rata Efektif %s', $title),
                'value' => $credit->effective_rate,
                'aria-describedby' => 'addon-effective_rate'
              ])
            ?>
          <div class="input-group-append">
            <span class="input-group-text rounded-right" id="addon-effective_rate">%</span>
          </div>
          <div id="feedback-effective_rate"></div>
        </div>
      </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
