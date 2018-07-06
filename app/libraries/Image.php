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
          'maintain_ratio' => true
        ]);
    }

    public function thumbnail($image, $size = 150)
    {
        $original_image = sprintf('%s/original/%s', $this->directory, $image);
        $new_image = sprintf('%s/%s', $this->directory, $image);
        if (!file_exists($new_image)) {
            $config['source_image'] = $original_image;
            $config['new_image'] = $new_image;
            $config['maintain_ratio'] = false;
            list($image_width, $image_height) = @getimagesize($original_image);
            if ($image_width > $image_height) {
                $config['width'] = $image_height;
                $config['height'] = $image_height;
                $config['x_axis'] = (($image_width / 2) - ($config['width'] / 2));
            } else {
                $config['height'] = $image_width;
                $config['width'] = $image_width;
                $config['y_axis'] = (($image_height / 2) - ($config['height'] / 2));
            }
            $this->ci->image_lib->initialize($config);
            $this->ci->image_lib->crop();
            $this->ci->image_lib->clear();
        }
        $thumbnail_dir = sprintf('thumb:%d', $size);
        $thumbnail = sprintf('%s/%s/%s', $this->directory, $thumbnail_dir, $image);
        if (!file_exists($thumbnail)) {
            $this->make_directory($thumbnail_dir);
            $this->ci->image_lib->initialize([
              'maintain_ratio' => true,
              'source_image' => $new_image,
              'new_image' => $thumbnail,
              'width' => $size,
              'height' => $size,
              'quality' => '70%'
            ]);

            $this->ci->image_lib->resize();
            $this->ci->image_lib->clear();
        }

        $this->remove($new_image);
        return base_url($thumbnail);
    }

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

    public function crop($image, $width, $height)
    {
        $dir = sprintf('crop:%dx%d', $width, $height);
        $original_image = sprintf('%s/original/%s', $this->directory, $image);
        $new_image = sprintf('%s/%s/%s', $this->directory, $dir, $image);
        if (!file_exists($new_image)) {
            $this->make_directory($dir);
            list($image_width, $image_height) = @getimagesize($original_image);
            $config['source_image'] = $original_image;
            $config['new_image'] = $new_image;
            $config['maintain_ratio'] = false;
            $source_ratio = $image_width / $image_height;
            $ratio = $width / $height;
            if ($ratio > $source_ratio || (($ratio == 1) && $source_ratio < 1)) {
                $config['width'] = $image_width;
                $config['height'] = round($image_width / $ratio);
                $config['y_axis'] = round(($image_height - $config['height']) / 2);
                $config['x_axis'] = 0;
            } else {
                $config['width'] = round($image_height * $ratio);
                $config['height'] = $image_height;
                $config['y_axis'] = round(($image_width - $config['width']) / 2);
                $config['x_axis'] = 0;
            }
            $this->ci->image_lib->initialize($config);
            $this->ci->image_lib->crop();
            $this->ci->image_lib->clear();
        }

        return base_url($new_image);
    }

    public function rotate($image, $angle = '90')
    {
        $config['source_image'] = sprintf('%s/original/%s', $this->directory, $image);
        $config['rotation_angle'] = $angle;
        $this->ci->image_lib->initialize($config);
        $this->ci->image_lib->rotate();
        $this->ci->image_lib->clear();
        return;
    }

    public function watermark()
    {
    }

    public function make_directory($name)
    {
        $dir = sprintf('%s/%s', $this->directory, $name);
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        return;
    }

    public function remove($image)
    {
        if (empty($image)) {
            return;
        }

        if (is_array($image)) {
            foreach (array_flatten($image) as $img) {
                $this->remove($img);
            }
        }

        if (file_exists($image)) {
            chmod($image, 0666);
            unlink($image);
        }
        return;
    }
}
