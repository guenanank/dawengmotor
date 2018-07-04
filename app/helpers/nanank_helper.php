<?php

if (!function_exists('debug')) {
    function debug($data, $exit = true)
    {
        if (empty($data) && $exit) {
            print_error('Data is empty');
        }

        if (is_object($data)) {
            echo '<pre>';
            var_dump($data);
            echo '</pre>';
        } elseif (is_array($data)) {
            echo '<pre>';
            print_r($data);
            echo '</pre>';
        } else {
            echo $data;
        }
        if ($exit) {
            exit();
        }
    }
}

if (!function_exists('print_error')) {
    function print_error($msg = null)
    {
        echo $msg;
        exit();
    }
}

if (!function_exists('time_elapsed')) {
    function time_elapsed($time = null)
    {
        $time = strtotime($time);
        $etime = time() - $time;

        if ($etime < 1) {
            return '0 seconds';
        }

        $a = [365 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        ];

        $a_plural = ['year' => 'years',
            'month' => 'months',
            'day' => 'days',
            'hour' => 'hours',
            'minute' => 'minutes',
            'second' => 'seconds'
        ];

        foreach ($a as $secs => $str) {
            $d = $etime / $secs;
            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
            }
        }
    }
}

if (!function_exists('script_tag')) {
    function script_tag($src = null, $index_page = false, $versioning = true)
    {
        $CI = & get_instance();

        $v = $versioning ? '?v=' . random_string('alnum', 7) : null;
        $script = '<script type="text/javascript" ';

        if ($src !== '') {
            if (strpos($src, '://') !== false) {
                $script .= $src . $v . '" ';
            } elseif ($index_page === true) {
                $script .= 'src="' . $CI->config->site_url($src . $v) . '" ';
            } else {
                $script .= 'src="' . $CI->config->slash_item('base_url') . $src . $v . '" ';
            }
        }
        $script .= ' ></script>';

        return $script;
    }
}

if (!function_exists('clearfix')) {
    function clearfix($num = 1)
    {
        return str_repeat('<div class="clearfix">' . nbs() . '</div>', $num);
    }
}

if (!function_exists('array_to_object')) {
    function array_to_object($array, $recursive = true)
    {
        if (!is_array($array)) {
            return $array;
        }

        $obj = new stdClass;
        foreach ($array as $k => $v) {
            if (strlen($k)) {
                $obj->{$k} = is_array($v) ? array_to_object($v) : $v;
            }
        }
        return $obj;
    }
}

if (!function_exists('object_to_array')) {
    function object_to_array($d)
    {
        if (is_object($d)) {
            $d = get_object_vars($d);
        }

        return is_array($d) ? array_map(__FUNCTION__, $d) : $d;
    }
}

if (!function_exists('json_encode_db')) {
    function json_encode_db($json = '')
    {
        if (empty($json)) {
            return;
        }
        $json = json_encode($json);
        $json = addslashes($json);
        return $json;
    }
}

if (!function_exists('json_decode_db')) {
    function json_decode_db($json = '')
    {
        if (empty($json)) {
            return;
        }

        $json = stripslashes($json);
        $json = json_decode($json);
        $json = object_to_array($json);

        return $json;
    }
}

if (!function_exists('find_array')) {
    function find_array($needle, array $array)
    {
        $return = [];
        foreach ($array as $row) {
            if (count(array_filter($row, 'is_array')) > 0) {
                find_array($needle, $row);
            } else {
                foreach ($row as $v) {
                    if (stripos($v, $needle) !== false) {
                        $return[] = $row;
                    }
                }
            }
        }
        return $return;
    }
}

if (!function_exists('distinct_array')) {
    function distinct_array($array = array())
    {
        return (!empty($array) && is_array($array)) ? array_map('unserialize', array_unique(array_map('serialize', $array))) : $array;
    }
}

if (!function_exists('str_pos')) {
    function str_pos($haystack, $needles = [], $offset = 0)
    {
        $word = [];
        foreach ($needles as $needle) {
            $res = strpos($haystack, $needle, $offset);
            if ($res) {
                $word[$needle] = $res;
            }
        }

        if (empty($word)) {
            return false;
        }

        return min($word);
    }
}

if (!function_exists('array_flatten')) {
    function array_flatten($array)
    {
        if (!is_array($array)) {
            return false;
        }
        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, array_flatten($value));
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }
}
