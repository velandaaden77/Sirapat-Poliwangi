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

	
	public function editprofil()
    {
        $data['title'] = 'Edit Profil';
		$data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email_karyawan')])->row_array();
		// var_dump($this->session->userdata('email_karyawan')); die;
        $this->form_validation->set_rules('name', 'Full Name', 'required');

        if ($this->form_validation->run() == false) {
			$this->template->load('layout/user/template','user/editprofil', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/dashboard/img/profile/user/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['foto'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dashboard/img/profile/user/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('nama_karyawan', $name);
            $this->db->where('email', $email);
            $this->db->update('karyawan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil telah diupdate!</div>');
            redirect('sirapat/user/dashboard/editprofil');
        }
	}

	
    public function gantipassword()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('karyawan', ['email' => $this->session->userdata('email_karyawan')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
			$this->template->load('layout/user/template','user/gantipassword', $data);
        } else {
			$current_password = $this->input->post('current_password');
			$curpass = MD5($current_password);
            $new_password = $this->input->post('new_password1');
			// var_dump($current_password, $new_password); die;
            if ($curpass != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah!</div>');
                redirect('sirapat/user/dashboard/gantipassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama!</div>');
					redirect('sirapat/user/dashboard/gantipassword');
                } else {
                    // password sudah ok
                    $password_hash = MD5($new_password);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email_karyawan'));
                    $this->db->update('karyawan');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password telah diganti!</div>');
					redirect('sirapat/user/dashboard/gantipassword');
                }
            }
        }
    }

}
