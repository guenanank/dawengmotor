<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('post') ?>"
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
    <?php echo form_open('post/update/' . $post->id, ['class' => 'ajaxform', 'data-module' => 'post']) ?>
      <div class="form-group">
        <?php echo form_label('Judul', 'post-title', ['class' => 'col-form-label']) ?>
        <?php echo form_input([
            'name' => 'title',
            'id' => 'post-title',
            'class' => 'form-control',
            'placeholder' => sprintf('Judul %s', $title),
            'value' => $post->title
          ])
         ?>
        <div id="feedback-title"></div>
      </div>
      <div class="form-group">
        <?php echo form_label('Kategori', 'post-category', ['class' => 'col-form-label']) ?>
        <select name="category"
            class="form-control selectpicker"
            id="post-category"
            title="Pilih Kategori <?php echo $title ?>">
        <?php
          foreach ($categories as $key => $category) {
            ?>
              <option value="<?php echo $key ?>" <?php echo set_select('category', $key, $key == $post->category ? true : false) ?>>
                <?php echo $category ?>
              </option>
            <?php
          }
        ?>
        </select>
        <div id="feedback-category"></div>
      </div>
      <div class="form-group">
        <?php echo form_label('Konten', 'post-content', ['class' => 'col-form-label']) ?>
        <?php echo form_textarea([
            'name' => 'content',
            'id' => 'post-content',
            'class' => 'form-control textEditor',
            'placeholder' => sprintf('Konten %s', $title),
            'value' => $post->content
          ])
         ?>
        <div id="feedback-content"></div>
      </div>
      <div class="form-group">
        <?php echo form_label('Label', 'post-tags', ['class' => 'col-form-label']) ?>
        <?php echo form_input([
            'name' => 'tags',
            'id' => 'post-tags',
            'class' => 'form-control',
            'data-role' => 'tagsinput',
            'placeholder' => sprintf('Label %s', $title),
            'value' => $post->tags
          ])
         ?>
        <div id="feedback-tag"></div>
      </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
