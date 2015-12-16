<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mypage extends MY_Controller {

  function __construct()
  {
    parent::__construct();

    // // Load Model
    $this->load->model('Members_model');
    $this->load->model('Projects_model');
    $this->load->model('Segments_model');

    // Load Helper
    $this->load->helper(array('form', 'url'));
    $this->load->helper('date');

    $this->load->library('form_validation');

    // 認証チェック
    $this->validate_auth();

  }


  public function index($member_id = null)
  {
    $member_id = $this->session->userdata('member_id');
    $this->data['member'] = $this->Members_model->find_by_id($member_id);

    if (!$member_id){
      show_404();
    }

    if (!$this->data['member']){
      show_404();
    }

    if ($member_id == $this->session->userdata('member_id') )
    {
      $this->data['mypage'] = true;
    }


    $this->load->view('mypage'. $this->get_template_dir(). 'index', $this->data);
  }



  public function new_project()
  {

    $status = $this->Projects_model->find_by_status();
    $this->data['status'] = $status[0];
    $this->data['segments'] = $this->Segments_model->find_segment();
    $this->data['consignments'] = $this->Segments_model->find_consignment();
    $this->data['sales_members'] = $this->Segments_model->find_seles_member();


    $this->data['develop_members'] = $this->Segments_model->find_develop_member();

    $this->data['partner_names'] = $this->Segments_model->find_partner();


    $this->load->view('mypage'. $this->get_template_dir(). 'new_project', $this->data);

  }




  public function insert()
  {

    if($_SERVER["REQUEST_METHOD"] != "POST")
    {
      show_404();
    }


    // // パラメータ取得_projects
    $member_id = $this->session->userdata('member_id');
    $content = $this->input->post("content");
    $segment = $this->input->post("segment");
    $order_date = $this->input->post("order_date");
    $estimate_date = $this->input->post("estimate_date");
    $estimate_active_date = $this->input->post("estimate_active_date");
    $consignment = $this->input->post("consignment");
    $acceptance_plan_month = $this->input->post("acceptance_plan_month");
    $acceptance_month = $this->input->post("acceptance_month");
    $acceptance_amount = $this->input->post("acceptance_amount");
    $acceptance_tax_in = $this->input->post("acceptance_tax_in");
    $cost_rate = $this->input->post("cost_rate");
    $profit_rate = $this->input->post("profit_rate");
    $comment = $this->input->post("comment");

    // // パラメータ取得_project_members
    $sales_member = $this->input->post("sales_member");
    $develop_member = $this->input->post("develop_member");
    $develop_member_role = $this->input->post("develop_member_role");

    // // パラメータ取得_project_partners
    $partner_name = $this->input->post("partner_name");
    $partner_role = $this->input->post("partner_role");
    $partner_amount = $this->input->post("partner_amount");


    $this->Projects_model->entry_project($member_id, $content, $segment, $order_date, $estimate_date, $estimate_active_date, $consignment, $acceptance_plan_month, $acceptance_month, $acceptance_amount, $acceptance_tax_in, $cost_rate, $profit_rate, $comment);


    // $insert_project_id = $this->data['insert_project_id'];
    // log_message('error', $insert_project_id);

    $insert_project_id = $this->session->userdata('insert_id');
    // log_message('error', $insert_project_id);


    $this->Projects_model->entry_project_member($insert_project_id, $sales_member, $develop_member, $develop_member_role);

    $this->Projects_model->entry_project_partner($insert_project_id, $partner_name, $partner_role, $partner_amount);

    $this->session->unset_userdata('insert_id');

    redirect('mypage/'.$member_id,'refresh');


  }




}

