<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Pager
|--------------------------------------------------------------------------
|
*/
$config['per_page'] = 10;
$config['num_links'] = 7;
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['display_pages'] = TRUE;
$config['anchor_class']='tekitou';
$config['full_tag_open'] = '<div class="pagination pagination-centered"><ul>';
$config['full_tag_close'] = '</ul></div>';
$config['first_link'] = '&lt;&lt;';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_link'] = '&gt;&gt;';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';
$config['next_link'] = '&gt;';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
$config['prev_link'] = '&lt;';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="disabled"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
