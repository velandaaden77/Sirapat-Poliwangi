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
		$data['notifvalidasi']= $this->user_m->notifval()->result();

		// echo json_encode($data['validasi']);

        $this->load->view('layout/ketua/header', $data);
        $this->load->view('layout/ketua/maincontent', $data);
        $this->load->view('user/valid_agenda', $data);
        $this->load->view('layout/ketua/footer');
	}

	public function batalvalidasi($idvalidasi, $idgrup){

		// $idvalidasi = $this->input->post('id_val');

		$where = ['id_validasi' => $idvalidasi ];
		$data=[
			'status' => 0,
			'qrcode' => null,
		];
		$this->db->where($where);
		$this->db->update('validasi_agenda', $data);
		$this->session->set_flashdata('message', 
		'Validasi Dibatalkan');
		redirect('sirapat/user/ketua/validasiagenda/'.$idgrup);
	}

	public function qrcode($id){

		$data['title'] = 'QR Code';
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email_karyawan')])->row_array();

		$data['detailagenda']= $this->user_m->detailagenda()->result();


		$this->load->view('layout/ketua/header', $data);
        $this->load->view('layout/ketua/maincontent', $data);
        $this->load->view('user/qrcode', $data);
		$this->load->view('layout/ketua/footer');
		
	}

	public function validasi($idgrup){

		$id_validasi = $this->input->post('id_validasi');
		$qrcode = $this->input->post('qrcode');
		
		$data= [
			'id_validasi' => $id_validasi,
			'id_pimpinan' => $this->session->userdata('id_karyawan'),
			'qrcode' => $qrcode,
			'status' => 1,
			'date_validasi' => date('Y-m-d'),
		];

		$where= [
			'id_validasi' => $id_validasi,
		];
		
		$this->db->where($where);
		$this->db->update('validasi_agenda', $data);

		$this->session->set_flashdata('message', 
		'Agenda Telah Divalidasi');

		redirect('sirapat/user/ketua/validasiagenda/'.$idgrup);
	}

	public function validasimanual($idvalidasi, $idgrup){

		$where = ['id_validasi' => $idvalidasi];
		// var_dump($where); die;
		$data = [

			'qrcode' => 'ttdmanual.png',
			'status' => 1,
			'date_validasi' => date('Y-m-d h:i:s'),
		];

		$this->db->where($where);
		$this->db->update('validasi_agenda', $data);

		 $this->session->set_flashdata('message', 
		 'Agenda telah divalidasi manual');
		 redirect('sirapat/user/ketua/validasiagenda/'.$idgrup);
	 
	}

	public function daftar_rapat(){

		$data['title'] = 'Daftar Rapat';
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email_karyawan')])->row_array();

		$data['getallagenda']= $this->user_m->getallagenda()->result();

		$this->load->view('layout/ketua/header', $data);
        $this->load->view('layout/ketua/maincontent', $data);
        $this->load->view('user/daftar_rapat', $data);
		$this->load->view('layout/ketua/footer');
		
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

		$this->load->view('layout/ketua/header', $data);
        $this->load->view('layout/ketua/maincontent', $data);
        $this->load->view('user/daftar_rapat', $data);
		$this->load->view('layout/ketua/footer');

	}


}
