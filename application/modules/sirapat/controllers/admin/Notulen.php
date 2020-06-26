<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notulen extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		is_logged_in();
        $this->load->model('notulen_m');
        $this->load->library('pdf_generator');
    }

    public function index(){

        $data['title'] = 'Notulen';
        
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['data_agenda']= $this->notulen_m->getagenda()->result();
    // var_dump($data['user']); die;

        $this->template->load('layout/template', 'notulen/index', $data);

    }

    public function viewnotulen(){

        $data['title'] = 'View Notulen';
        
        $this->load->model('m_jenisrapat', 'jenisrapat');
        $data['agenda'] = $this->jenisrapat->getjenisrapat();
        $data['jenisrapat'] = $this->db->get('jenis_rapat')->result_array();

        $data['pimpinan'] = $this->db->get('dosen')->result_array();

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['data_agenda']= $this->notulen_m->getdata()->result();
        $this->template->load('layout/template', 'notulen/tambahnotulen', $data);

    }



    public function tambahnotulen(){

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('ruang_rapat', 'Ruang Rapat', 'required');
		$this->form_validation->set_rules('waktumulai', 'Waktu Mulai', 'required');
		$this->form_validation->set_rules('waktuselesai', 'Waktu Selesai', 'required');
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
		$this->form_validation->set_rules('jenis_rapat', 'Jenis Rapat', 'required');
		$this->form_validation->set_rules('daftar_hadir', 'Daftar Hadir', 'required');
		$this->form_validation->set_rules('total_hadir', 'Total Hadir', 'required');
		$this->form_validation->set_rules('ketua_rapat', 'Ketua Rapat', 'required');
		$this->form_validation->set_rules('pic', 'Pic', 'required');
        $this->form_validation->set_rules('ringkasan', 'Ringkasan', 'required');
        
        if($this->form_validation->run() == false){

            $data['title'] = 'Tambah Notulen';

            $this->load->model('m_jenisrapat', 'jenisrapat');
            $data['agenda'] = $this->jenisrapat->getjenisrapat();
            $data['jenisrapat'] = $this->db->get('jenis_rapat')->result_array();

            $data['pimpinan'] = $this->db->get('dosen')->result_array();
            
            $data['data_agenda']= $this->notulen_m->getdata()->result();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            // redirect('admin/notulen/viewnotulen', $data);
            $this->template->load('layout/template', 'notulen/tambahnotulen', $data);

        }else{

        $id_agenda = $this->input->post('id_agenda');
        $tanggal = $this->input->post('tanggal');
        $ruangrapat = $this->input->post('ruang_rapat');
        $waktumulai = $this->input->post('waktumulai');
        $waktuselesai = $this->input->post('waktuselesai');
        $suratundangan = $this->input->post('nomor_surat');
        $jenisrapat = $this->input->post('jenis_rapat');
        $daftarhadir = $this->input->post('daftar_hadir');
        $totalhadir = $this->input->post('total_hadir');
        $ketuarapat = $this->input->post('ketua_rapat');
        $pic = $this->input->post('pic');
        $ringkasan = $this->input->post('ringkasan');
        $foto_rapat = $_FILES['foto_rapat']['name'];
        $date_created = time();

            $data = [
                'id_agenda' => $id_agenda,
				'tanggal' => $tanggal,
				'ruang_rapat' => $ruangrapat,
				'waktu_mulai' => $waktumulai,
				'waktu_selesai' => $waktuselesai,
				'nomor_surat' => $suratundangan,
				'jenis_rapat' => $jenisrapat,
				'daftar_hadir' => $daftarhadir,
				'total_hadir' => $totalhadir,
				'ringkasan' => $ringkasan,
				'ketua_rapat' => $ketuarapat,
                'notulen' => $this->session->userdata('nama'),
                'pic' => $pic,
				'date_created' => $date_created,
			];

            // var_dump($this->session->userdata('nama')); die;
            $this->notulen_m->input_data($data, 'notulen');
	
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success" role="alert">Notulen Telah Ditambahkan</div>');
			redirect('sirapat/admin/notulen');

        }

    }

    public function risalahrapat(){
        
        $data['title'] = 'Risalah Rapat';
        
        $data['data_agenda']= $this->notulen_m->getdata()->result();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
        $this->template->load('layout/template', 'notulen/risalah_rapat', $data);

    }

    public function psbw(){
        
        $data['title'] = 'Permasalahan, Solusi, Dan Batas Waktu';
        
        $data['data_agenda']= $this->notulen_m->getdata()->result();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
        $this->template->load('layout/template', 'notulen/psbw', $data);

    }

    public function detail_notulen($id){

        $where = array('id' => $id);

		$data = [
			'agenda' =>  $this->notulen_m->detail_data($where, 'agenda_rapat')->result(),
		];

        $data['title'] = 'Detail Notulen';
        
        $data['data_agenda']= $this->notulen_m->getdata()->result();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
        $this->template->load('layout/template', 'notulen/detail_notulen', $data);

    }

}