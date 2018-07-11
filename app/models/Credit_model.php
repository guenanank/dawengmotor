<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Credits Model
 *
 * @author nanank
 */
class Credit_model extends MY_Model {

    public $belongs_to = ['lease'];
    public $after_get = ['get_money'];
    public $before_create = ['set_money', 'created_at'];
    public $before_update = ['set_money', 'updated_at'];

    public function __construct() {
        parent::__construct();
    }

    public function get_money($row)
    {
        if (is_object($row)) {
            $row->administration = number_format($row->administration);
        } else {
            $row['administration'] = number_format($row['administration']);
        }
        return $row;
    }

    public function set_money($row)
    {
        if (is_object($row)) {
            $row->administration = str_replace(',', null, $row->administration);
        } else {
            $row['administration'] = str_replace(',', null, $row['administration']);
        }
        return $row;
    }

}
