<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Brands Model
 *
 * @author nanank
 */
class Brand_model extends MY_Model
{
    public $has_many = ['products', 'children' => ['primary_key' => 'sub_from', 'model' => 'brand_model']];
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
        $this->_database->where('type', 'motor');
        return $this;
    }

    public function parent()
    {
        $this->_database->where('sub_from IS NULL', null, false);
        return $this;
    }

    public function get_parent()
    {
        $dropdown = $this->dropdown('id', 'name');
        $dropdown[null] = 'Pilih Merek Kendaraan';
        return $dropdown;
    }

    public function nested_dropdown()
    {
        $args = func_get_args();
        $this->trigger('before_dropdown');
        $parents = $this->get_parent();
        $brands[null] = 'Pilih Unit Merek Kendaraan';
        $query = $this->_database->where('sub_from IS NOT NULL', null, false)->get($this->_table);
        foreach ($query->result() as $brand) {
            $brands[$brand->id] = sprintf('%s %s %s', ucwords($brand->type), $parents[$brand->sub_from], $brand->name);
        }

        return $brands;
    }
}
