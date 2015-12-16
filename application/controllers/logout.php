<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller {

  function __construct()
  {
    parent::__construct();

  }


  /**
   * ログアウト
   */
  public function index()
  {
    $this->destory_login_session();
    redirect('login','refresh');
  }




}
