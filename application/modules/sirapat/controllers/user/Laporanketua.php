<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanketua extends MY_Controller {


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
        
        $this->load->view('layout/ketua/header', $data);
        $this->load->view('layout/ketua/maincontent', $data);
        $this->load->view('user/laporanketua', $data);
        $this->load->view('layout/ketua/footer');
        // $this->template->load('layout/user/template', 'user/laporan', $data);

	}
}