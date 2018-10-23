<!doctype html>
<html>

<head>
  <title>Dawenk Motor</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="DawenkMotor POS and Digital Catalogue Administration Web System">
  <meta name="author" content="nanank" />
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('asset/images/favicon.ico') ?>" />
  <?php
    echo link_tag('assets/css/bootstrap.min.css');
    echo link_tag('assets/css/font-awesome.min.css');
    echo link_tag('assets/css/sweetalert.min.css');

    echo link_tag('assets/css/spinner.css');
    echo link_tag('assets/css/sb-admin.min.css');
    ?>
  <script>
    // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o)
      // ,m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      // })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      //
      // ga('create', 'UA-8183126-5', 'auto');
      // ga('send', 'pageview');
    </script>
</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Dawenk Motor</div>
      <div class="card-body">
        <?php echo form_open('login/do', ['id' => 'login']) ?>

          <div class="form-group">
              <?php echo form_input([
                    'name' => 'username',
                    'class' => 'form-control',
                    'id' => 'login-username',
                    'placeholder' => 'Username'
                  ])
                ?>
                <div id="feedback-username"></div>
          </div>

          <div class="form-group">
              <?php echo form_password([
                    'name' => 'password',
                    'class' => 'form-control',
                    'id' => 'login-password',
                    'placeholder' => 'Password'
                  ])
                ?>
                <div id="feedback-password"></div>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Login</button>

        <?php echo form_close() ?>
      </div>
    </div>
  </div>
  <div class="loading">Loading</div>
  <?php
    // Bootstrap core JavaScript
    echo script_tag('assets/js/jquery-3.3.1.js');
    echo script_tag('assets/js/bootstrap.bundle.min.js');

    echo script_tag('assets/js/sweetalert.min.js');

    ?>
    <script type="text/javascript">

        $('form#login').on('submit', function(e) {
          e.preventDefault();
          $.ajax({
            type: $(this).attr('method'),
            dataType: 'json',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            beforeSend: function() {
              $('.loading').fadeIn();
            },
            statusCode: {
              200: function(data) {
                swal({
                  type: 'success',
                  title: 'Sukses!',
                  text: 'Login Berhasil.',
                  showConfirmButton: false,
                  timer: 2000
                }, function() {
                    window.location.replace(data.redirectUrl);
                });
              },
              422: function(response) {
                $.each(response.responseJSON, function(k, v) {
                  $('#login-' + k).addClass('is-invalid');
                  $('#feedback-' + k).html(v).addClass('invalid-feedback');
                });
              }
            }
          }).always(function() {
            $('.loading').fadeOut();
          });


        });
    </script>
</body>

</html>
