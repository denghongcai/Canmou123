<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('base_url')) {
    function base_url($uri = '')
    {
        $CI =& get_instance();
        return $CI->config->base_url($uri);
    }
}