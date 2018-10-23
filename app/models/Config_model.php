<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Configs Model
 *
 * @author nanank
 */
class Config_model extends MY_Model
{

    private $type = ['int', 'text', 'json', 'date'];

    public function __construct()
    {
        parent::__construct();
    }

    public function type($type = null)
    {
        $keys = array_map(function ($item) {
            return camelize($item);
        }, $this->type);
        $lists = array_combine($keys, $this->type);
        return is_null($type) ? $lists : $lists[$type];
    }
}
