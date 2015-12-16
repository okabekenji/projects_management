<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


//comment_count

    public function find($search_input, $offset = 0)
    {
      $limit = 10;

      $this->db->select('
        projects.id,
        projects.project_content,
        project_status.status as status_name,
        projects.created_at,
        projects.updated_at,
        members.id as member_id,
        members.last_name,
        members.first_name,
        projects.del_flg
      ');
      $this->db->from('projects');
      $this->db->join('members', 'projects.responsibility_member_id = members.id');
      $this->db->join('project_status', 'project_status.id = projects.status_id', 'left');

      $where = "(`projects`.`del_flg` = 0)";

      if (!is_null($search_input) && $search_input != "") {
        $where .= " AND (`project_status`.`status` LIKE '%$search_input%' OR `members`.`id` LIKE '%$search_input%' OR `members`.`mail` LIKE '%$search_input%' OR `projects`.`project_content` LIKE '%$search_input%' OR `members`.`last_name` LIKE '%$search_input%' OR `members`.`first_name` LIKE '%$search_input%' )";
      }
      $this->db->where($where);

      $this->db->order_by('created_at', 'desc');

      $this->db->limit($limit, $offset);

      $query = $this->db->get();

// log_message(error, $where);

//echo $this->db->last_query();
  // exit;

      $result = array();
      foreach($query->result() as $key => $projects) {
        $result[$key]['id']              = htmlspecialchars($projects->id);
        $result[$key]['status_name']           = nl2br(htmlspecialchars($projects->status_name));
        $result[$key]['project_content']           = nl2br(htmlspecialchars($projects->project_content));
        $result[$key]['updated_at']        = htmlspecialchars($projects->created_at);
        $result[$key]['created_at']        = htmlspecialchars($projects->created_at);
        $result[$key]['last_name']        = htmlspecialchars($projects->last_name);
        $result[$key]['first_name']        = htmlspecialchars($projects->first_name);
        $result[$key]['member_id']        = htmlspecialchars($projects->member_id);
        $result[$key]['del_flg']         = htmlspecialchars($projects->del_flg);
      }
      return $result;
    }




    public function find_by_id($project_id)
    {
      $this->db->select('
        projects.id,
        projects.project_content,
        project_status.status as status_name,
        project_segments.segment as segment_name,
        projects.order_date,
        projects.estimate_date,
        projects.estimate_active_date,
        project_consignments.consignment_yuan as consignment_name,
        projects.responsibility_member_id as created_member_id,
        members.id as member_id,
        members.last_name,
        members.first_name,
        projects.acceptance_plan_month,
        projects.acceptance_month,
        projects.acceptance_amount,
        projects.acceptance_tax_included,
        projects.cost_rate,
        projects.profit_rate,
        projects.projects_comment,
        projects.created_at,
        projects.del_flg
      ');
      $this->db->from('projects');
      $this->db->join('members', 'projects.responsibility_member_id = members.id');
      $this->db->join('project_status', 'project_status.id = projects.status_id', 'left');
      $this->db->join('project_segments', 'project_segments.id = projects.segment_id', 'left');
      $this->db->join('project_consignments', 'project_consignments.id = projects.consignment_yuan_id', 'left');
      $this->db->where('projects.id = ', $project_id);
      $this->db->order_by('created_at', 'desc');
      $query = $this->db->get();


      $result = array();
      foreach($query->result() as $key => $projects) {
        $result[$key]['id']              = htmlspecialchars($projects->id);
        $result[$key]['project_content']              = htmlspecialchars($projects->project_content);
        $result[$key]['status_name']              = htmlspecialchars($projects->status_name);
        $result[$key]['segment_name']              = htmlspecialchars($projects->segment_name);
        $result[$key]['order_date']              = htmlspecialchars($projects->order_date);
        $result[$key]['estimate_date']              = htmlspecialchars($projects->estimate_date);
        $result[$key]['estimate_active_date']              = htmlspecialchars($projects->estimate_active_date);
        $result[$key]['consignment_name']              = htmlspecialchars($projects->consignment_name);
        $result[$key]['acceptance_plan_month']              = htmlspecialchars($projects->acceptance_plan_month);
        $result[$key]['acceptance_month']              = htmlspecialchars($projects->acceptance_month);
        $result[$key]['acceptance_amount']              = htmlspecialchars($projects->acceptance_amount);
        $result[$key]['acceptance_tax_included']              = htmlspecialchars($projects->acceptance_tax_included);
        $result[$key]['cost_rate']              = htmlspecialchars($projects->cost_rate);
        $result[$key]['profit_rate']              = htmlspecialchars($projects->profit_rate);
        $result[$key]['projects_comment']              = htmlspecialchars($projects->projects_comment);
        $result[$key]['created_at']        = htmlspecialchars($projects->created_at);
        $result[$key]['last_name']        = htmlspecialchars($projects->last_name);
        $result[$key]['first_name']        = htmlspecialchars($projects->first_name);
        $result[$key]['member_id']        = htmlspecialchars($projects->member_id);
        $result[$key]['del_flg']         = htmlspecialchars($projects->del_flg);
        return $result;
      }
      return $result;
    }



    public function find_by_project_member($project_id)
    {
      $this->db->select('

        project_members.project_id as created_project_id,
        projects.id as project_id,
        project_members.sales_member_id as created_sales_member_id,
        project_members.development_member_id as created_develop_member_id,
        sales_member.last_name as sales_member_last_name,
        sales_member.first_name as sales_member_first_name,
        development_member.last_name as development_member_last_name,
        development_member.first_name as development_member_first_name,
        project_members.development_member_role,
        project_members.created_at,
      ');
      $this->db->from('project_members');
      $this->db->join('projects', 'project_members.project_id = projects.id');

      $this->db->join('members as sales_member', 'sales_member.id = project_members.sales_member_id', 'left');
      $this->db->join('members as development_member', 'development_member.id = project_members.development_member_id', 'left');

      $this->db->where('projects.id = ', $project_id);
      $this->db->order_by('created_at', 'desc');
      $query = $this->db->get();

      $result = array();
      foreach($query->result() as $key => $project_members) {
        $result[$key]['id']              = htmlspecialchars($project_members->id);
        $result[$key]['sales_member_last_name']    = htmlspecialchars($project_members->sales_member_last_name);
        $result[$key]['sales_member_first_name']   = htmlspecialchars($project_members->sales_member_first_name);
        $result[$key]['development_member_last_name']    = htmlspecialchars($project_members->development_member_last_name);
        $result[$key]['development_member_first_name']   = htmlspecialchars($project_members->development_member_first_name);
        $result[$key]['development_member_role']              = htmlspecialchars($project_members->development_member_role);


        return $result;
      }
      return $result;
    }









    public function find_by_project_partner($project_id)
    {
      $this->db->select('

        project_partners.project_id as created_project_id,
        project_partners.partner_company_comment as partner_comment,
        projects.id as project_id,
        partner.partner_company_name as partner_name,
        partner.business_form_id,
        project_partners.project_partner_id,
        partner_business_forms.id,
        partner_business_forms.business_form as partner_form,
        project_partners.consignment_amount,
        project_partners.created_at,
      ');
      $this->db->from('project_partners, partner_companys');
      $this->db->join('projects', 'project_partners.project_id = projects.id');
      $this->db->join('partner_companys as partner', 'partner.id = project_partners.project_partner_id', 'left');
      $this->db->join('partner_business_forms', 'partner.business_form_id = partner_business_forms.id');
      $this->db->where('projects.id = ', $project_id);
      $this->db->order_by('created_at', 'desc');
      $query = $this->db->get();

      $result = array();
      foreach($query->result() as $key => $project_partners) {
        $result[$key]['id']              = htmlspecialchars($project_partners->id);
        $result[$key]['consignment_amount']              = htmlspecialchars($project_partners->consignment_amount);
        $result[$key]['partner_name']              = htmlspecialchars($project_partners->partner_name);
        $result[$key]['partner_comment']              = htmlspecialchars($project_partners->partner_comment);
        $result[$key]['partner_form']              = htmlspecialchars($project_partners->partner_form);


        return $result;
      }
      return $result;
    }










    public function find_by_user($member_id)
    {

      $this->db->select('
        projects.id,
        projects.project_content,
        project_status.status as status_name,
        projects.consignment_yuan_id,
        projects.responsibility_member_id,
        projects.created_at,
        projects.updated_at,
        members.id as member_id,
        members.last_name,
        members.first_name,
        projects.del_flg
      ');
      $this->db->from('projects');
      $this->db->join('members', 'projects.responsibility_member_id = members.id');
      $this->db->join('project_status', 'project_status.id = projects.status_id', 'left');

      $where = "(`projects`.`del_flg` = 0)";
      $where = "(`projects`.`responsibility_member_id` = $member_id)";

      $this->db->where($where);

      $this->db->order_by('updated_at', 'desc');

      $query = $this->db->get();

// log_message(error, $where);

//echo $this->db->last_query();
  // exit;

      $result = array();
      foreach($query->result() as $key => $projects) {
        $result[$key]['id']              = htmlspecialchars($projects->id);
        $result[$key]['status_name']           = nl2br(htmlspecialchars($projects->status_name));
        $result[$key]['project_content']           = nl2br(htmlspecialchars($projects->project_content));
        $result[$key]['updated_at']        = htmlspecialchars($projects->created_at);
        $result[$key]['created_at']        = htmlspecialchars($projects->created_at);
        $result[$key]['last_name']        = htmlspecialchars($projects->last_name);
        $result[$key]['first_name']        = htmlspecialchars($projects->first_name);
        $result[$key]['member_id']        = htmlspecialchars($projects->member_id);
        $result[$key]['del_flg']         = htmlspecialchars($projects->del_flg);
      }
      return $result;
    }









    public function find_by_status()
    {

      $this->db->select('
        project_status.status,
      ');
      $this->db->from('project_status');
      $where = "(`project_status`.`id` = 1)";

      $this->db->where($where);
      $query = $this->db->get();

      $result = array();
      foreach($query->result() as $key => $projects) {
        $result[$key]['status']           = nl2br(htmlspecialchars($projects->status));
      }
      return $result;
    }





    public function entry_project($member_id, $content, $segment, $order_date, $estimate_date, $estimate_active_date, $consignment, $acceptance_plan_month, $acceptance_month, $acceptance_amount, $acceptance_tax_in, $cost_rate, $profit_rate, $comment)
    {
      $this->db->trans_begin();

      $params = array(
          'responsibility_member_id' => $member_id,

          'project_content'   => $content,
          'status_id'  => 1,
          'segment_id'  => $segment,
          'order_date'        => $order_date,
          'estimate_date'        => $estimate_date,
          'estimate_active_date'        => $estimate_active_date,
          'consignment_yuan_id'        => $consignment,
          'acceptance_plan_month'        => $acceptance_plan_month,
          'acceptance_month'        => $acceptance_month,
          'acceptance_amount'        => $acceptance_amount,
          'acceptance_tax_included'        => $acceptance_tax_in,
          'cost_rate'        => $cost_rate,
          'profit_rate'        => $profit_rate,
          'projects_comment'        => $comment,
          'del_flg'    => 0,
          'updated_at'  => date('Y-m-d H:i:s', time()),
          'created_at'  => date('Y-m-d H:i:s', time()),

      );


      $this->db->insert('projects', $params);
      $insert_project_id = $this->db->insert_id();
      $this->session->set_userdata('insert_id', $insert_project_id);
      // $insert_project_id = $this->Projects_model->insert_project_id($this->db->insert_id());
      log_message('error', $insert_project_id);


      if ($this->db->trans_status() === FALSE)
      {
        $this->db->trans_rollback();
        return FALSE;
      }
      $this->db->trans_commit();
      // return TRUE;
      return array (TRUE, $insert_project_id);
    }





    public function entry_project_member($insert_project_id, $sales_member, $develop_member, $develop_member_role)
    {
      $this->db->trans_begin();
      // $insert_project_id = $this->db->last_query();
      // $insert_project_id = $this->db->insert_id('projects');
      // log_message('error', $insert_project_id);


      $params = array(

          'project_id'        => $insert_project_id,
          'sales_member_id'        => $sales_member,
          'development_member_id'        => $develop_member,
          'development_member_role'        => $develop_member_role,

          'del_flg'    => 0,
          'updated_at'  => date('Y-m-d H:i:s', time()),
          'created_at'  => date('Y-m-d H:i:s', time()),

      );

      $this->db->insert('project_members', $params);
      if ($this->db->trans_status() === FALSE)
      {
        $this->db->trans_rollback();
        return FALSE;
      }
      $this->db->trans_commit();
      return TRUE;
    }




    public function entry_project_partner($insert_project_id, $partner_name, $partner_role, $partner_amount)
    {
      $this->db->trans_begin();
      // $insert_project_id = $this->db->last_query();
      // $insert_project_id = $this->db->insert_id('projects');
      // log_message('error', $insert_project_id);

      $params = array(

          'project_id'        => $insert_project_id,
          'project_partner_id'        => $partner_name,
          'partner_company_comment'        => $partner_role,
          'consignment_amount'        => $partner_amount,


          'del_flg'    => 0,
          'updated_at'  => date('Y-m-d H:i:s', time()),
          'created_at'  => date('Y-m-d H:i:s', time()),

      );

      $this->db->insert('project_partners', $params);
      if ($this->db->trans_status() === FALSE)
      {
        $this->db->trans_rollback();
        return FALSE;
      }
      $this->db->trans_commit();
      return TRUE;
    }










}





