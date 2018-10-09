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

    private $gender = ['Pria', 'Wanita'];
    private $home_status = ['Pribadi', 'Sewa/Kontrak', 'Keluarga', 'Kantor', 'Lainnya'];
    private $works = ['PNS', 'BUMN', 'TNI/Polri', 'Karyawan Swasta', 'Profesional', 'Wiraswasta'];

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

    public function gender($gender = null)
    {
        $keys = array_map(function ($item) {
            return camelize($item);
        }, $this->gender);
        $lists = array_combine($keys, $this->gender);
        return is_null($gender) ? $lists : $lists[$gender];
    }

    public function home_status($home_status = null)
    {
        $keys = array_map(function ($item) {
            return camelize($item);
        }, $this->home_status);
        $lists = array_combine($keys, $this->home_status);
        return is_null($home_status) ? $lists : $lists[$home_status];
    }

    public function works($works = null)
    {
        $keys = array_map(function ($item) {
            return camelize($item);
        }, $this->works);
        $lists = array_combine($keys, $this->works);
        return is_null($works) ? $lists : $lists[$works];
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
