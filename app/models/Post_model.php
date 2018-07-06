<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Posts Model
 *
 * @author nanank
 */
class Post_model extends MY_Model {

    public $before_create = ['created_at'];
    public $before_update = ['updated_at'];

    public function __construct() {
        parent::__construct();
    }

}
