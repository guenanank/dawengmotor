<?php

defined('BASEPATH') or exit('No direct script access allowed');

$config['upload']['path'] = 'assets/uploads/';
$config['upload']['image_allowed'] = 'gif|jpg|png|jpeg';
$config['upload']['overwrite'] = true;
$config['upload']['encrypt_name'] = false;
$config['upload']['max_size'] = 4112;
$config['upload']['file_ext_tolower'] = true;

// Image Manipulation
$config['image_library'] = 'gd2';
$config['quality'] = 90;
$config['create_thumb'] = false;
$config['maintain_ratio'] = true;
