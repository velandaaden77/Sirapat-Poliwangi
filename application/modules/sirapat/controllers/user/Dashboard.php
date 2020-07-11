<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {


	public function __construct()
	{
        parent::__construct();
        is_loginn();
		$this->load->helper('user');
		$this->load->model('user_m');
		
	}

	public function index()
	{ 

		$data['title'] = 'User Dashboard';
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email_karyawan')])->row_array();
		

		$data['gruprapat'] = $this->user_m->getgruprapat()->result();
		
        $this->template->load('layout/user/template', 'user/dashboard', $data);

	}


}
