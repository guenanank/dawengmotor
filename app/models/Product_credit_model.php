<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Products Credit Model
 *
 * @author nanank
 */
class Product_credit_model extends MY_Model
{
    public $_table = 'product_credits';

    public function __construct()
    {
        parent::__construct();
    }
}
