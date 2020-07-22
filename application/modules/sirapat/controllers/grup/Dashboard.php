<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		login();
		$this->load->helper('grup');
	}

	public function index()
	{ 
	
		$data['title'] = 'Dashboard Grup';
		$data['grup'] = $this->db->get_where('grup_tipe', ['nama_grup' => $this->session->userdata('nama_grup')])->row_array();
		
        $this->template->load('layout/grup/template', 'grup/dashboard', $data);


	}

	public function setting()
	{ 
	
		$data['title'] = 'Setting Grup';
		$data['grup'] = $this->db->get_where('grup_tipe', ['nama_grup' => $this->session->userdata('nama_grup')])->row_array();
        $this->template->load('layout/grup/template', 'grup/setting', $data);
	}


	public function editprofil()
    {
        $data['title'] = 'Edit Profil';
        $data['grup'] = $this->db->get_where('grup_tipe', ['nama_grup' => $this->session->userdata('nama_grup')])->row_array();

        $this->form_validation->set_rules('username', 'Username', 'required|trim');

        if ($this->form_validation->run() == false) {
			$this->template->load('layout/grup/template','grup/editprofil', $data);
        } else {
            $username = $this->input->post('username');
            $namagrup = $this->input->post('nama_grup');

            $this->db->set('username', $username);
            $this->db->where('nama_grup', $namagrup);
            $this->db->update('grup_tipe');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Username telah diupdate!</div>');
            redirect('sirapat/grup/dashboard/editprofil');
        }
	}
	
	
    public function gantipassword()
    {
        $data['title'] = 'Ganti Password';
        $data['grup'] = $this->db->get_where('grup_tipe', ['nama_grup' => $this->session->userdata('nama_grup')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
			$this->template->load('layout/grup/template','grup/gantipassword', $data);
        } else {
			$current_password = $this->input->post('current_password');
			$curpass = MD5($current_password);
            $new_password = $this->input->post('new_password1');
			// var_dump($current_password, $new_password); die;
            if ($curpass != $data['grup']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah!</div>');
                redirect('sirapat/grup/dashboard/gantipassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama!</div>');
					redirect('sirapat/grup/dashboard/gantipassword');
                } else {
                    // password sudah ok
                    $password_hash = MD5($new_password);

                    $this->db->set('password', $password_hash);
                    $this->db->where('id', $this->session->userdata('idgrup'));
                    $this->db->update('grup_tipe');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password telah diganti!</div>');
					redirect('sirapat/grup/dashboard/gantipassword');
                }
            }
        }
    }

}
