</div>
<!-- /.col-lg-9 -->

</div>
<!-- /.row -->
</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Dawenk Motor <?php echo date('Y') ?></p>
  </div>
  <!-- /.container -->
</footer>

<?php
// Bootstrap core JavaScript
echo script_tag('assets/js/jquery-3.3.1.js');
echo script_tag('assets/js/bootstrap.bundle.min.js');
// Custom scripts for all pages
if(!empty($scripts)) {
  foreach($scripts as $script) {
    echo script_tag($script);
  }
}
?>
  </body>

  </html>
