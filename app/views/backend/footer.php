</div>
</div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<footer class="sticky-footer">
  <div class="container">
    <div class="text-center">
      <small>Hak Cipta © Dawenk Motor <?php echo date('Y') ?></small>
    </div>
  </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div>
</div>
<?php
// Bootstrap core JavaScript
echo script_tag('assets/js/jquery-3.3.1.js');
echo script_tag('assets/js/bootstrap.bundle.min.js');
// Core plugin JavaScript
echo script_tag('assets/js/jquery.easing.min.js');
echo script_tag('assets/js/sweetalert.min.js');
// Custom scripts for all pages
if(!empty($scripts)) {
  if(!is_array($scripts)) {
    $scripts = array($scripts);
  }

  foreach($scripts as $script) {
    echo script_tag($script);
  }
}
?>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#dataTable").DataTable({
        order: [
          [0, "desc"]
        ]
      });

      $('body').on('click', 'a.delete', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        swal({
            title: 'Anda Yakin?',
            text: 'Anda tidak dapat mengembalikan data ini',
            type: "warning",
            showCancelButton: true,
            cancelButtonText: 'Batalkan!',
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Ya, Hapus',
            closeOnConfirm: false
          },
          function(isConfirm) {
            if (isConfirm) {
              $.get(url, function() {
                swal({
                  title: 'Terhapus!',
                  text: 'Data anda sudah terhapus.',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
                }, function() {
                  location.reload();
                });
              });
            }
          });

      });

      $('.wysihtml5').editor({
        uiLibrary: 'bootstrap4'
      });

      $('.krajee').fileinput({
        theme: 'fa',
        uploadUrl: '',
        maxFileCount: 5,
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        dropZoneEnabled: false,
        showRemove: false,
        showUpload: false,
        previewFileType: 'image',
        browseLabel: 'Upload Foto'
      });


    });
  </script>
  <?php echo script_tag('assets/js/sb-admin.min.js') ?>
  </body>

  </html>
