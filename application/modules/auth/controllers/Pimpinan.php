<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends MX_Controller {

   //untuk memanggil method ke dalam controller
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->model('Pimpinan_m');
    }

	public function index()
	{

		if($this->session->userdata('username')){
			redirect('sirapat/pimpinan/dashboard');
		}
		//Set rules form validation
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		//Memvalidasi form
		if($this->form_validation->run() == false){

            $data['title'] = 'Login Pimpinan';
            
            $this->load->view('layout/auth_header', $data);
            $this->load->view('login/login_pimpinan');
			$this->load->view('layout/auth_footer');

		} else {
			$this->_login();
		}
    }
    
    private function _login()
	{

		$this->load->model('Pimpinan_m');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $username;
		$pass = MD5($password);

		$cek = $this->Pimpinan_m->cek_login($user, $pass);

		if($cek->num_rows() >  0){ //apabila password cocok

			foreach ($cek->result() as $ck) {
				$session_data['id_dosen'] = $ck->id;
				$session_data['nama_dosen'] = $ck->nama;
				$session_data['username'] = $ck->username;
				$session_data['role_id_dosen'] = $ck->role_id;

				$this->session->set_userdata($session_data);
			}
			if($session_data['role_id'] == 2 ){
				
				redirect('sirapat/pimpinan/dashboard');
				
			}else {
					// //membuat message akun password salah
					$this->session->set_flashdata('message', 
					'<div class="alert alert-danger" role="alert">Role ID salah !</div>');

					//Memindahkan halaman ke halaman index
					redirect('auth/pimpinan/index');
			}
		}else {
			//membuat message akun password salah
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger" role="alert">Password Salah!</div>');

			//Memindahkan halaman ke halaman index
			redirect('auth/pimpinan/index');
		}

    }
    
    public function logout()
	{

		$this->session->unset_userdata('id_dosen');
		$this->session->unset_userdata('nama_dosen');
		$this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id_dosen');
        
        $this->session->set_flashdata('message', 
        '<div class="alert alert-success" role="alert"> Berhasil Log Out</div>');
    
        redirect('auth/pimpinan/index');
			// $this->session->sess_destroy();
			// redirect('Login-User');
	}
}