<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Leases Model
 *
 * @author nanank
 */
class Lease_model extends MY_Model
{
    public $has_many = ['credits'];
    public $before_create = ['created_at'];
    public $before_update = ['updated_at'];

    public function __construct()
    {
        parent::__construct();
    }
}
