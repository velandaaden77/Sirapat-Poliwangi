<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		login();
		$this->load->helper('grup');
	}

	public function index()
	{ 
	
		$data['title'] = 'Dashboard Grup';
		$data['grup'] = $this->db->get_where('grup_tipe', ['nama_grup' => $this->session->userdata('nama_grup')])->row_array();
		
        $this->template->load('layout/grup/template', 'grup/dashboard', $data);


	}

	public function setting()
	{ 
	
		$data['title'] = 'Setting Grup';
		$data['grup'] = $this->db->get_where('grup_tipe', ['nama_grup' => $this->session->userdata('nama_grup')])->row_array();
		
		
        $this->template->load('layout/grup/template', 'grup/setting', $data);


	}


}
