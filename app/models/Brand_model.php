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

    public $types = ['motor' => 'Motor', 'mobil' => 'Mobil'];

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
        $this->_database->where('sub_from =', '0')->order_by('created_at', 'desc');
        return $this;
    }

    public function get_parent()
    {
        return $this->dropdown('id', 'name');
    }

    public function nested_dropdown()
    {
        $args = func_get_args();
        $this->trigger('before_dropdown');
        $parents = $this->get_parent();
        $query = $this->_database->select('id, name, sub_from')->where('sub_from !=', '0')->get($this->_table);
        foreach ($query->result() as $brand) {
            $brands[$parents[$brand->sub_from]][$brand->id] = $brand->name;
        }

        return empty($brands) ? [] : $brands;
    }
}
