<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notulen extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		is_logged_in();
        $this->load->model('agenda_m');
		
    }

    public function index(){

        $data['title'] = 'Notulen';
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['row']= $this->agenda_m->get();
        $this->template->load('layout/template', 'notulen/index', $data);

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
            
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
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

        if($foto){
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = 'assets/dashboard/img/';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('foto')){

                //Penghapusan file yang sama
                $old_foto = $data['user']['agenda'];
                if($old_foto != 'default.jpg'){
                    unlink(FCPATH . 'assets/dashboard/file/' . $old_foto);
                }
                //insert data file ke database
                $new_foto = $this->upload->data('file_name');
                $this->db->set('foto', $new_foto);
            }else {
                //jika tidak upload maka error
                echo $this->upload->display_errors();
                }
            }

            $data = [
				'tanggal' => $tanggal,
				'ruang_rapat' => $ruangrapat,
				'waktu_mulai' => $waktumulai,
				'waktu_selesai' => $waktuselesai,
				'nomor_surat' => $suratundangan,
				'jenis_rapat' => $jenisrapat,
				'daftar_hadir' => $daftarhadir,
				'total_hadir' => $totalhadir,
				'agenda' => $id_agenda,
				'ringkasan' => $ringkasan,
				'ketua_rapat' => $ketuarapat,
				'notulen' => $this->session->userdata('nama'),
                'pic' => $pic,
                'foto_rapat' => $foto,
				'date_created' => $date_created,
			];

            $this->m_unggah_agenda->input_data($data, 'agenda_rapat');
	
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success" role="alert">Agenda Telah Ditambahkan</div>');
			redirect('sirapat/admin/UnggahAgenda');

        }

        


    }
}