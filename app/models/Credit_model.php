<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Credits Model
 *
 * @author nanank
 */
class Credit_model extends MY_Model {

    public $belongs_to = ['lease'];
    public $before_create = ['created_at'];
    public $before_update = ['updated_at'];

    public function __construct() {
        parent::__construct();
    }

}
