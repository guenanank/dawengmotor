<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recursive {

        public function make($data, $parent_name = null, $sub_name = null, $parent = 0)
        {
            if (empty($data)) {
                return;
            }

            $d = [];
            $_data = $data;
            if (empty($_data) == false) {
                foreach ($_data as $key => $value) {
                    $id = $value[$parent_name];
                    $parent_id = empty($value[$sub_name]) ? 0 : $value[$sub_name];
                    if ($parent == $parent_id) {
                        $d[$id]['data'] = $value;
                        unset($_data[$key]);
                        $d[$id]['sub'] = $this->make($_data, $parent_name, $sub_name, $id);
                    }
                }
            }

            return $d;
        }

        public function data($data = [], $name = null, $divider = '___', $temp = [], $depth = 0)
        {
            $separator = null;
            for ($i = 0; $i < $depth; $i++) {
                $separator .= $divider;
            }

            if (empty($data) == false) {
                foreach ($data as $val) {
                    $d = $val['data'];
                    if (empty($name) == false) {
                        $d[$name] = $separator . $d[$name];
                    }

                    $d['_divider'] = $separator;
                    $d['_depth'] = $depth;
                    $temp[] = $d;

                    if (empty($val['sub']) ==  false) {
                        $new_depth = $depth + 1;
                        $temp = $this->data($val['sub'], $name, $divider, $temp, $new_depth);
                    }
                }
            }

            return $temp;
        }

        public function option($data = [], $name = null, $index = null, $default = null, $opt = [], $depth = 0)
        {
            $separator = null;
            for ($i = 0; $i < $depth; $i++) {
                $separator .= '&nbsp;&nbsp;&nbsp;&nbsp;';
            }

            if (empty($default) == false) {
                if (is_array($default)) {
                    foreach ($default as $kev => $val) {
                        $opt[$key] = $val;
                    }
                } else {
                    $opt[0] = $default;
                }
            }

            if (empty($data) == false) {
                foreach ($data as $value) {
                    $d = $value['data'];
                    $opt[$d[$index]] = $separator . $d[$name];
                    if (empty($value['sub']) == false) {
                        $new_depth = $depth + 1;
                        $opt = $this->option($value['sub'], $name, $index, null, $opt, $new_depth);
                    }
                }
            }

            return $opt;
        }
}
