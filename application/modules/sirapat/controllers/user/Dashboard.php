<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {


	public function __construct()
	{
        parent::__construct();
        is_loginn();
		$this->load->helper('user');
		$this->load->model('user_m');
		
	}

	public function index()
	{ 

		$data['title'] = 'User Dashboard';
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email_karyawan')])->row_array();
		$data['gruprapat'] = $this->user_m->getgruprapat()->result();
		$data['notifval'] = $this->user_m->notifval()->num_rows();
        $this->template->load('layout/user/template', 'user/dashboard', $data);

	}

	public function check_access(){

		$idgrup = $this->input->post('id_grup');
		

		$karyawan = $this->user_m->checkaccess($idgrup)->row();

		// var_dump($karyawan); die;

		if($karyawan->id_jabatan == 1){
			redirect('sirapat/user/ketua/validasiagenda/'.$idgrup);

			
		}else{

			if($karyawan->id_jabatan == 5){
				redirect('sirapat/user/anggota/daftarrapat/'.$idgrup);
			}else {
				
					redirect('sirapat/user/anggota/daftarrapat/'.$idgrup);
		}
			
		}
	}

}
