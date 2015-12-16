<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projectdetails extends MY_Controller {


  function __construct()
  {
    parent::__construct();

   // Load Library
    $this->load->library('api');

    // Load Model
    $this->load->model('Projects_model');
    $this->load->model('Projectshows_model');

    // // POST?
    if (!$this->api->allow_from_post()) return;

  }




}
