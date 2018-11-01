<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Posts Model
 *
 * @author nanank
 */
class Post_model extends MY_Model
{
    public $after_get = ['get_tag'];
    public $before_create = ['set_slug', 'set_tag', 'created_at'];
    public $before_update = ['set_slug', 'set_tag', 'updated_at'];

    private $category = ['Persyaratan Kredit', 'FAQ', 'Hubungi Kami', 'Blog'];

    public function __construct()
    {
        parent::__construct();
    }

    protected function set_slug($row)
    {
        if (is_object($row)) {
            $row->slug = url_title($row->title, '-', true);
        } else {
            $row['slug'] = url_title($row['title'], '-', true);
        }
        return $row;
    }

    public function set_tag($row)
    {
        if (is_object($row)) {
            $row->tags = json_encode(explode(',', $row->tags), true);
        } else {
            $row['tags'] = json_encode(explode(',', $row['tags']), true);
        }
        return $row;
    }

    public function get_tag($row)
    {
        if (is_object($row)) {
            $row->tags = isset($row->tags) ? implode(', ', json_decode($row->tags)) : null;
        } else {
            $row['tags'] = isset($row['tags']) ? implode(', ', json_decode($row['tags'])) : null;
        }
        return $row;
    }

    public function category($category = null)
    {
        $keys = array_map(function ($item) {
            return url_title($item, '-', true);
        }, $this->category);
        $lists = array_combine($keys, $this->category);
        return is_null($category) ? $lists : $lists[$category];
    }
}
