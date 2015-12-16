<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('h'))
{

    function h($str) {
      return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }

}

