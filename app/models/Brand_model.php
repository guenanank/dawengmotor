<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Brands Model
 *
 * @author nanank
 */
class Brand_model extends MY_Model
{
    public $has_many = ['products', 'children'];
    public $belongs_to = ['parent' => ['primary_key' => 'sub_from', 'model' => 'brand_model']];
    public $before_create = ['created_at'];
    public $before_update = ['updated_at'];

    public function __construct()
    {
        parent::__construct();
        $this->load->library('recursive');
    }

    public function motor()
    {
        $this->db->where('type', 'motor');
        return $this;
    }

    public function nested_dropdown_motor()
    {
        $this->_temporary_return_type = 'array';
        $brands = $this->get_many_by('type', 'motor');
        $recursive = $this->recursive->make($brands, 'id', 'sub_from');
        $option = $this->recursive->option($recursive, 'name', 'id');
        array_unshift($option, 'Pilih Sub Merek Kendaraan');
        return $option;
    }
}
