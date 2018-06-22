<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Image Manipulation On The Fly Class
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    Image Manipulation
 * @author      Nanank <http://guenanank.com>
 */

class Image
{
    private $ci;
    protected $directory = 'assets/uploads';

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->library('image_lib', [
          'image_library' => 'gd2',
          'maintain_ratio' => true
        ]);
    }


    /**
     * Function Resize()
     *
     * @access public
     * @param string $image
     * @param int $width
     * @param int $height
     * @return String
     *
     */
    public function resize($image, $width = 0, $height = 0)
    {
        $dir = sprintf('resize:%dx%d', $width, $height);
        $original_image = sprintf('%s/original/%s', $this->directory, $image);
        $new_image = sprintf('%s/%s/%s', $this->directory, $dir, $image);
        if (!file_exists($new_image)) {
            $this->make_directory($dir);

            $config['source_image'] = $original_image;
            $config['new_image'] = $new_image;
            $config['width'] = $width;
            $config['height'] = $height;

            $this->ci->image_lib->initialize($config);
            $this->ci->image_lib->resize();
            $this->ci->image_lib->clear();
        }

        return base_url($new_image);
    }

    public function crop($image, $y_axis, $x_axis, $ratio = true)
    {
        $dir = sprintf('crop:%dx%d', $y_axis, $x_axis);
        $original_image = sprintf('%s/original/%s', $this->directory, $image);
        $new_image = sprintf('%s/%s/%s', $this->directory, $dir, $image);
        if (!file_exists($new_image)) {
            $this->make_directory($dir);

            $config['source_image'] = $original_image;
            $config['new_image'] = $new_image;
            $config['maintain_ratio'] = false;
            $config['x_axis'] = $x_axis;
            $config['y_axis'] = $y_axis;

            $this->ci->image_lib->initialize($config);
            $this->ci->image_lib->crop();
            $this->ci->image_lib->clear();
        }

        return base_url($new_image);
    }

    public function rotate()
    {
    }

    public function watermark()
    {
    }

    private function make_directory($name)
    {
        $dir = sprintf('%s/%s', $this->directory, $name);
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        return;
    }
}
