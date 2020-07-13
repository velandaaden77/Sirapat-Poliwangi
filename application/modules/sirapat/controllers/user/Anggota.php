<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends MY_Controller {


	public function __construct()
	{
        parent::__construct();
        is_loginn();
		$this->load->helper('user');
		$this->load->model('user_m');
		
	}

	public function daftarrapat()
	{ 

		$data['title'] = 'Daftar Rapat';
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email_karyawan')])->row_array();
		$data['gruprapat'] = $this->user_m->getgruprapat()->result();
        
		$data['getallagenda']= $this->user_m->getallagenda()->result();

        $this->load->view('layout/anggota/header', $data);
        $this->load->view('layout/anggota/maincontent', $data);
        $this->load->view('user/daftar_rapatanggota', $data);
        $this->load->view('layout/anggota/footer');
	}


}
