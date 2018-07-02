<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Applicants Model
 *
 * @author nanank
 */
class Debtor_model extends MY_Model
{
    public $before_create = ['created_at'];
    public $before_update = ['updated_at'];

    public function __construct()
    {
        parent::__construct();
    }

    public function gender()
    {
        return [
          'male' => 'Bpk',
          'female' => 'Ibu'
        ];
    }

    public function home_status()
    {
        return [
          'pribadi' => 'Pribadi',
          'kontrak' => 'Kontrak',
          'keluarga' => 'Keluarga',
          'lainnya' => 'Lainnya',
        ];
    }

    public function works()
    {
        return [
          'pns' => 'PNS',
          'bumn' => 'BUMN',
          'tni/polri' => 'TNI/Polri',
          'karyawan' => 'Karyawan Swasta',
          'profesional' => 'Profesional',
          'wiraswasta' => 'Wiraswasta'
        ];
    }

    public function incomes()
    {
        return [];
    }
}
