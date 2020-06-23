<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->helper('pimpinan');
		$this->load->model('Pimpinan_m');
	}

	public function index()
	{ 
	
		$this->load->model('pimpinan_m');
		$data['title'] = 'Validasi';
		$data['dosen'] = $this->db->get_where('dosen', ['username' => $this->session->userdata('username')])->row_array();
		$data['row']= $this->pimpinan_m->get();

		$data['validasi']= $this->pimpinan_m->getvalidasi()->result();
        $this->template->load('layout/pimpinan/template', 'pimpinan/validasi', $data);

	}

	public function qrcode($id){

		$this->load->model('pimpinan_m');
	
		$data['title'] = 'QR Code';
		$data['dosen'] = $this->db->get_where('dosen', ['username' => $this->session->userdata('username')])->row_array();

		$data['row']= $this->pimpinan_m->get()->row();
		$data['validasi']= $this->pimpinan_m->getvalidasi()->result();

		$this->template->load('layout/pimpinan/template', 'pimpinan/qrcode', $data);

	}

	public function coba_qrcode(){

		$qrCode = new Endroid\QrCode\QrCode('Velanda Aden Pradipta');

		header('Content-Type: '.$qrCode->getContentType());
		echo $qrCode->writeString();

	}

	public function validasi_agenda(){

		$id_agenda = $$this->input->post('id_validasi');
		$qrcode = $this->input->post('qrcode');

		$data= [

			'id_agenda' => $qrcode,
			'qrcode' => $qrcode,
			'status' => 1,

		];

		$where= [
			'id_agenda' => $id_agenda
		];

		$this->db->where($where);
		$this->db->update('validasi_agenda', $data);

		$this->session->set_flashdata('message', 
		'<div class="alert alert-success" role="alert">Agenda telah divalidasi</div>');

		redirect('sirapat/pimpinan/validasi');
	}
 
	

}
