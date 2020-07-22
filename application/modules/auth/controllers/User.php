<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {

   //untuk memanggil method ke dalam controller
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->model('user_m');
    }

	public function index()
	{

		if($this->session->userdata('email_karyawan')){
		redirect('sirapat/user/dashboard');
		}
		//Set rules form validation
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		//Memvalidasi form
		if($this->form_validation->run() == false){

            $data['title'] = 'Login User';
            
            $this->load->view('layout/auth_header', $data);
            $this->load->view('login/login_user');
			$this->load->view('layout/auth_footer');

		} else {
			$this->_login();
		}
    }
    
    private function _login()
	{

		$this->load->model('user_m');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$email = $email;
		$pass = MD5($password);

		$cek = $this->user_m->cek_login($email, $pass);

		if($cek->num_rows() >  0){ //apabila password cocok

			foreach ($cek->result() as $ck) {
				$session_data['id_karyawan'] = $ck->idkaryawan;
				$session_data['nama_karyawan'] = $ck->nama_karyawan;
				$session_data['email_karyawan'] = $ck->email;
				$session_data['unit_karyawan'] = $ck->unit_id;
				$session_data['role_id_karyawan'] = $ck->role_id;

				$this->session->set_userdata($session_data);
			}

			if($session_data['role_id_karyawan'] == 4 ){
				
				redirect('sirapat/user/dashboard');
				
			}else {
					// //membuat message akun password salah
					$this->session->set_flashdata('message', 
					'<div class="alert alert-danger" role="alert">Role ID salah !</div>');

					//Memindahkan halaman ke halaman index
					redirect('auth/user/index');
			}
		}else {
			//membuat message akun password salah
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger" role="alert">Password Salah!</div>');

			//Memindahkan halaman ke halaman index
			redirect('auth/user/index');
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
            $this->load->view('login/lupapassworduser');
			$this->load->view('layout/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('karyawan', ['email' => $email])->row_array();

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
                redirect('auth/user/lupapassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar atau belum diaktivasi!</div>');
				redirect('auth/user/lupapassword');
            }
        }
    }


    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('karyawan', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal!Token Salah.</div>');
                redirect('auth/user/index');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! Email Salah.</div>');
			redirect('auth/user/index');
        }
	}
	
	public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth/user/index');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ganti Password';
			$this->load->view('layout/auth_header', $data);
            $this->load->view('login/gantipassworduser');
			$this->load->view('layout/auth_footer');
        } else {
            $password = MD5($this->input->post('password1'));
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('karyawan');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password telah di ganti! Silahkan login.</div>');
            redirect('auth/user/index');
        }
    }
    
    public function logout()
	{

		$this->session->unset_userdata('id_karyawan');
		$this->session->unset_userdata('nama_karyawan');
		$this->session->unset_userdata('email_karyawan');
		$this->session->unset_userdata('unit_karyawan');
		$this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id_karyawan');
        
        $this->session->set_flashdata('message', 
        '<div class="alert alert-success" role="alert"> Berhasil Log Out</div>');
    
        redirect('auth/user/index');
			// $this->session->sess_destroy();
			// redirect('Login-User');
	}
}