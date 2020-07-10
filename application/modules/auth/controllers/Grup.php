<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grup extends MX_Controller {

   //untuk memanggil method ke dalam controller
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->model('Grup_m');
    }

	public function index()
	{

		if($this->session->userdata('idgrup')){
		redirect('sirapat/grup/dashboard');
		}
		//Set rules form validation
		$this->form_validation->set_rules('nama_grup', 'Nama Grup', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		//Memvalidasi form
		if($this->form_validation->run() == false){

            $data['title'] = 'Login Grup';
            
            $this->load->view('layout/auth_header', $data);
            $this->load->view('login/login_grup');
			$this->load->view('layout/auth_footer');

		} else {
			$this->_login();
		}
    }
    
    private function _login()
	{

		$this->load->model('Grup_m');
		$namagrup = $this->input->post('nama_grup');
		$password = $this->input->post('password');

		$namagrup = $namagrup;
		$pass = MD5($password);

		$cek = $this->Grup_m->cek_login($namagrup, $pass);

		if($cek->num_rows() >  0){ //apabila password cocok

			foreach ($cek->result() as $ck) {

				$session_data['idgrup'] = $ck->id;
                $session_data['nama_grup'] = $ck->nama_grup;
                $session_data['role_id_grup'] = $ck->role_id;
                
				$this->session->set_userdata($session_data);
            }
            
			if($session_data['role_id_dosen'] == 6 ){
				
				redirect('sirapat/grup/dashboard');
				
			}else {
					// //membuat message akun password salah
					$this->session->set_flashdata('message', 
					'<div class="alert alert-danger" role="alert">Role ID salah !</div>');

					//Memindahkan halaman ke halaman index
					redirect('auth/grup/index');
			}
		}else {
			//membuat message akun password salah
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger" role="alert">Password Salah!</div>');

			//Memindahkan halaman ke halaman index
			redirect('auth/grup/index');
		}

    }
    
    public function logout()
	{

		$this->session->unset_userdata('idgrup');
		$this->session->unset_userdata('nama_grup');
		$this->session->unset_userdata('role_id_grup');
        
        $this->session->set_flashdata('message', 
        '<div class="alert alert-success" role="alert"> Berhasil Log Out</div>');
    
        redirect('auth/grup/index');
			// $this->session->sess_destroy();
			// redirect('Login-User');
	}
}