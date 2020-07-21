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

			$data['title'] = 'Login Admin';

            $this->load->view('layout/auth_header', $data);
            $this->load->view('login/login');
			$this->load->view('layout/auth_footer');

		} else {

			$this->_login();

		}

	}

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

				
			}
		}else {
			//membuat message akun password salah
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger" role="alert">Password Salah!</div>');

			//Memindahkan halaman ke halaman index
			redirect('auth/index');
		}
	}

	
	public function registration()
	{
		if($this->session->userdata('email')){
			redirect('sirapat/admin/dashboard');
		}
		//rules form validation
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nik', 'Nik/Nip', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]'); 
        // $this->form_validation->set_rules('no_hp', 'NoHp', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			
			$data['title'] = 'Registrasi';

            $this->load->view('layout/auth_header', $data);
            $this->load->view('login/registration');
			$this->load->view('layout/auth_footer');
			
		} else {
			$email = $this->input->post('email', true);
			//menyiapkan data utuk di insert ke database
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'niknip' => htmlspecialchars($this->input->post('nik', true)),
				'email' => htmlspecialchars($email),
				// 'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
				'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
				'unit' => htmlspecialchars($this->input->post('unit', true)),
				'foto' => 'default.jpg',
				//'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'password' => MD5($this->input->post('password1')),
				'role_id' => 1,
				'is_actived' => 1,
				'date_created' => date('Y-m-d')
			];

				// // siapkan token
				// $token = base64_encode(random_bytes(32));
				// $user_token = [
				// 	'email' => $email,
				// 	'token' => $token,
				// 	'date_created' => time()
				// ];

				$this->db->insert('user', $data);
				// $this->db->insert('user_token', $user_token);

				// $this->_sendEmail($token, 'verify');

			//membuat message berhasil login dengan session
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success" role="alert">Akun telah terdaftar! Silahkan Login!</div>');

			//Memindahkan halaman ke halaman index
			redirect('auth/index');
	}
	}

	private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'velandaaden77@gmail.com',
            'smtp_pass' => 'pradipta1998',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
            // 'newline'   => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->initialize($config);

        $this->email->from('velandaaden77@gmail.com', 'SISTEM MANAJEMEN RAPAT POLIWANGI');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Klik link berikut untuk verifikasi akun : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link berikut untuk reset password anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
	}
	
    public function lupapassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lupa Password';
			$this->load->view('layout/auth_header', $data);
            $this->load->view('login/lupapassword');
			$this->load->view('layout/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_actived' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan cek email anda untuk reset password!</div>');
                redirect('auth/lupapassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar atau belum diaktivasi!</div>');
				redirect('auth/lupapassword');
            }
        }
    }


    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal!Token Salah.</div>');
                redirect('auth/index');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! Email Salah.</div>');
			redirect('auth/index');
        }
	}
	
	public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth/index');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
			$this->load->view('layout/auth_header', $data);
            $this->load->view('login/gantipassword');
			$this->load->view('layout/auth_footer');
        } else {
            $password = MD5($this->input->post('password1'));
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password telah di ganti! Silahkan login.</div>');
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


		$this->load->view('layout/auth_header');
		$this->load->view('login/blocked');
		$this->load->view('layout/auth_footer');
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
