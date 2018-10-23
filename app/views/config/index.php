
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-table"></i>&nbsp;Daftar&nbsp;<?php echo $title ?></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm table-hover" id="dataTable">
        <thead class="thead-light text-center">
          <tr>
            <th scope="col">Key</th>
            <th scope="col">Value</th>
            <th scope="col">Kontrol</th>
          </tr>
        </thead>
        <tfoot class="thead-light text-center">
          <tr>
            <th>Key</th>
            <th>Value</th>
            <th>Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($configs as $config) {
              ?>
          <tr>
            <td class="text-center"><?php echo $config->key ?></td>
            <td><?php echo $config->value ?></td>

            <td class="text-center">
              <a href="<?php echo base_url('config/edit/' . $config->id) ?>"
                class="btn btn-info btn-sm"
                data-toggle="tooltip"
                data-placement="top"
                title="Ubah <?php echo $config->key ?>">
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
              <a href="<?php echo base_url('config/delete/' . $config->id) ?>"
                class="btn btn-danger btn-sm delete"
                data-toggle="tooltip"
                data-placement="top"
                title="Hapus <?php echo $config->key ?>?">
                  <i class="fa fa-trash"></i>
                </a>
            </td>
          </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
