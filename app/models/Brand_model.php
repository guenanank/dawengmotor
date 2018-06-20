<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Brands Model
 *
 * @author nanank
 */
class Brand_model extends MY_Model
{
    public $has_many = ['products'];
    public $before_create = ['created_at'];
    public $before_update = ['updated_at'];

    public function __construct()
    {
        parent::__construct();
    }

    public function motor()
    {
        $this->db->where('type', 'motor');
        return $this;
    }
}
