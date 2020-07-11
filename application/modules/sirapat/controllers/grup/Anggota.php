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
	
		$data['title'] = 'Dashboard Grup';
        
        $data['anggota'] = $this->grup_m->joingrup()->result();
        $data['karyawan'] = $this->grup_m->getkaryawan()->result_array();
		$data['grup'] = $this->db->get_where('grup_tipe', ['nama_grup' => $this->session->userdata('nama_grup')])->row_array();

        $this->template->load('layout/grup/template', 'grup/anggota', $data);

    }
    
    public function addanggota(){

        $gruptipe = $this->input->post('gruptipe');
        $karyawan = $this->input->post('karyawan');
        $grupjabatan = $this->input->post('grupjabatan');

        $data = [
            'id_tipe' => $gruptipe,
            'id_karyawan' => $karyawan,
            'id_jabatan' => $grupjabatan,
            'date_created' => date('Y-m-d'),
        ];

        $this->db->insert('grup_rapat', $data);

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success" role="alert">Anggota Telah Ditambahkan</div>');
    
        redirect('sirapat/grup/anggota');
    }

    public function editanggota(){

        $idgrup = $this->input->post('idgrup');
        $gruptipe = $this->input->post('gruptipe');
        $karyawan = $this->input->post('idkaryawan');
        $grupjabatan = $this->input->post('grupjabatan');

        $data = [
            // 'id_tipe' => $gruptipe,
            // 'id_karyawan' => $karyawan,
            'id_jabatan' => $grupjabatan,
             
        ];

        $where = ['id_grup' => $idgrup ];

        $this->db->where($where);
        $this->db->update('grup_rapat', $data);

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success" role="alert">Anggota Telah Diupdate!</div>');
    
        redirect('sirapat/grup/anggota');
    }

    public function delanggota($id){

        $this->db->where('id_grup', $id);
        $this->db->delete('grup_rapat');

        $this->session->set_flashdata('message', 
        '<div class="alert alert-danger" role="alert">Anggota Telah Dihapus!</div>');
    
        redirect('sirapat/grup/anggota');

    }

}
