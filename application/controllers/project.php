<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends MY_Controller {

  function __construct()
  {
    parent::__construct();

    // // Load Model
    $this->load->model('Projects_model');

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

    $project_member = $this->Projects_model->find_by_project_member($project_id);
    $project_partner = $this->Projects_model->find_by_project_partner($project_id);

    $this->data['project'] = $project[0];
    $this->data['project_member'] = $project_member[0];
    $this->data['project_partner'] = $project_partner[0];
    $this->load->view('project'. $this->get_template_dir(). 'show', $this->data);
  }






  public function edit($project_id = "")
  {
    $this->data['project_id'] = $project_id;
    $this->load->view('project'. $this->get_template_dir(). 'edit', $this->data);
  }




  public function estimate($project_id = "")
  {
    $this->data['project_id'] = $project_id;
    $this->load->view('project'. $this->get_template_dir(). 'estimate', $this->data);
  }




  public function bill($project_id = "")
  {
    $this->data['project_id'] = $project_id;
    $this->load->view('project'. $this->get_template_dir(). 'bill', $this->data);
  }








}




