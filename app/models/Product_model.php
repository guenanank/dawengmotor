<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Products Model
 *
 * @author nanank
 */
class Product_model extends MY_Model
{
    public $belongs_to = ['brand'];
    public $after_get = ['get_photo', 'get_price'];
    public $before_create = ['set_price', 'created_at'];
    public $before_update = ['set_price', 'updated_at'];

    public function __construct()
    {
        parent::__construct();
    }

    public function get_photo($row)
    {
        if (is_object($row)) {
            $row->photos = json_decode($row->photos, true);
        } else {
            $row['photos'] = json_decode($row['photos'], true);
        }
        return $row;
    }

    public function get_price($row)
    {
        if (is_object($row)) {
            $row->price = number_format($row->price);
        } else {
            $row['price'] = number_format($row['price']);
        }
        return $row;
    }

    public function set_price($row)
    {
        if (is_object($row)) {
            $row->price = str_replace(',', null, $row->price);
        } else {
            $row['price'] = str_replace(',', null, $row['price']);
        }
        return $row;
    }
}
