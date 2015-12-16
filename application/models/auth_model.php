<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function login_and_save_session($mail, $password, $auto_login)
  {
    $this->db->select('id, is_admin, last_name, first_name');
    $this->db->from('members');
    $this->db->where('mail = ', $mail);
    $this->db->where('password = ', md5($password));
    $this->db->where('invalid = 1');
    $query = $this->db->get();
    if ( count($query->result()) > 0 )
    {
      // if (empty($auto_login))
      // {
      //   $this->config->config['sess_expire_on_close'] = TRUE;
      //   $this->config->config['sess_use_database'] = FALSE;
      //   $this->session = new CI_Session($this->config->config);
      // }else{
      //   $this->config->config['sess_expire_on_close'] = FALSE;
      //   $this->config->config['sess_use_database'] = TRUE;
      // }
      $this->session->set_userdata('member_id', $query->row()->id);
      $this->session->set_userdata('last_name', $query->row()->last_name);
      $this->session->set_userdata('first_name', $query->row()->first_name);
      $this->session->set_userdata('is_admin', $query->row()->is_admin);
      return true;
    }
    else
    {
      return false;
    }
  }

}
