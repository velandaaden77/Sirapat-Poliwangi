<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_grup extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_logged_in();
        $this->load->helper('sirapat');
        $this->load->model('superadmin_m');
        $this->load->library('form_validation');
    }

    public function index(){


        $data['title'] = 'Manajemen Grup';
    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['karyawan'] = $this->superadmin_m->getkaryawan()->result();
        $data['unit'] = $this->db->get('karyawan_unit')->result_array();

        $data['grup'] = $this->db->get('grup_tipe')->result();
        $data['jmlgrup'] = $this->superadmin_m->jumlahanggota()->num_rows();

        $this->template->load('layout/template', 'superadmin/manajemen_grup', $data);

    }

    public function tambahgrup(){
        
        $this->form_validation->set_rules('grup', 'Grup', 'required');

        if($this->form_validation->run() == false){

            $data['title'] = 'Manajemen Grup';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['unit'] = $this->db->get('karyawan_unit')->result_array();
            $data['grup'] = $this->db->get('grup_tipe')->result();
            $data['jmlgrup'] = $this->superadmin_m->jumlahanggota()->num_rows();
    
            $this->template->load('layout/template', 'superadmin/manajemen_grup', $data);

        }else{

            $grup = $this->input->post('grup', true);

            $data = [
                'nama_grup' => $grup,
                'password' => MD5(123),
                'role_id' => 6,
            ];

            $datagrup = $this->db->get_where('grup_tipe', ['nama_grup' => $grup])->result();
            
            if(empty($datagrup)){ 
                $this->db->insert('grup_tipe', $data);
                $this->session->set_flashdata('message', 'Grup Telah Ditambahkan');
    
            redirect('sirapat/superadmin/manajemen_grup');
        }else{
            $this->session->set_flashdata('message1', 'Grup telah ada!');
            redirect('sirapat/superadmin/manajemen_grup');
            }
            
        }
    
    }

    public function detailgrup(){
       
        $data['grup'] = $this->superadmin_m->joingrup()->result();
        $data['tipegrup'] = $this->db->get('grup_tipe')->result_array();
        $data['title'] = 'Detail Grup';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['karyawan'] = $this->superadmin_m->getkaryawan()->result_array();
        $this->template->load('layout/template', 'superadmin/detail_grup', $data);

    }

    public function delanggota($id, $idgrup){

        $this->db->where('id_grup', $id);
        $this->db->delete('grup_rapat');

        $this->session->set_flashdata('message', 
        'Anggota Telah Dihapus!!!');
    
        redirect('sirapat/superadmin/manajemen_grup/detailgrup/'.$idgrup);

    }

    public function addanggota(){

        $gruptipe = $this->input->post('gruptipe');
        $karyawan = $this->input->post('karyawan');

        $data = [
            'id_tipe' => $gruptipe,
            'id_karyawan' => $karyawan,
            'date_created' => time(),
        ];

        $this->db->insert('grup_rapat', $data);
        $this->session->set_flashdata('message', 
        'Anggota Telah Ditambahkan');
    
        redirect('sirapat/superadmin/manajemen_grup/detailgrup/'.$gruptipe);
    }

    public function delgrup($id){

        $where = ['id' => $id];

        $this->db->delete('grup_tipe', $where);
        $this->session->set_flashdata('message', 'Grup telah dihapus!');
        redirect('sirapat/superadmin/manajemen_grup');
    }

}