<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->helper('sirapat');
		
	}

	public function index()
	{ 
		
		//$sess_data = $this->m_dashboard->ambil_data($this->session->userdata['email']);
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('karyawan', ['idkaryawan' => $this->session->userdata('id_karyawan')])->row_array();
		
        $this->template->load('layout/template', 'dashboard/index', $data);

	}

	public function editprofil()
    {
        $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('karyawan', ['idkaryawan' => $this->session->userdata('id_karyawan')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required');

        if ($this->form_validation->run() == false) {
			$this->template->load('layout/template','editprofil/index', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/dashboard/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['foto'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dashboard/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('email', $name);
            $this->db->where('id_karyawan', $this->session->userdata('id_karyawan'));
            $this->db->where('id_tipe', $this->session->userdata('id_tipe'));
            $this->db->update('grup_rapat');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil telah diupdate!</div>');
            redirect('sirapat/admin/dashboard/editprofil');
        }
	}
	
	
    public function gantipassword()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('karyawan', ['idkaryawan' => $this->session->userdata('id_karyawan')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
			$this->template->load('layout/template','editprofil/gantipassword', $data);
        } else {
			$current_password = $this->input->post('current_password');
			$curpass = MD5($current_password);
            $new_password = $this->input->post('new_password1');
            // var_dump($current_password, $new_password); die;
            $p = $this->db->get_where('grup_rapat', ['email' => $this->session->userdata('email')])->row_array();
            if ($curpass != $p['password']) {
                $this->session->set_flashdata('message2', '<div class="alert alert-danger" role="alert">Password lama salah!</div>');
                redirect('sirapat/admin/dashboard/gantipassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message2', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama!</div>');
					redirect('sirapat/admin/dashboard/gantipassword');
                } else {
                    // password sudah ok
                    $password_hash = MD5($new_password);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('grup_rapat');

                    $this->session->set_flashdata('message', 'Password telah diganti!');
					redirect('sirapat/admin/dashboard/gantipassword');
                }
            }
        }
    }


}
