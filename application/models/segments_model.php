<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Segments_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }



    public function find_segment()
  {
    $this->db->select('id,segment');
    $this->db->from('project_segments');
    $this->db->order_by('id', 'asc');
    $query = $this->db->get();

    $result = array();
    foreach($query->result() as $key => $member) {
      $result += array(htmlspecialchars($member->id)=>htmlspecialchars($member->segment));
    }
    return $result;
  }



    public function find_consignment()
  {
    $this->db->select('id,consignment_yuan');
    $this->db->from('project_consignments');
    $this->db->order_by('id', 'asc');
    $query = $this->db->get();

    $result = array();
    foreach($query->result() as $key => $member) {
      $result += array(htmlspecialchars($member->id)=>htmlspecialchars($member->consignment_yuan));
    }
    return $result;
  }



    public function find_seles_member()
  {
    $this->db->select('id,last_name,first_name');
	$this->db->select("CONCAT(last_name, ' ', first_name) AS sales_name", FALSE);
    $this->db->from('members');
    $this->db->order_by('id', 'asc');
    $query = $this->db->get();

    $result = array();
    foreach($query->result() as $key => $member) {
      $result += array(htmlspecialchars($member->id)=>htmlspecialchars($member->sales_name));
    }
    return $result;
  }


    public function find_develop_member()
  {
  	$this->db->select('id,last_name,first_name');
	$this->db->select("CONCAT(last_name, ' ', first_name) AS develop_name", FALSE);
    // $this->db->select('id,last_name,first_name');
    $this->db->from('members');
    $this->db->order_by('id', 'asc');
    $query = $this->db->get();

    $result = array();
    foreach($query->result() as $key => $member) {
      $result += array(htmlspecialchars($member->id)=>htmlspecialchars($member->develop_name));
    }
    return $result;
  }



    public function find_partner()
  {
    $this->db->select('id, partner_company_name');
    $this->db->from('partner_companys');
    $this->db->order_by('id', 'asc');
    $query = $this->db->get();

    $result = array();
    foreach($query->result() as $key => $member) {
      $result += array(htmlspecialchars($member->id)=>htmlspecialchars($member->partner_company_name));
    }
    return $result;
  }






}
