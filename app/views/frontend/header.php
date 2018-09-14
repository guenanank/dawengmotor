<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Dawenk Motor <?php echo empty($title) ? null : ' - ' . $title ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('asset/images/favicon.ico') ?>" />
  <?php
    $default_meta = array(
        array('name' => 'description', 'content' => 'Dawenk Motor, Jual Beli Motor Baru Dan Bekas'),
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
        array('name' => 'X-UA-Compatible', 'content' => 'IE=9'),
        array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0')
    );

    echo meta($default_meta);
    echo link_tag('assets/css/bootstrap.min.css');
    echo link_tag('assets/css/font-awesome.min.css');
    echo link_tag('assets/css/dawenkmotor.css');
    if (!empty($styles)) {
        foreach ($styles as $style) {
            echo link_tag($style);
        }
    }
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

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <?php echo anchor('/', 'Dawenk Motor', ['class' => 'navbar-brand']) ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">

      <div class="col-lg-3">
        <?php include_once APPPATH . 'views/aside.php' ?>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
