<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Products Model
 *
 * @author nanank
 */
class Product_model extends MY_Model {

    public $belongs_to = ['brand'];
    public $before_create = ['created_at'];
    public $before_update = ['updated_at'];

    public function __construct() {
        parent::__construct();
    }

}
