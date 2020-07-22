<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {


	public function __construct()
	{
        parent::__construct();
        is_loginn();
		$this->load->helper('user');
		$this->load->model('user_m');
		
	}

	public function index()
	{ 

		$data['title'] = 'Laporan';
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email_karyawan')])->row_array();
        $data['laporan']= $this->user_m->laporan()->row();
        // var_dump($data['laporan']); die;
        
        $this->template->load('layout/user/template', 'user/laporan', $data);

	}
}