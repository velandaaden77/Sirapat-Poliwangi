<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unggah_agenda extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->helper('sirapat');
		$this->load->model('m_unggah_agenda');
		$this->load->library('form_validation');
	}

	public function index()
	{ 

		$data['title'] = 'Unggah Agenda';

		$this->load->model('m_jenisrapat', 'jenisrapat');
		$data['agenda'] = $this->jenisrapat->getjenisrapat();
		$data['jenisrapat'] = $this->db->get('jenis_rapat')->result_array();
		
		$data['agenda'] = $this->jenisrapat->getprodi();
		$data['prodi'] = $this->db->get('prodi')->result_array();

		

		// var_dump($data); die;
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['dosen'] = $this->db->get('dosen')->result_array();
		$this->template->load('layout/template', 'unggah_agenda/index', $data);

	}

	public function tambah_agenda(){

		$this->form_validation->set_rules('nama_agenda', 'Agenda', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required');
		$this->form_validation->set_rules('jmmulai', 'Jam Mulai', 'required');
		$this->form_validation->set_rules('jmselesai', 'Jam Selesai', 'required');
		$this->form_validation->set_rules('prodi', 'Prodi', 'required');
		$this->form_validation->set_rules('jenis_rapat', 'Jenis Rapat', 'required');
		$this->form_validation->set_rules('peserta_rapat', 'Peserta Rapat', 'required');
		$this->form_validation->set_rules('nomor_agenda', 'Nomor Agenda', 'required');
		$this->form_validation->set_rules('hal', 'Hal', 'required');
		$this->form_validation->set_rules('pimpinan', 'Pimpinan', 'required');
		// $this->form_validation->set_rules('lampiran', 'Lampiran', 'required');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		
		if($this->form_validation->run() == false){

		$data['title'] = 'Unggah Agenda';
		
		$this->load->model('m_jenisrapat', 'jenisrapat');
		$data['agenda'] = $this->jenisrapat->getjenisrapat();
		$data['jenisrapat'] = $this->db->get('jenis_rapat')->result_array();

		$data['agenda'] = $this->jenisrapat->getprodi();
		$data['prodi'] = $this->db->get('prodi')->result_array();
		// var_dump($data); die;
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->template->load('layout/template', 'unggah_agenda/index', $data);

		}else {

			$nama_agenda = $this->input->post('nama_agenda');
			$tanggal = $this->input->post('tanggal');
			$tempat = $this->input->post('tempat');
			$jammulai = $this->input->post('jmmulai');
			$jamselesai = $this->input->post('jmselesai');
			$prodi = $this->input->post('prodi');
			$jenis_rapat = $this->input->post('jenis_rapat');
			$peserta_rapat = $this->input->post('peserta_rapat');
			$nomor_agenda = $this->input->post('nomor_agenda');
			$hal = $this->input->post('hal');
			$pimpinan = $this->input->post('pimpinan');
			$lampiran = $_FILES['lampiran']['name'];

			if($lampiran){
				$config['allowed_types'] = 'doc|xls|pdf';
				$config['max_size'] = '2048';
				$config['upload_path'] = 'assets/dashboard/file/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('lampiran')){

					//Penghapusan file yang sama
					$old_lampiran = $data['user']['agenda'];
					if($old_lampiran != 'default.doc'){
						unlink(FCPATH . 'assets/dashboard/file/' . $old_lampiran);
					}
					//insert data file ke database
					$new_lampiran = $this->upload->data('file_name');
					$this->db->set('lampiran', $new_lampiran);
				}else {
					//jika tidak upload maka error
					echo $this->upload->display_errors();
				}
			}

			$file = 'default.doc';
			$date_created = time();

			$data = [
				'nama_agenda' => $nama_agenda,
				'tanggal' => $tanggal,
				'tempat' => $tempat,
				'jam_mulai' => $jammulai,
				'jam_selesai' => $jamselesai,
				'id_prodi' => $prodi,
				'idjenis_rapat' => $jenis_rapat,
				'peserta_rapat' => $peserta_rapat,
				'nomor_agenda' => $nomor_agenda,
				'hal' => $hal,
				'id_pimpinan' => $pimpinan,
				'lampiran' => $lampiran,
				'file' => $file,
				'id_user' => $this->session->userdata('iduser'),
				'date_created' => $date_created,
			];
	
			$this->m_unggah_agenda->input_data($data, 'agenda_rapat');
	
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success" role="alert">Agenda Telah Ditambahkan</div>');
			redirect('sirapat/admin/UnggahAgenda');
		}
		

	}


}
