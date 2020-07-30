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

        $this->template->load('layout/template', 'notulen/index', $data);

    }

    public function pdf($id){

        $data['notulensi']= $this->notulen_m->pdf($id)->row();
        $html = $this->load->view('sirapat/notulen/print_notulen', $data, true);

        $this->pdf_generator->generate($html, 'Notulen-'.$data['notulensi']->idnotulen,'A4', 'potrait');

    }

    public function viewnotulen(){

        $data['title'] = 'View Notulen';

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['data_agenda']= $this->notulen_m->getdata()->result();
        $this->template->load('layout/template', 'notulen/tambahnotulen', $data);

    }

    public function tambahnotulen($id){

       
		// $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		// $this->form_validation->set_rules('ruang_rapat', 'Ruang Rapat', 'required');
		// $this->form_validation->set_rules('waktumulai', 'Waktu Mulai', 'required');
		// $this->form_validation->set_rules('waktuselesai', 'Waktu Selesai', 'required');
		$this->form_validation->set_rules('daftar_hadir', 'Daftar Hadir', 'required');
		$this->form_validation->set_rules('total_hadir', 'Total Hadir', 'required');
		$this->form_validation->set_rules('pic', 'Pic', 'required');
        $this->form_validation->set_rules('ringkasan', 'Ringkasan', 'required');
        
        if($this->form_validation->run() == false){

            $data['title'] = 'Tambah Notulen';
            
            $data['data_agenda']= $this->notulen_m->getdata()->result();
            $data['a']= $this->db->get_where('agenda_rapat', ['id' => $this->uri->segment(5)])->row();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['notulen'] = $this->db->get_where('notulen', ['id_agenda' => $this->uri->segment(5)])->row();
            $this->template->load('layout/template', 'notulen/tambahnotulen', $data);


        }else{

        $id_agenda = $this->input->post('id_agenda');
        $tanggal = $this->input->post('tanggal');
        // var_dump($tanggal); die;
        $ruangrapat = $this->input->post('ruang_rapat');
        $waktumulai = $this->input->post('waktumulai');
        $waktuselesai = $this->input->post('waktuselesai');
        $daftarhadir = $this->input->post('daftar_hadir');
        $totalhadir = $this->input->post('total_hadir');
        $pic = $this->input->post('pic');
        $ringkasan = $this->input->post('ringkasan');
        $foto_rapat = $_FILES['foto_rapat']['name'];
        if ($foto_rapat) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/dashboard/img/rapat/';
            
            $this->load->library('upload', $config);

            if($this->upload->do_upload('foto_rapat')){

                // // //Penghapusan file yang sama
                // // $old_image = $data['notulen']['foto_rapat'];
                // // if($old_image != 'default.jpg'){
                // //     unlink(FCPATH . 'assets/dashboard/img/rapat/' . $old_image);
                // }
                //insert data file ke database
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_rapat', $new_image);
            }else {
                //jika tidak upload maka error
                echo $this->upload->display_errors();
            }
        }
        $date_created = date('Y-m-d');

            $data = [
                'id_agenda' => $id_agenda,
				'tanggal' => $tanggal,
				'ruang_rapat' => $ruangrapat,
				'waktu_mulai' => $waktumulai,
				'waktu_selesai' => $waktuselesai,
				'daftar_hadir' => $daftarhadir,
				'total_hadir' => $totalhadir,
				'ringkasan' => $ringkasan,
                'notulen' => $this->session->userdata('nama'),
                'pic' => $pic,
                'foto_rapat' =>$foto_rapat,
				'date_created' => $date_created,
			];

            // var_dump($this->session->userdata('nama')); die;
            $this->notulen_m->input_data($data, 'notulen');
	
			$this->session->set_flashdata('message', 
			'Notulen Telah Ditambahkan');
			redirect('sirapat/admin/notulen/detail_notulen/'.$id_agenda);

        }

    }

    public function risalahrapat(){
        
        $data['title'] = 'Risalah Rapat';
        $data['data_agenda']= $this->notulen_m->getdata()->result();
        $data['getnotulen'] = $this->notulen_m->getnotulen();
        $data['risalah_rapat']= $this->notulen_m->getrisalah()->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->template->load('layout/template', 'notulen/risalah_rapat', $data);

    }

    public function tambahrisalah($id){

		$this->form_validation->set_rules('subtopik', 'Subtopik', 'required');
        $this->form_validation->set_rules('catatankaki', 'catatankaki', 'required');

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('message2', 'Data Kosong!!!');
            redirect('sirapat/admin/notulen/risalahrapat/'.$id);
        }else{

            $idnotulen = $this->input->post('idnotulen');
            $subtopik = $this->input->post('subtopik');
            $catatankaki = $this->input->post('catatankaki');
    
        $data = [
            'id_notulen' =>$idnotulen,
            'subtopik' =>$subtopik,
            'catatan_kaki' =>$catatankaki,
            'date_created' => date('Y-m-d'),
        ];

        $this->db->insert('risalah_rapat', $data);
        $this->session->set_flashdata('message', 'Risalah Rapat Telah Ditambahkan');
        redirect('sirapat/admin/notulen/risalahrapat/'.$idnotulen);
    }

    }

    public function updaterisalah($idnotulen){

        $id = $this->input->post('id');
        $subtopik = $this->input->post('subtopik');
        $catatankaki = $this->input->post('catatankaki');

        $data = [

            'subtopik' =>$subtopik,
            'catatan_kaki' =>$catatankaki,
    
        ];

        $where = ['id_risalahrapat'=>$id];

        $this->db->where($where);
        $this->db->update('risalah_rapat', $data);

        $this->session->set_flashdata('message', 'Risalah Rapat Telah di Update');
		redirect('sirapat/admin/notulen/risalahrapat/'.$idnotulen);

    }

    public function delrisalah($id, $idnotulen){

        $this->notulen_m->delrisalah($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('message', 'Risalah Telah Dihapus');
            redirect('sirapat/admin/notulen/risalahrapat/'.$idnotulen);
        }else{
            redirect('sirapat/admin/notulen/risalahrapat/'.$idnotulen);
        }

    }

    public function psbw(){
        
        $data['title'] = 'Permasalahan, Solusi, Dan Batas Waktu';
        $data['pbsw']= $this->notulen_m->getpbsw()->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->template->load('layout/template', 'notulen/psbw', $data);

    }

    public function tambahpsbw(){

        $this->form_validation->set_rules('topikbahasan', 'topikbahasan', 'required');
        $this->form_validation->set_rules('uraian', 'uraian', 'required');
        $this->form_validation->set_rules('solusi', 'solusi', 'required');
        $this->form_validation->set_rules('pic', 'pic', 'required');
        $this->form_validation->set_rules('bataswaktu', 'Batas Waktu', 'required');

            $id = $this->input->post('id_notulen');
            $topikbahasan = $this->input->post('topikbahasan');
            $uraian = $this->input->post('uraian');
            $solusi = $this->input->post('solusi');
            $pic = $this->input->post('pic');
            $bataswaktu = $this->input->post('bataswaktu');

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('message2', 'Data Kosong!!!');
            redirect('sirapat/admin/notulen/psbw/'.$id);
       
        }else{

        $data = [
            'id_notulen' => $id,
            'topik_bahasan' => $topikbahasan,
            'uraian' => $uraian,
            'solusi' => $solusi,
            'pic' => $pic,
            'bataswaktu' => $bataswaktu,
            'date_created' => date('Y-m-d')
        ];

        $this->db->insert('permasalahan', $data);
        $this->session->set_flashdata('message', 'Data Telah Ditambahkan');
		redirect('sirapat/admin/notulen/psbw/'.$id);
    }

    }

    public function updatepsbw($idnotulen){

        // $idnotulen = $this->input->post('idnotulen');
        $id = $this->input->post('id');
        $topikbahasan = $this->input->post('topikbahasan');
        $uraian = $this->input->post('uraian');
        $solusi = $this->input->post('solusi');
        $pic = $this->input->post('pic');
        $bataswaktu = $this->input->post('bataswaktu');

        $data = [

            'topik_bahasan' => $topikbahasan,
            'uraian' => $uraian,
            'solusi' => $solusi,
            'pic' => $pic,
            'bataswaktu' => $bataswaktu,
            'date_updated' => date('Y-m-d')
    
        ];

        $where = ['idpermasalahan'=>$id];

        $this->db->where($where);
        $this->db->update('permasalahan', $data);

        $this->session->set_flashdata('message', 'Risalah Rapat Telah di Update');
		redirect('sirapat/admin/notulen/psbw/'.$idnotulen);
    }

    public function delpsbw($id, $idnotulen){

        $this->db->where('idpermasalahan', $id);
        $this->db->delete('permasalahan');

        $this->session->set_flashdata('message', 'Data Telah di Hapus');
		redirect('sirapat/admin/notulen/psbw/'.$idnotulen);

    }

    public function beritaacara(){
        
        $data['title'] = 'Berita Acara';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->template->load('layout/template', 'notulen/berita_acara', $data);

    }


    public function tambahberitaacara(){

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('hasil', 'Hasil', 'required');

        $id = $this->input->post('idnotulen');
        $tanggal = $this->input->post('tanggal');
        $hasil = $this->input->post('hasil');

        if($this->form_validation->run() == false){

        $this->session->set_flashdata('message2', 'Data Kosong!!!');
        redirect('sirapat/admin/notulen/beritaacara/'.$id);
        
        }else{

        $data = [
            'id_notulen' => $id,
            'tanggal' => $tanggal,
            'hasil' => $hasil,
            'date_created' => date('Y-m-d'),
        ];

        $this->db->insert('berita_acara', $data);
        $this->session->set_flashdata('message', 'Data Telah di Ditambahkan');
		redirect('sirapat/admin/notulen/beritaacara/'.$id);
    }

    }

    public function delberitaacara($id, $idnotulen)
    {
        $this->db->where('id_beritaacara', $id);
        $this->db->delete('berita_acara');

        $this->session->set_flashdata('message', 'Data Telah di Dihapus');
		redirect('sirapat/admin/notulen/beritaacara/'.$idnotulen);

    }

    public function updateberitaacara($idnotulen){
        
        $id = $this->input->post('id');
        $tanggal = $this->input->post('tanggal');
        $hasil = $this->input->post('hasil');

        

        $data = [

            'tanggal' => $tanggal,
            'hasil' => $hasil,
            'date_created' => time(),
        ];

        $where=['id_beritaacara' => $id];

        $this->db->where($where);
        $this->db->update('berita_acara', $data);

        $this->session->set_flashdata('message', 'Data Telah di Di Update');
		redirect('sirapat/admin/notulen/beritaacara/'.$idnotulen);
       
    }



    public function detail_notulen($id){

        $where = array('id' => $id);

		$data = [
			'agenda' =>  $this->notulen_m->detail_data($where, 'agenda_rapat')->result(),
		];

        $data['title'] = 'Detail Notulen';
        $data['notulensi'] = $this->notulen_m->notulensi()->row();
        // $data['data_agenda']= $this->notulen_m->getdata()->result();
       
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
        $this->template->load('layout/template', 'notulen/detail_notulen', $data);

    }

    public function delnotulen($id, $idagenda){

        $this->db->where($id);
        $this->db->delete('notulen');
        $this->session->set_flashdata('message', 'Notulensi Dihapus');
		redirect('sirapat/admin/notulen/detail_notulen/'.$idagenda);
    }

    public function editnotulensi($id){

        $data['title'] = 'Edit Notulensi';

        $data['notulen'] = $this->db->get_where('notulen', ['idnotulen' => $this->uri->segment(5)])->row();
       
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
        $this->template->load('layout/template', 'notulen/edit_notulensi', $data);

    }

    public function updatenotulen(){

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('ruang_rapat', 'Ruang Rapat', 'required');
		$this->form_validation->set_rules('waktumulai', 'Waktu Mulai', 'required');
		$this->form_validation->set_rules('waktuselesai', 'Waktu Selesai', 'required');
		$this->form_validation->set_rules('daftar_hadir', 'Daftar Hadir', 'required');
		$this->form_validation->set_rules('total_hadir', 'Total Hadir', 'required');
		$this->form_validation->set_rules('pic', 'Pic', 'required');
        $this->form_validation->set_rules('ringkasan', 'Ringkasan', 'required');
        
        if($this->form_validation->run() == false){

            $data['title'] = 'Tambah Notulen';
            
            $data['data_agenda']= $this->notulen_m->getdata()->result();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->template->load('layout/template', 'notulen/tambahnotulen', $data);

        }else{

        $idagenda = $this->input->post('idagenda');
        $idnotulen = $this->input->post('idnotulen');
        $tanggal = $this->input->post('tanggal');
        $ruangrapat = $this->input->post('ruang_rapat');
        $waktumulai = $this->input->post('waktumulai');
        $waktuselesai = $this->input->post('waktuselesai');
        $daftarhadir = $this->input->post('daftar_hadir');
        $totalhadir = $this->input->post('total_hadir');
        $pic = $this->input->post('pic');
        $ringkasan = $this->input->post('ringkasan');
        $foto_rapat = $_FILES['foto_rapat']['name'];
        if ($foto_rapat) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/dashboard/img/rapat/';
            
            $this->load->library('upload', $config);

            if($this->upload->do_upload('foto_rapat')){

                //Penghapusan file yang sama
                $old_image = $data['notulen']['foto_rapat'];
                if($old_image != 'default.jpg'){
                    unlink(FCPATH . 'assets/dashboard/img/rapat/' . $old_image);
                }
                //insert data file ke database
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_rapat', $new_image);
            }else {
                //jika tidak upload maka error
                echo $this->upload->display_errors();
            }
        }
        $date_created = date('Y-m-d');

            $data = [
                
				'tanggal' => $tanggal,
				'ruang_rapat' => $ruangrapat,
				'waktu_mulai' => $waktumulai,
				'waktu_selesai' => $waktuselesai,
				'daftar_hadir' => $daftarhadir,
				'total_hadir' => $totalhadir,
				'ringkasan' => $ringkasan,
                'notulen' => $this->session->userdata('nama'),
                'pic' => $pic,
                'foto_rapat' =>$foto_rapat,
				'date_created' => $date_created,
			];


           $this->db->where(['idnotulen' => $idnotulen]);
           $this->db->update('notulen', $data);

			$this->session->set_flashdata('message', 'Notulen Telah Di Edit');
			redirect('sirapat/admin/notulen/detail_notulen/'.$idagenda);

    }

}

        public function printnotulen(){

            $data['title'] = 'Print Notulen';
            $data['notulensi']= $this->notulen_m->notulensi()->row();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('sirapat/notulen/print_notulen', $data);
        }
        public function printrisalah(){

            $data['title'] = 'Print Risalah';
            $data['risalah']= $this->db->get_where('risalah_rapat', ['id_notulen' => $this->uri->segment(5)])->result();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('sirapat/notulen/print_risalah', $data);

        }
        public function printpsbw(){

            $data['title'] = 'Print Psbw';
            $data['psbw']= $this->db->get_where('permasalahan', ['id_notulen' => $this->uri->segment(5)])->result();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('sirapat/notulen/print_psbw', $data);

        }
        public function printberitaacara(){

            $data['title'] = 'Print Psbw';
            $data['ber']= $this->db->get_where('berita_acara', ['id_notulen' => $this->uri->segment(5)])->row();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('sirapat/notulen/print_beritaacara', $data);

        }

}