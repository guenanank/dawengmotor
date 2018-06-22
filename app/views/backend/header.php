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
    echo link_tag('assets/css/sweetalert.min.css');
    if (!empty($styles)) {
        foreach ($styles as $style) {
            echo link_tag($style);
        }
    }
    echo link_tag('assets/css/sb-admin.min.css');
    ?>
    <style>
      .table tbody > tr > th, .table tbody > tr > td {
          vertical-align: middle;
      }
    </style>
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
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php require_once 'menu.php' ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
