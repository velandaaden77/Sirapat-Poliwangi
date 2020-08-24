<?php

class Notulen_m extends CI_Model {

    public function input_data($data,$table){
        // $this->db->insert('agenda_rapat', $data);
         $this->db->insert($table, $data);
    }
    
    public function getdata($id = null){

        return $this->db->get_where('agenda_rapat', ['id_user' => $this->session->userdata('id')]);
    }

    public function getagenda(){

   
        $this->db->select ('agenda_rapat.*, grup_tipe.nama_grup');
        $this->db->from('agenda_rapat');
        $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
        // $this->db->join('validasi_agenda', 'agenda_rapat.id = validasi_agenda.id_agenda ');
        $this->db->where(['agenda_rapat.id_tipegrup' => $this->session->userdata('id_tipe')] );
        $this->db->where(['agenda_rapat.status_agenda' => 1] );
        $this->db->order_by('agenda_rapat.id', 'DESC');
        
        $query = $this->db->get();
        return $query;

    }
    public function filterdata($date,$g){

    
        $this->db->select ('agenda_rapat.*, grup_tipe.nama_grup');
        $this->db->from('agenda_rapat');
        $this->db->join('grup_tipe', 'agenda_rapat.id_tipegrup = grup_tipe.id ');
        // $this->db->join('validasi_agenda', 'agenda_rapat.id = validasi_agenda.id_agenda ');
        $this->db->where(['agenda_rapat.id_tipegrup' => $this->session->userdata('id_tipe')] );
        $this->db->where(['agenda_rapat.status_agenda' => 1] );
        $this->db->order_by('agenda_rapat.id', 'DESC');
        $this->db->like('agenda_rapat.date_created', $date);
        $this->db->like('agenda_rapat.id_tipegrup', $g);
        $query = $this->db->get();
        return $query;

    }

    public function detail_data($where,$table){
		return $this->db->get_where($table, $where);
    }
    
    public function getnotulen(){

        return $this->db->get_where('notulen', ['id_agenda' => $this->uri->segment(5)])->result();
    
    }

    public function ketuarapat($id){
        $this->db->select('*');
        $this->db->from('agenda_rapat');
        $this->db->join('grup_rapat', 'grup_rapat.id_tipe = agenda_rapat.id_tipegrup');
        $this->db->join('karyawan', 'karyawan.idkaryawan = grup_rapat.id_karyawan');

        $this->db->where(['agenda_rapat.id' => $id]);
        $this->db->where(['grup_rapat.id_jabatan' => 1]);
        $query = $this->db->get();
        return $query;
    }

    public function getrisalah(){

    $this->db->select('*');
    $this->db->from('risalah_rapat');
    $this->db->join('notulen', 'risalah_rapat.id_notulen = notulen.idnotulen');
    $this->db->where(['risalah_rapat.id_notulen' => $this->uri->segment(5)]);
    $query = $this->db->get();
    return $query;
    
    }

    public function getpbsw(){

    $this->db->select('*');
    $this->db->from('permasalahan');
    $this->db->join('notulen', 'permasalahan.id_notulen = notulen.idnotulen');
    $this->db->where(['permasalahan.id_notulen' => $this->uri->segment(5)]);
    $query = $this->db->get();
    return $query;
    
    }

    public function delrisalah($id){
        $this->db->where('id_risalahrapat', $id);
        $this->db->delete('risalah_rapat');
    }

    public function notulensi(){

        $this->db->select('*');
        $this->db->from('notulen');
        $this->db->join('agenda_rapat', 'notulen.id_agenda = agenda_rapat.id');
        $this->db->join('grup_tipe', 'grup_tipe.id = agenda_rapat.id_tipegrup');
        // $this->db->join('grup_rapat', 'grup_rapat.id_tipe = grup_tipe.id');
        $this->db->where(['agenda_rapat.id' => $this->uri->segment(5)]);
        $query = $this->db->get();
        return $query;
        
        }

    public function pdf($id){

        $this->db->select('*');
        $this->db->from('notulen');
        $this->db->join('agenda_rapat', 'notulen.id_agenda = agenda_rapat.id');
        $this->db->join('grup_tipe', 'grup_tipe.id = agenda_rapat.id_tipegrup');
        // $this->db->join('grup_rapat', 'grup_rapat.id_tipe = grup_tipe.id');
        $this->db->where(['agenda_rapat.id' => $id]);
        $query = $this->db->get();
        return $query;
        
        }
}