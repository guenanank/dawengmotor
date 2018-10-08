<hr />
<button type="submit"
  class="btn btn-primary"
  data-toggle="tooltip"
  data-placement="bottom"
  title="<?php echo sprintf('Simpan %s', $title) ?>">
  <i class="fa fa-save"></i>&nbsp;Simpan
</button>&nbsp;
<a href="<?php echo current_url() ?>"
   class="btn btn-secondary"
   data-toggle="tooltip"
   data-placement="left"
   title="<?php echo sprintf('Batal Simpan %s', $title) ?>">
  <i class="fa fa-refresh"></i>&nbsp;Batal
</a>
