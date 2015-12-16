<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends MY_Controller {


  function __construct()
  {
    parent::__construct();

   // Load Library
    $this->load->library('api');

    // Load Model
    $this->load->model('Projects_model');

    // // POST?
    if (!$this->api->allow_from_post()) return;

  }


  public function find_by_user()
  {

    $member_id = $this->input->post("member_id");
    if (empty($member_id) || !$member_id){
      $member_id = $this->session->userdata('member_id');
    }

    // 検索
    $projects_list = $this->Projects_model->find_by_user($member_id);
    if (!$projects_list)
    {
      $this->api->error_respond_to_json('NOT_FOUND');
      return FALSE;
    }

    $this->api->respond_to_json('200',array(
      "status" => "true",
      "projects_list" => $projects_list,
    ));

  }



  public function find_by_condition()
  {

    $search_input = $this->input->post("search_input");
    if (empty($search_input) || !$search_input){
      $search_input = "";
    }

    // log_message(error, $search_input);

    $offset = $this->input->post("offset");
    if (empty($offset) || !$offset){
      $offset = 0;
    }

    // log_message(error, $offset);

    // $complete_project_display = $this->settings_model->get_complete_project_display();

    // 検索
    $projects_list = $this->Projects_model->find($search_input, $offset);

    if (!$projects_list)
    {
      $this->api->error_respond_to_json('NOT_FOUND');
      return FALSE;
    }

    $this->api->respond_to_json('200',array(
      "status" => "true",
      "projects_list" => $projects_list,
    ));

  }





}
