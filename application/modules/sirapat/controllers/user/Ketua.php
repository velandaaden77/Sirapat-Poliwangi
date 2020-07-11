<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketua extends MY_Controller {


	public function __construct()
	{
        parent::__construct();
        is_loginn();
		$this->load->helper('user');
		$this->load->model('user_m');
		
	}

	public function validasiagenda()
	{ 

		$data['title'] = 'Validasi Agenda';
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email_karyawan')])->row_array();
		$data['gruprapat'] = $this->user_m->getgruprapat()->result();
        
		$data['validasi']= $this->user_m->getvalidasi()->result();
        

        $this->load->view('layout/ketua/header', $data);
        $this->load->view('layout/ketua/maincontent', $data);
        $this->load->view('user/valid_agenda', $data);
        $this->load->view('layout/ketua/footer');
	}


}
