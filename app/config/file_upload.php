<?php

defined('BASEPATH') or exit('No direct script access allowed');

$config['path'] = 'assets/uploads/';
$config['image_allowed'] = 'gif|jpg|png|jpeg';
$config['overwrite'] = true;
$config['encrypt_name'] = true;
$config['max_size'] = 1028;

// Image Manipulation
$config['image_library'] = 'gd2';
$config['quality'] = 90;
$config['create_thumb'] = false;
$config['maintain_ratio'] = true;
