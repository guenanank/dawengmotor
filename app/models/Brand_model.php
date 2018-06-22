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

    public function parent()
    {
        return $this->dropdown('id', 'name');
    }

    public function nested_dropdown()
    {
        $args = func_get_args();
        $this->trigger('before_dropdown');
        $parents = $this->parent();
        $brands[null] = 'Pilih Unit Merek Kendaraan';
        foreach ($this->_database->get($this->_table)->result() as $brand) {
            if (is_null($brand->sub_from)) {
                continue;
            }

            $brands[$brand->id] = sprintf('%s %s %s', ucwords($brand->type), $parents[$brand->sub_from], $brand->name);
        }

        return $brands;
    }
}
