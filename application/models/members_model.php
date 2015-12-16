<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    public function find_by_id($member_id)
    {
    	$this->db->select('
          members.*,
          ');
    	$this->db->from('members');
      $this->db->where('members.id', $member_id);
    	$query = $this->db->get();

      // echo  $this->db->last_query();

    	$result = array();
  		foreach($query->result() as $key => $member) {
  			$result['id']                   = htmlspecialchars($member->id);
  			$result['mail'] 		            = htmlspecialchars($member->mail);
  			$result['last_name'] 	          = htmlspecialchars($member->last_name);
  			$result['first_name']           = htmlspecialchars($member->first_name);
        $result['created_at']           = htmlspecialchars($member->created_at);
        $result['invalid']              = htmlspecialchars($member->invalid);
        $result['is_admin']             = htmlspecialchars($member->is_admin);
        return $result;
  		}
      return $result;
    }





    public function find_by_mail($mail)
    {
    	$this->db->select('*');
    	$this->db->from('members');
      $this->db->where('mail', $mail);
    	$query = $this->db->get();

    	$result = array();
  		foreach($query->result() as $key => $member) {
  			$result['id']                 = htmlspecialchars($member->id);
  			$result['mail'] 		          = htmlspecialchars($member->mail);
  			$result['last_name'] 	        = htmlspecialchars($member->last_name);
  			$result['first_name']         = htmlspecialchars($member->first_name);
        $result['created_at']         = htmlspecialchars($member->created_at);
        $result['invalid']            = htmlspecialchars($member->invalid);
        $result['is_admin']           = htmlspecialchars($member->is_admin);
        return $result;
  		}
      return $result;
    }







    public function is_admin($mail)
    {
      $member = $this->find_by_mail($mail);
      if ($member){
        return $member['is_admin'] == 1;
      }
      return false;
    }


    public function is_active_user($member_id)
    {
      $member = $this->find_by_id($member_id);
      if ($member){
        return $member['invalid'] == 1;
      }
      return false;
    }




    public function active_users()
    {
      $this->db->select('
          members.mail
      ');
      $this->db->from('members');
      $this->db->where('members.is_admin ', 0);
      $this->db->where('members.invalid ', 1);

      $query = $this->db->get();

      $result = array();
      foreach($query->result() as $key => $member) {
        $result[$key]['mail']               = htmlspecialchars($member->mail);
      }
      return $result;
    }


}
