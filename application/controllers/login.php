<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

  function __construct()
  {
    parent::__construct();

    // Load Model
    $this->load->model('Auth_model');
    $this->load->model('Members_model');

    // Load Helper
    $this->load->helper('form');
    $this->load->helper('url');


  }






  public function index()
  {
    // Auto Login
    $this->auto_login();


    $login_member = array(
        array(
            'field' => 'login_identity',
            'label' => 'メールアドレス',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'login_password',
            'label' => 'パスワード',
            'rules' => 'required'
        ),
    );
    $this->form_validation->set_rules($login_member);



    if ($this->form_validation->run())
    {
      $_auto_login = $this->input->post('auto_login');


      // ログインチェック
      if($this->Auth_model->login_and_save_session($this->input->post('login_identity'), $this->input->post('login_password'), $_auto_login))
      {

        if ($this->Members_model->is_admin($this->input->post('login_identity'))){

          if ($this->is_smart_phone())
          {
            $this->destory_login_session();
            $this->data['error'] = '管理画面にはPCでアクセスしてください';
          }else{
            redirect('project','refresh');
          }
        }else{
          redirect('project','refresh');
        }
      }else{
        $this->destory_login_session();
        $this->data['error'] = 'ログインできません。';
      }
    }

    $this->data['title'] = 'ログイン';
    $this->data['member_id'] = $this->session->userdata('member_id');
    $this->data['last_name'] = $this->session->userdata('last_name');
    $this->data['first_name'] = $this->session->userdata('first_name');
    $this->load->view('auth'. $this->get_template_dir(). 'login', $this->data);

  }








}
