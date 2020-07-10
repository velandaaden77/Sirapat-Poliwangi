<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		login();
		$this->load->helper('grup');
		$this->load->model('grup_m');
	}

	public function index()
	{ 
	
		$data['title'] = 'Struktur Grup';
		$data['grup'] = $this->db->get_where('grup_tipe', ['nama_grup' => $this->session->userdata('nama_grup')])->row_array();
        
        // $data['anggota'] = $this->grup_m->joingrup()->result();
        $this->template->load('layout/grup/template', 'grup/struktur', $data);

	}


}
