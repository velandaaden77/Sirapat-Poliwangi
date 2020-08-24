<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		login();
		$this->load->helper('grup');
		$this->load->model('grup_m');
	}

	public function index()
	{ 
	
		$data['title'] = 'Anggota';
        
        $data['anggota'] = $this->grup_m->joingrup()->result();
        $data['karyawan'] = $this->grup_m->getkaryawan()->result_array();
		$data['grup'] = $this->db->get_where('grup_tipe', ['nama_grup' => $this->session->userdata('nama_grup')])->row_array();
        // var_dump($this->session->userdata('nama_grup')); die;
        $this->template->load('layout/grup/template', 'grup/anggota', $data);

    }
    
    public function addanggota(){

        $this->form_validation->set_rules('karyawan', 'Karyawan', 'required');
        $this->form_validation->set_rules('grupjabatan', 'Grup Jabatan', 'required');

        if($this->form_validation->run() == false){
            $data['title'] = 'Anggota';
        
            $data['anggota'] = $this->grup_m->joingrup()->result();
            $data['karyawan'] = $this->grup_m->getkaryawan()->result_array();
            $data['grup'] = $this->db->get_where('grup_tipe', ['nama_grup' => $this->session->userdata('nama_grup')])->row_array();
            // var_dump($this->session->userdata('nama_grup')); die;
            $this->template->load('layout/grup/template', 'grup/anggota', $data);

        }else{
        $gruptipe = $this->input->post('gruptipe');
        $karyawan = $this->input->post('karyawan');
        $grupjabatan = $this->input->post('grupjabatan');

        $data = [
            'id_tipe' => $gruptipe,
            'id_karyawan' => $karyawan,
            'id_jabatan' => $grupjabatan,
            'date_created' => date('Y-m-d'),
        ];
// var_dump($this->session->userdata('username')); die;
        $a = $this->db->get_where('karyawan', ['idkaryawan' => $karyawan])->row();
    //    var_dump($a->email); die;
        $data2 = [
            'id_tipe' => $gruptipe,
            'id_karyawan' => $karyawan,
            'id_jabatan' => $grupjabatan,
            'date_created' => date('Y-m-d'),
            'email' => $a->email.'@'.$this->session->userdata('username').'.com',
            'password' => MD5(123),
            'role_id' => 1
        ];

        if($grupjabatan == 3){
        $this->db->insert('grup_rapat', $data2);

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success" role="alert">Anggota Telah Ditambahkan</div>');
    
        redirect('sirapat/grup/anggota');

        }else{
            $this->db->insert('grup_rapat', $data);

            $this->session->set_flashdata('message', 
            '<div class="alert alert-success" role="alert">Anggota Telah Ditambahkan</div>');
        
            redirect('sirapat/grup/anggota');
        }
    }
       
    }

    public function editanggota(){

        $idgrup = $this->input->post('idgrup');
        $gruptipe = $this->input->post('gruptipe');
        $karyawan = $this->input->post('idkar');
        $grupjabatan = $this->input->post('grupjabatan');
        $a = $this->db->get_where('karyawan', ['idkaryawan' => $karyawan])->row();

        $data = [
            // 'id_tipe' => $gruptipe,
            // 'id_karyawan' => $karyawan,
            'id_jabatan' => $grupjabatan,
            'password' => NULL,
            'email' => NULL,
            'role_id' => NULL,
             
        ];
        $data2 = [
            // 'id_tipe' => $gruptipe,
            // 'id_karyawan' => $karyawan,
            'id_jabatan' => $grupjabatan,
            'password' => MD5(123),
            'email' => $this->session->userdata('username').'-'.$a->nik_nip,
            'role_id' => 1,
             
        ];

        $where = ['id_grup' => $idgrup ];

        if($grupjabatan == 3){
            $this->db->where($where);
            $this->db->update('grup_rapat', $data2);
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success" role="alert">Anggota Telah Diupdate!</div>');
        
            redirect('sirapat/grup/anggota');
        }else{
        $this->db->where($where);
        $this->db->update('grup_rapat', $data);

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success" role="alert">Anggota Telah Diupdate!</div>');
    
        redirect('sirapat/grup/anggota');
        }
    }

    public function delanggota($id){

        $this->db->where('id_grup', $id);
        $this->db->delete('grup_rapat');

        $this->session->set_flashdata('message', 
        '<div class="alert alert-danger" role="alert">Anggota Telah Dihapus!</div>');
    
        redirect('sirapat/grup/anggota');

    }

}
