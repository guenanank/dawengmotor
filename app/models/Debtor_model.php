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

    public function number()
    {
        $terakhir = $this->_database->select('number')->where([
          'substring(number, 0, 2) = ' => date('y'),
          'substring(number, 5, 2) = ' => date('m')
        ])->order_by('number', 'desc')->limit('1')->get($this->_table)->result();

        $nomer = empty($terakhir) ? 0 : substr($terakhir, 6);
        return sprintf('%d%02dDW%04d', date('y'), date('m'), $nomer + 1);
    }

    public function gender()
    {
        return [
          'male' => 'Pria',
          'female' => 'Wanita'
        ];
    }

    public function home_status()
    {
        return [
          'pribadi' => 'Pribadi',
          'sewa' => 'Sewa/Kontrak',
          'keluarga' => 'Keluarga',
          'kantor' => 'Kantor',
          'lainnya' => 'Lainnya'
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
        return [
          '<900' => 'Lebih Kecil dari Rp. 900,000',
          '900-1250' => 'Rp. 900,001 -  Rp. 1,250,000',
          '1250-1750' => 'Rp. 1,250,001 - Rp. 1,750,000',
          '1750-2500' => 'Rp. 1,750,001 - Rp. 2,500,000',
          '2500-4000' => 'Rp. 2,500,001 - Rp. 4,000,000',
          '4000-6000' => 'Rp. 4,000,001 - Rp. 6,000,000',
          '6000-10000' => 'Rp. 6,000,001 - Rp. 10.000.000',
          '10000-15000' => 'Rp. 10,000,001 - Rp. 15,000,000',
          '>15000' => 'Lebih Besar dari Rp. 15,000,000'
        ];
    }
}
