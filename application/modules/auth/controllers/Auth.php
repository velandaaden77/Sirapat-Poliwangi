<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

	//untuk memanggil method ke dalam controller
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->model('Login_model');
    }


	public function index()
	{

		if($this->session->userdata('email')){
			redirect('sirapat/admin/Dashboard');
		}
		
		//Set rules form validation
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		//Memvalidasi form
		if($this->form_validation->run() == false){

			$data['title'] = 'User Login';

            $this->load->view('layout/auth_header', $data);
            $this->load->view('login/login');
			$this->load->view('layout/auth_footer');

		} else {

			$this->_login();

		}

	}

	// public function loginn()
	// {
		
		
	// 	$post = $this->input->post(null, TRUE);
		

	// 	if(isset($post['submit'])){

	// 		$this->load->model('Login_model');
	// 		$query = $this->Login_model->login($post);

	// 		if($query->num_rows() > 0 ){

	// 			//mengambil data satu baris dari database
	// 			$row = $query->row();

	// 			//mengambil session
	// 			$session_data = array(

	// 				'nama_lengkap' => $row->nama_lengkap,
	// 				'email' => $row->email,
	// 				'role_id' => $row->role_id
	// 			);

	// 			//set session
	// 			$this->session->set_userdata($session_data);
				
	// 			redirect('Dashboard');
	// 		}else {
				
	// 				//membuat message akun password salah
	// 				$this->session->set_flashdata('message', 
	// 				'<div class="alert alert-danger" role="alert">Password Salah!</div>');

	// 				//Memindahkan halaman ke halaman index
	// 				redirect('auth/index');

	// 		}
	// 	}
	// }

	private function _login()
	{

		$this->load->model('Login_model');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $email;
		$pass = MD5($password);

		$cek = $this->Login_model->cek_login($user, $pass);

		

		if($cek->num_rows() >  0){ //apabila password cocok

			foreach ($cek->result() as $ck) {
				
				$session_data['iduser'] = $ck->iduser;
				$session_data['nama'] = $ck->nama;
				$session_data['email'] = $ck->email;
				$session_data['role_id'] = $ck->role_id;

				$this->session->set_userdata($session_data);

			}
			if($session_data['role_id'] == 1 ){
				
				redirect('sirapat/admin/dashboard');
				
			}else {

				if($sesssion_data['role_id'] == 2){

					redirect('sirapat/pimpinan/dashboard');
					
				}else {
					
					redirect('sirapat/superadmin/dashboard');
				}

					// //membuat message akun password salah
					// $this->session->set_flashdata('message', 
					// '<div class="alert alert-danger" role="alert">Password Salah!</div>');

					// //Memindahkan halaman ke halaman index
					// redirect('auth/index');
			}
		}else {
			//membuat message akun password salah
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger" role="alert">Password Salah!</div>');

			//Memindahkan halaman ke halaman index
			redirect('auth/index');
		}
//---------------------------------------------------------------------
	// 	// //Mengambil data dari inputan 
	// 	// $email = $this->input->post('email');
	// 	// $password = $this->input->post('password');

	// 	// //ambil data di database didalam tabel user
	// 	// $user = $this->db->get_where('user', ['email' => $email])->row_array();

	// 	// //Jika usernya ada
	// 	// if($user){

	// 	// 	//Jika usernya aktif
	// 	// 	if($user['is_actived'] == 1){

	// 	// 		//Cek password
	// 	// 		if(password_verify($password, $user['password'])) { //Untuk memverifikasi inputan terhadap password di database

	// 	// 			//Menyimpan data user ke dalam session
	// 	// 			$data = [
	// 	// 				'email' => $user['email'],
	// 	// 				'role_id' => $user['role_id']
	// 	// 			];
					
	// 	// 			$this->session->set_userdata($data);
	// 	// 			redirect('sirapat/dashboard');

	// 	// 		} else {

	// 	// 			//membuat message akun password salah
	// 	// 			$this->session->set_flashdata('message', 
	// 	// 			'<div class="alert alert-danger" role="alert">Password Salah!</div>');

	// 	// 			//Memindahkan halaman ke halaman index
	// 	// 			redirect('auth/index');
			
	// 	// 		}

	// 	// 	} else {
				
	// 	// 	//membuat message akun belum aktif
	// 	// 	$this->session->set_flashdata('message', 
	// 	// 	'<div class="alert alert-danger" role="alert">Akun belum aktif</div>');

	// 	// 	//Memindahkan halaman ke halaman index
	// 	// 	redirect('auth/index');
	// 	// 	}
			
	// 	// } else {
			
	// 	// 	//Jika usernya tidak ada
	// 	// 	//membuat message akun belum terdaftar
	// 	// 	$this->session->set_flashdata('message', 
	// 	// 	'<div class="alert alert-danger" role="alert">Akun belum terdaftar</div>');

	// 	// 	//Memindahkan halaman ke halaman index
	// 	// 	redirect('auth/index');

	// 	// }
		

	}

	// public function check_account()
    // {
    //     //validasi login
    //     $email      = $this->input->post('email');
    //     $password   = $this->input->post('password');

    //     //ambil data dari database untuk validasi login
    //     $query = $this->Login_model->check_account($email, $password);

	// 	// untuk mengecek email
    //     if ($query === 1) {
	// 		$this->session->set_flashdata('message', 
	// 		'<div class="alert alert-danger" role="alert">Akun belum terdaftar</div>');
	// 	// untuk akun belum aktif
    //     } elseif ($query === 2) {
	// 		$this->session->set_flashdata('message', 
	// 		'<div class="alert alert-danger" role="alert">Akun belum aktif</div>');
	// 	// pengecekan untuk password 
    //     } elseif ($query === 3) {
    //         $this->session->set_flashdata('message', 
	// 		'<div class="alert alert-danger" role="alert">Maaf password salah!</div>');
    //     } else {
    //         //membuat session dengan nama userData yang artinya nanti data ini bisa di ambil sesuai dengan data yang login
    //         $userdata = array(
	// 			'is_login'    => true,
    //             'email' => $user['email'],
	// 			'role_id' => $user['role_id']
    //         );
    //         $this->session->set_userdata($userdata);
    //         return true;
    //     }
    // }

	// public function login(){

	// 	// $site = $this->Login_model->listing();
		
			
	// 		$data['title'] = 'User Login';

    //         $this->load->view('layout/auth_header', $data);
    //         $this->load->view('login/login');
	// 		$this->load->view('layout/auth_footer');
		

	// 	//melakukan pengalihan halaman sesuai dengan levelnya
    //     if ($this->session->userdata('role_id') == 1) {
    //         redirect('Dashboard');
    //     }

    //     //proses login dan validasi nya
    //     if ($this->input->post('submit')) {
			
    //         $this->form_validation->set_rules('email', 'Email', 'trim|required|valid)email');
    //         $this->form_validation->set_rules('password', 'Passwordd', 'trim|required');
    //         $error = $this->check_account();

    //         if ($this->form_validation->run() && $error === true) {
    //             $data = $this->Login_model->check_account($this->input->post('email'), $this->input->post('password'));

    //             //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
    //             if ($data->role_id == 1) {
    //                 redirect('Dashboard');
    //             }
    //         } else {
	// 			redirect('Login-User');
    //             // $this->template->load('layout/template', 'login/login', $data);
    //         }
    //     } else {
			
    //         $data['title'] = 'User Login';

    //         $this->load->view('layout/auth_header', $data);
    //         $this->load->view('login/login');
	// 		$this->load->view('layout/auth_footer');
		
	// 	}
		
	// }

	public function registration()
	{
		if($this->session->userdata('email')){
			redirect('sirapat/admin/dashboard');
		}
		//rules form validation
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nik', 'Nik/Nip', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]'); 
        $this->form_validation->set_rules('no_hp', 'NoHp', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont matches!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			
			$data['title'] = 'User Registration';

            $this->load->view('layout/auth_header', $data);
            $this->load->view('login/registration');
			$this->load->view('layout/auth_footer');
			
		} else {

			//menyiapkan data utuk di insert ke database
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'niknip' => htmlspecialchars($this->input->post('nik', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
				'idjabatan' => htmlspecialchars($this->input->post('jabatan', true)),
				'idprodi' => htmlspecialchars($this->input->post('prodi', true)),
				'foto' => 'default.jpg',
				//'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'password' => MD5($this->input->post('password1')),
				'role_id' => 1,
				'is_actived' => 1,
				'date_created' => time()
			];

			//insert data ke database
			$this->db->insert('user', $data);

			//membuat message berhasil login dengan session
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success" role="alert">Akun telah terdaftar! Silahkan Login!</div>');

			//Memindahkan halaman ke halaman index
			redirect('auth/index');
	}
	}

	public function logout()
	{
		$this->session->unset_userdata('iduser');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nama');
        $this->session->unset_userdata('role_id');
        
        $this->session->set_flashdata('message', 
        '<div class="alert alert-success" role="alert"> Berhasil Log Out</div>');
    
        redirect('auth/index');
			// $this->session->sess_destroy();
			// redirect('Login-User');
	}

	public function blocked(){

		$this->load->view('login/blocked');
	}

	public function indexpimpinan()
	{

		if($this->session->userdata('username')){
			redirect('sirapat/pimpinan/dashboard');
		}
		
		//Set rules form validation
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		//Memvalidasi form
		if($this->form_validation->run() == false){

			$data['title'] = 'User Login';

            $this->load->view('layout/auth_header', $data);
            $this->load->view('login/login');
			$this->load->view('layout/auth_footer');

		} else {

			$this->_loginpimpinan();

		}

	}

	private function _loginpimpinan()
	{

		$this->load->model('Loginpimpinan_m');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $username;
		$pass = MD5($password);

		$cek = $this->Loginpimpinan_m->cek_login($user, $pass);

		

		if($cek->num_rows() >  0){ //apabila password cocok

			foreach ($cek->result() as $ck) {
				
				$session_data['id'] = $ck->id;
				$session_data['username'] = $ck->username;
				$session_data['role_id'] = $ck->role_id;

				$this->session->set_userdata($session_data);

			}
			if($session_data['role_id'] == 2 ){
				
				redirect('sirapat/pimpinan/validasi');
				
			}else {
					// //membuat message akun password salah
					$this->session->set_flashdata('message', 
					'<div class="alert alert-danger" role="alert">Role ID salah !</div>');

					//Memindahkan halaman ke halaman index
					redirect('auth/index');
			}
		}else {
			//membuat message akun password salah
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger" role="alert">Password Salah!</div>');

			//Memindahkan halaman ke halaman index
			redirect('auth/index');
		}

	}

}
