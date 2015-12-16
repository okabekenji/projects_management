<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends MY_Controller {

  function __construct()
  {
    parent::__construct();

    // // Load Model
    $this->load->model('Projects_model');
    $this->load->model('Projectshows_model');

    // 認証チェック
    $this->validate_auth();

    // 一般ユーザチェック
    //$this->is_not_admin_member();

    //URLヘルパーをロード
    $this->load->helper("url");

  }




  public function index()
  {
    $this->load->view('project'. $this->get_template_dir(). 'index', $this->data);
  }



  public function show($project_id = "")
  {

    $this->data['project_id'] = $project_id;

    $project = $this->Projects_model->find_by_id($project_id);
    if (!$project)
    {
      show_404();
    }

    $this->data['user'] = $project[0];
    $this->load->view('project'. $this->get_template_dir(). 'show', $this->data);
  }



  public function edit($project_id = "")
  {
    $this->data['project_id'] = $project_id;
    $this->load->view('project'. $this->get_template_dir(). 'edit', $this->data);
  }




}




