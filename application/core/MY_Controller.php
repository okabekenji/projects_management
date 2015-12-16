<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'libraries/Mobile_Detect.php');

class MY_Controller extends CI_Controller {
	protected $mobile_detect;
	protected $data;

	function __construct()
	{
	    parent::__construct();

			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('resource_helper');
			$this->load->helper('view');

	   // Load Library
	    $this->load->library('mail');
	    $this->load->model('Members_model');

			//MobileDetect
			$this->mobile_detect = new Mobile_Detect;

			$this->data['is_smart_phone'] = $this->is_smart_phone();
	}

	protected function is_smart_phone()
	{
		if($this->mobile_detect->isTablet() ){
			return false;
		}
		else if ($this->mobile_detect->isMobile()) {
			return true;
		}
		return false;
	}

	protected function get_template_dir()
	{
			// if ($this->is_smart_phone()) {
			// 		return '/sp/';
			// }
			// else {
			// 		return '/pc/';
			// }
			return '/';
	}

	/**
	* 自動ログイン
	*/
	protected function auto_login()
	{
		$member_id = $this->session->userdata('member_id');
		$is_admin = $this->session->userdata('is_admin');
		if (isset($member_id) && $member_id)
		{

	    if (! $this->Members_model->is_active_user($member_id))
	    {
				$this->destory_login_session();
				redirect('login','refresh');
				return;
	    }

			if ($is_admin == 1)
			{
					redirect('project','refresh');
			}else{
					redirect('project','refresh');
			}

		}
	}

	/**
	* ログインチェック
	*/
	protected function validate_auth()
	{
		$member_id = $this->session->userdata('member_id');
		if (! $member_id)
		{
			$this->destory_login_session();
			redirect('login','refresh');
		}
	}

	/**
	* 管理者チェック
	*/
	protected function is_admin_auth()
	{
		$this->validate_auth();
		$is_admin = $this->session->userdata('is_admin');
		if ($is_admin == 0)
		{
			$this->destory_login_session();
			redirect('login','refresh');
		}
	}

	/**
	* 一般ユーザチェック
	*/
	protected function is_not_admin_member()
	{
		$this->validate_auth();
		$is_admin = $this->session->userdata('is_admin');
		if ($is_admin == 1)
		{
			$this->destory_login_session();
			redirect('login','refresh');
		}
	}

	/**
	* ログインセッション破棄
	*/
	protected function destory_login_session()
	{
		$this->session->unset_userdata('member_id');
		$this->session->unset_userdata('last_name');
		$this->session->unset_userdata('first_name');
		$this->session->unset_userdata('is_admin');
		$this->session->sess_destroy();
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
