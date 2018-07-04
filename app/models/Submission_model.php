<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Submissions Model
 *
 * @author nanank
 */
class Submission_model extends MY_Model
{
    public $belongs_to = ['debtor', 'product'];

    public function __construct()
    {
        parent::__construct();
    }
}
