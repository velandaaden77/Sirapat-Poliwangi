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

	public function validasi_m(){

		$validasi_id = $this->input->post('validasiId');
		$agenda_id = $this->input->post('agendaId');

		$where = ['id_agenda' => $agenda_id, 'id_validasi' =>$validasi_id];
		// var_dump($validasi_id); die;
 
		$data = [

			'id_validasi' => $validasi_id,
			'id_agenda' => $agenda_id,
			'id_pimpinan' => $this->session->userdata('id_dosen'),
			'qrcode' => 'ttdmanual.jpg',
			'status' => 1,
			'date_validasi' => date('Y-m-d h:i:s'),

		];

		
		$data2 = [

			'id_validasi' => $validasi_id,
			'id_pimpinan' => $this->session->userdata('id_dosen'),
			'qrcode' => null,
			'status' => 0,
		];
 
		$result = $this->db->get_where('validasi_agenda', $where);
 
		if($result->status == 0 ){
			$this->db->update('validasi_agenda', $data);
		}else{
			$this->db->update('validasi_agenda', $data2);
		}

		 $this->session->set_flashdata('message', 
		 '<div class="alert alert-success" role="alert">Agenda telah Divalidasi</div>');
		 redirect('sirapat/user/ketua/validasiagenda');
	 
	}


}
