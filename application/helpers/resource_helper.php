<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('echo_filedate'))
{

    function echo_filedate($filename) {
      if (file_exists($filename)) {
        return date('YmdHis', filemtime($filename));
      } else {
        return date('YmdHis');
      }
    }

}

