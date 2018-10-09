<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Posts Model
 *
 * @author nanank
 */
class Post_model extends MY_Model
{
    public $before_create = ['slug', 'created_at'];
    public $before_update = ['slug', 'updated_at'];

    private $category = ['Persyaratan Kredit', 'FAQ', 'Hubungi Kami', 'Blog'];

    public function __construct()
    {
        parent::__construct();
    }

    protected function slug($row)
    {
        if (is_object($row)) {
            $row->slug = url_title($row->title, '-', true);
        } else {
            $row['slug'] = url_title($row['title'], '-', true);
        }
        return $row;
    }

    public function category($category = null)
    {
        $keys = array_map(function ($item) {
            return camelize($item);
        }, $this->category);
        $lists = array_combine($keys, $this->category);
        return is_null($category) ? $lists : $lists[$category];
    }
}
