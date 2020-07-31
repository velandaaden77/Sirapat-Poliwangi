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

	public function filterdata(){

		if($this->input->post('bulan') == '01'){
		$bln2 = 'Januari';
		}elseif($this->input->post('bulan') == '02'){
			$bln2 = 'Februari';
		}elseif($this->input->post('bulan') == '03'){
			$bln2 = 'Maret';
		}elseif($this->input->post('bulan') == '04'){
			$bln2 = 'April';
		}elseif($this->input->post('bulan') == '05'){
			$bln2 = 'Mei';
		}elseif($this->input->post('bulan') == '06'){
			$bln2 = 'Juni';
		}elseif($this->input->post('bulan') == '07'){
			$bln2 = 'Juli';
		}elseif($this->input->post('bulan') == '08'){
			$bln2 = 'Agustus';
		}elseif($this->input->post('bulan') == '09'){
			$bln2 = 'September';
		}elseif($this->input->post('bulan') == '10'){
			$bln2 = 'Oktober';
		}elseif($this->input->post('bulan') == '11'){
			$bln2 = 'November';
		}elseif($this->input->post('bulan') == '12'){
			$bln2 = 'Desember';
		}

		if(empty($this->input->post('tahun')) || empty($this->input->post('bulan'))){

		$data['title'] = 'Daftar dsdsdsdsdss';

	

		}else {
			
		$data = [
			
			'title' => 'Daftar Rapat'
		
		];
		


		}

		$data['title'] = 'Daftar Rapat';
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email_karyawan')])->row_array();

		$this->load->view('layout/anggota/header', $data);
        $this->load->view('layout/anggota/maincontent', $data);
        $this->load->view('user/daftar_rapatanggota', $data);
        $this->load->view('layout/anggota/footer');

	}



}
