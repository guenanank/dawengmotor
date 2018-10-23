<!doctype html>
<html>

<head>
  <base href="<?php echo site_url() ?>" />
  <title>
    <?php echo sprintf('%s | %s', $this->session->userdata('sitename'), empty($title) ? null : $title) ?>
  </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="DawenkMotor POS and Digital Catalogue Administration Web System">
  <meta name="author" content="nanank" />
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('asset/images/favicon.ico') ?>" />
  <?php
    echo link_tag('assets/css/bootstrap.min.css');
    echo link_tag('assets/css/dataTables.bootstrap4.css');
    echo link_tag('assets/css/font-awesome.min.css');
    echo link_tag('assets/css/bootstrap-select.min.css');
    echo link_tag('assets/css/sweetalert.min.css');
    echo link_tag('assets/css/bootstrap-datepicker.min.css');

    if (!empty($styles)) {
        foreach ($styles as $style) {
            echo link_tag(sprintf('assets/css/%s.css', $style));
        }
    }
    echo link_tag('assets/css/spinner.css');
    echo link_tag('assets/css/sb-admin.min.css');
    ?>
    <style>
      .table {
        border-collapse: collapse;
        border-spacing: 0;
      }
      .table tbody>tr>th,
      .table tbody>tr>td {
        vertical-align: middle;
      }

      input[type="radio"], input[type="checkbox"] {
        line-height: normal;
        margin: 0;
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

  <?php include APPPATH . 'views/menu.php' ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
