<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Homepage Data Repositories
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    Data Repositories
 * @author      Nanank <http://guenanank.com>
 */

class Repositories
{
    private $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('Product_model', 'products');
        $this->ci->load->model('Post_model', 'posts');

        $this->ci->load->driver('cache', [
          'adapter' => 'file',
          'backup' => 'apc'
        ]);
    }

    public function sliders($take = 4)
    {
        return [];
    }

    public function latest_products($take = 10)
    {
        $latest_products = $this->ci->cache->get('latest_products');
        if ($latest_products == false) {
            $latest_products = $this->ci->products
                          ->with('brand')
                          ->limit($take)
                          ->order_by('created_at', 'desc')
                          ->get_many_by('sold', false);

            $this->ci->cache->save('latest_products', $latest_products, 300);
        }

        return $latest_products;
    }

    public function latest_articles($take = 10)
    {
    }
}
