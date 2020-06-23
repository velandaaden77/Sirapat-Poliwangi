<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->helper('pimpinan');
	}

	public function index()
	{ 
	
		$data['title'] = 'Dashboard';
		$data['dosen'] = $this->db->get_where('dosen', ['username' => $this->session->userdata('username')])->row_array();
		
        $this->template->load('layout/pimpinan/template', 'pimpinan/dashboard', $data);

	}


}
