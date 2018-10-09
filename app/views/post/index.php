<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('post/create') ?>"
        class="btn btn-success"
        data-toggle="tooltip"
        data-placement="top"
        title="Tambah&nbsp;<?php echo $title ?>">
      <i class="fa fa-plus"></i>&nbsp;Tambah
    </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-table"></i>&nbsp;Daftar&nbsp;<?php echo $title ?>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Kontrol</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Kontrol</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
            foreach($posts as $post) {
              ?>
          <tr>
            <td><?php echo $post->title ?></td>
            <td class="text-center"><?php echo $this->posts->category($post->category) ?></td>
            <td class="text-center">
              <a href="<?php echo base_url('post/edit/' . $post->id) ?>"
                class="btn btn-info"
                data-toggle="tooltip"
                data-placement="top"
                title="Ubah <?php echo $post->title ?>">
                  <i class="fa fa-edit"></i>
                </a>&nbsp;
              <a href="<?php echo base_url('post/delete/' . $post->id) ?>"
                class="btn btn-danger delete"
                data-toggle="tooltip"
                data-placement="top"
                title="Hapus <?php echo $post->title ?>?">
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
